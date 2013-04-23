<?php
/**
* @package      Favicon Controller
* @author       Shiva Poudel <info.shivapoudel@gmail.com>
* @link         http://css-gen.com/products/wp-plugins/favicon-controller/
* @version      1.0.1
* @license      GPL3
* @copyright    Copyright (c) 2013, Shiva Poudel
* @tags         admin, favicon
* @contributors Shiva Poudel
* @donate link: http://anupraj.com.np/donate/
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*
*/

/**
* Front-End (Website) Favicon
*/
add_action('login_head', function(){
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/favicon/images/login_favicon.ico" />'; 
	echo '<link rel="apple-touch-icon" type="image/png" href="'.get_bloginfo('stylesheet_directory').'/favicon/images/login_favicon.png" />'; 
});

/**
* Back-End (Dashboard) Favicon
*/
add_action('admin_head', function(){
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/favicon/images/backend_favicon.ico" />';
	echo '<link rel="apple-touch-icon" type="image/png" href="'.get_bloginfo('stylesheet_directory').'/favicon/images/backend_favicon.png" />'; 
});

/**
* Login (User-Access) Favicon
*/
add_action('wp_head', function(){
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/favicon/images/frontend_favicon.ico" />'; 
	echo '<link rel="apple-touch-icon" type="image/png" href="'.get_bloginfo('stylesheet_directory').'/favicon/images/frontend_favicon.png" />'; 
});

?>