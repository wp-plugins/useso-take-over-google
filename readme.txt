=== Useso take over Google ===
Contributors: xiaoxu125634
Donate link: http://www.brunoxu.com/
Tags: Open Sans, Google Fonts, Google Web Fonts, useso, 360前端公共库, Google字体库, Google公共库, Useso公共库, Useso字体库
Requires at least: 3.0
Tested up to: 4.1
Stable tag: trunk

用360前端公共库Useso接管Google字体库和Google公共库，无需设置，插件安装激活后即刻生效。

== Description ==

[插件首页](http://www.brunoxu.com/useso-take-over-google.html) | [插件作者](http://www.brunoxu.com/)

前面做了一个去除Google字体插件：<a href="http://wordpress.org/plugins/remove-google-fonts-references/">Remove Google Fonts References</a>，用来去除所有页面中的Google字体引用，避免网页打开速度被严重拖慢。

如果不去掉Google资源引用，使用360前端公共库会怎么样，因为http://libs.useso.com/提供了国内可访问的替换方案，基于useso就开发出了这个插件：Useso take over Google。

插件会自动把所有页面中出现的对Google字体、Google公共库的引用，换成对useso的引用，保证国内能正常访问资源。

插件无需设置，安装激活后即刻生效。

== Installation ==

1. Upload `useso-take-over-google` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress background.

== Changelog ==

= 1.5 =
* 2014-10-05
* Use lug.ustc.edu.cn resources when SSL is used.

= 1.4 =
* 2014-09-25
* Solved google fonts imported by 'Web Font Loader'.

= 1.3 =
* 2014-09-20
* Add theme 'pinnacle'(use redux framework) compatibility.

= 1.2 =
* 2014-09-10
* Cover another reference method like '@import url(...)'.
* Optimized action hooks.

= 1.1 =
* 2014-08-26
* Cover login and register page.

= 1.0 =
* 2014-08-22
* First released version.
