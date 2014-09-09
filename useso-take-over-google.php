<?php
/*
Plugin Name: Useso take over Google
Plugin URI: http://www.brunoxu.com/useso-take-over-google.html
Description: 用360前端公共库Useso接管Google字体库和Google公共库，无需设置，插件安装激活后即刻生效。
Author: Bruno Xu
Author URI: http://www.brunoxu.com/
Version: 1.2
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

function gf_is_login_page() {
	return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

if (is_admin()) {
	//$action = 'admin_head'; // NG
	$action = 'admin_init'; // OK
	//$action = 'wp'; // NG
} elseif (gf_is_login_page()) {
	//$action = 'wp'; // NG
	//$action = 'init'; // OK
	$action = 'wp_loaded'; // OK
} else {
	$action = 'get_header';
}

add_action($action, 'useso_take_over_google_obstart');
function useso_take_over_google_obstart() {
	ob_start('useso_take_over_google_obend');
}

function useso_take_over_google_obend($content) {
	return useso_take_over_google_filter($content);
}

function useso_take_over_google_filter($content)
{
	/*
	<link rel="stylesheet" id="open-sans-css" href="//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&amp;subset=latin%2Clatin-ext&amp;ver=3.9.2" type="text/css" media="all">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
	*/
	$regexp = "/<(link|script)([^<>]+)>/i";
	$content = preg_replace_callback(
		$regexp,
		"useso_take_over_google_str_handler",
		$content
	);

	/*
	@import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:regular);
	@import url(http://fonts.googleapis.com/css?family=Merriweather:300,300italic,700,700italic);
	*/
	$regexp = "/@import\s+url\([^\(\)]+\);?/i";
	$content = preg_replace_callback(
		$regexp,
		"useso_take_over_google_str_handler",
		$content
	);

	return $content;
}

function useso_take_over_google_str_handler($matches)
{
	$str = $matches[0];

	$str = str_ireplace('//fonts.googleapis.com/', '//fonts.useso.com/', $str);
	$str = str_ireplace('//ajax.googleapis.com/', '//ajax.useso.com/', $str);

	return $str;
}
