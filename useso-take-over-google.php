<?php
/*
Plugin Name: Useso take over Google
Plugin URI: http://www.brunoxu.com/useso-take-over-google.html
Description: 用360前端公共库Useso接管Google字体库和Google公共库，无需设置，插件安装激活后即刻生效。
Author: Bruno Xu
Author URI: http://www.brunoxu.com/
Version: 1.1
License: GPL
*/

function gf_is_login_page() {
	return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

if (is_admin()) {
	$action = 'admin_init';
} elseif (gf_is_login_page()) {
	$action = 'init'; // OK
	//$action = 'wp'; // NG
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
	$regexp = "/<(link|script)([^<>]+)>/i";

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
