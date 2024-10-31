==== WP User Visitors ====
  Plugin Name: Recent WP User Visitors
  Tags: recent visited user,recent visited user image ,visitors image, user image,recent visitors photo, visitors  avatar, visitors , visitors image, user avatar, user image, user photo, widget
  Plugin URI: http://your-domain.com  
  Version: 1.0.0
  Author: php-developer
  Author URI: https://profiles.wordpress.org/php-developer-1
  Contributors: php-developer 
  License: GPLv2 or later
  License URI: http://www.gnu.org/licenses/gpl-2.0.html
  Requires at least: 3.0
  Tested up to: 4.0
    
== Description ==

Under each post or page Its display recent visited user(registered)image and email.
you can also add short code under any post type. 
add this code in your post content
[rwuv_recent_wp_user_visitor]


== Installation ==


1. Download, install, and activate Recent WP User Visitors  plugin.
2. You can set how many user you want to display, image size, emial link etc under settings page.

== Short Codes ==

if you want display five persone in one row then use below short code

[rwuv_recent_wp_user_visitorr no_of_col="5" link='yes' caption='yes' size='100']

if you want display five persone in one row and no email link and no user name then use below short code

[rwuv_recent_wp_user_visitor no_of_col="5" link='no' caption='yes' size='100']

[rwuv_recent_wp_user_visitor no_of_col="5" link='yes' caption='no' size='100']

[rwuv_recent_wp_user_visitor no_of_col="5" link='no' caption='no' size='150']

[rwuv_recent_wp_user_visitor no_of_col="3" link='yes' caption='yes' size='100']

== Screenshots ==
1. This is the Frist screen shot
2. This is the second screen shot
2. This is the third screen shot

== PHP Code ==

1. If you want to display resent user info with php code

`<?php get_rwuv_post_views_user_ids($no_of_col="3",$link="yes",$caption="yes",$size=100,$is_echo="yes") ?>`

2. If you want to display resent user info in array then you have to use this function 
`<?php $data_array = get_rwuv_post_views_user_ids($no_of_col="3",$link="yes",$caption="yes",$size=100,$is_echo="no") ?>`