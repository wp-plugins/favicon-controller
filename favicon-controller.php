<?php
/**
* Plugin Name: Favicon Controller
* Plugin URI:  http://css-gen.com/
* Description: Favicon Controller for WordPress Dashboard, Login-Page and Front-End.
* Author:      Shiva Poudel
* Author URI:  http://css-gen.com/products/wp-plugins/favicon-controller/
* Version:     1.0.1
*
* License: GPLv3
* Contributors: Shiva Poudel
* Tags: admin, favicon
* Requires at least: 3.0
* Tested up to: 3.5.1
* Stable tag: 1.0.1
* Donate link: http://anupraj.com.np/donate/
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
*/

/**
* Favicon Controller Class Loader
*/
class fc_options
{
	public $options;
	
	public function __construct()
	{
		$this->options = get_option('fc_plugin_options');
		$this->register_settings_and_fields();
	}

	/**
	* Adds Favicon Controller Link in Setting Menu
	*/
	public function fc_add_menu_page()
	{
		add_options_page('Favicon-Controller', 'Favicon Controller', 'read', __FILE__, array('fc_options', 'fc_options_page'));
	}

	/**
	* Favicon Controller Options Page
	*/
	public function fc_options_page()
	{
		?>
		<!-- Basic Style for Favicon Controller Options Page -->
		<style>
			.wrap {
				position:relative;
			}
			
			.favicon_controller_notice {
				padding:10px 20px;
				-moz-border-radius:3px;
				-webkit-border-radius:3px;
				border-radius:3px;
				background:#FFFFE0;
				border:1px solid #e6db55;
				margin:10px 5px 10px 0;
			}
			
			.favicon_controller_notice h3 {
				margin-top:5px;
				padding-top:0;
			}
			
			.favicon_controller_notice li {
				list-style-type:disc;
				margin-left:20px;
			}
		</style>
		<!-- Main Wrapper -->
		<div class="wrap">
			<?php screen_icon( ) ?>
			<h2>Favicon Controller Settings</h2>

			<!-- Begins Option Page Notice -->
			<div class="favicon_controller_notice">
				<h3>More WordPress Goodies &rsaquo;</h3>
				<p>Please send us your feedback on <a href="http://css-gen.com/products/wp-plugins/nplogin/" target="_blank">CSS-Gen.Com</a><br />
				</p>
				<ul>
					<li><a href="http://twitter.com/cssgen" target="_blank">CSS-Gen on Twitter</a></li>
					<li><a href="http://facebook.com/cssgen" target="_blank">CSS-Gen on Facebook</a></li>
				</ul>
			</div>
			<!-- END Option Page Notice -->

			<!-- Begins Description -->
			<p>
				Make Sure that your Favicon Size is 16x16 px and *.ico and *.png images are same but with different extension. You can also upload your image with the media uploader.
			</p>
			<!-- Begins Description -->

			<!-- Begins Option Page Form -->
			<form method="post" action="options.php" enctype="multipart/form-data">
				<?php 
					settings_fields('fc_plugin_options');
					do_settings_sections( __FILE__ );
				?>
				<p class="submit">
					<input name="submit" type="submit" class="button-primary" value="Save Changes" />
				</p>
			</form>
			<!-- END Option Page Form -->
		</div>
		<?php 
	}

	/**
	* Register Favicon Controller Settings and Create Fields within Section
	*/
	public function register_settings_and_fields()
	{
		/*
		* Register Settings for Favicon Controller Plugin
		*/
		register_setting( 'fc_plugin_options', 'fc_plugin_options' );

		/*
		* Front-End Settings
		*/

		// Creates Front-End Sections
		add_settings_section( 'fc_frontend_section', 'A. Front-End (Your Website Area) Favicon Settings', array($this, 'fc_frontend_validate_settings_cb'), __FILE__ );

		// Creates Front-End Fields
		add_settings_field( 'fc_frontend_ico', 'Front-End Favicon (*.ico Only): ', array($this, 'fc_frontend_ico_settings'), __FILE__, 'fc_frontend_section' );
		add_settings_field( 'fc_frontend_png', 'Front-End Favicon (*.png Only): ', array($this, 'fc_frontend_png_settings'), __FILE__, 'fc_frontend_section' );

		/*
		* Back-End Settings
		*/

		// Creates Back-End Sections
		add_settings_section( 'fc_backend_section', 'B. Back-End (Admin Dashboard Area) Favicon Settings', array($this, 'fc_backend_validate_settings_cb'), __FILE__ );

		// Creates Back-End Fields
		add_settings_field( 'fc_backend_ico', 'Back-End Favicon (*.ico Only): ', array($this, 'fc_backend_ico_settings'), __FILE__, 'fc_backend_section' );
		add_settings_field( 'fc_backend_png', 'Back-End Favicon (*.png Only): ', array($this, 'fc_backend_png_settings'), __FILE__, 'fc_backend_section' );

		/*
		* Login-Page Settings
		*/

		// Creates Login-Page Sections
		add_settings_section( 'fc_login_section', 'C. Login-Page (User-Access Area) Favicon Settings', array($this, 'fc_login_validate_settings_cb'), __FILE__ );

		// Creates Login-Page Fields
		add_settings_field( 'fc_login_ico', 'Login-Page Favicon (*.ico Only): ', array($this, 'fc_login_ico_settings'), __FILE__, 'fc_login_section' );
		add_settings_field( 'fc_login_png', 'Login-Page Favicon (*.png Only): ', array($this, 'fc_login_png_settings'), __FILE__, 'fc_login_section' );
	}

	/**
	* Favicon Controller Setting Section Call-Backs
	*/
	public function fc_frontend_validate_settings_cb()
	{
		// Optional
	}
	public function fc_backend_validate_settings_cb()
	{
		// Optional
	}	
	public function fc_login_validate_settings_cb()
	{
		// Optional
	}
	/*
	* Favicon Controller Inputs Area for Setting Page
	*/

	// Front-End Favicon Settings
	public function fc_frontend_ico_settings()
	{
		echo "<input name='fc_plugin_options[fc_frontend_ico]' type='text' value='{$this->options['fc_frontend_ico']}' class='regular-text' />";
		print_r('<span class="description" style="margin-left:20px">URL path to *.ico image to use for Front-End Favicon.</span>');
	}
	public function fc_frontend_png_settings()
	{
		echo "<input name='fc_plugin_options[fc_frontend_png]' type='text' value='{$this->options['fc_frontend_png']}' class='regular-text' />";
		print_r('<span class="description" style="margin-left:20px">URL path to *.png image to use for Front-End Favicon.</span>');
	}

	// Back-End Favicon Settings
	public function fc_backend_ico_settings()
	{
		echo "<input name='fc_plugin_options[fc_backend_ico]' type='text' value='{$this->options['fc_backend_ico']}' class='regular-text' />";
		print_r('<span class="description" style="margin-left:20px">URL path to *.ico image to use for Back-End Favicon.</span>');
	}
	public function fc_backend_png_settings()
	{
		echo "<input name='fc_plugin_options[fc_backend_png]' type='text' value='{$this->options['fc_backend_png']}' class='regular-text' />";
		print_r('<span class="description" style="margin-left:20px">URL path to *.png image to use for Back-End Favicon.</span>');
	}

	// Login-Page Favicon Settings
	public function fc_login_ico_settings()
	{
		echo "<input name='fc_plugin_options[fc_login_ico]' type='text' value='{$this->options['fc_login_ico']}' class='regular-text' />";
		print_r('<span class="description" style="margin-left:20px">URL path to *.ico image to use for Login-Page Favicon.</span>');
	}
	public function fc_login_png_settings()
	{
		echo "<input name='fc_plugin_options[fc_login_png]' type='text' value='{$this->options['fc_login_png']}' class='regular-text' />";
		print_r('<span class="description" style="margin-left:20px">URL path to *.png image to use for Login-Page Favicon.</span>');
	}
}

/*
* Favicon Controller Class Important Element
*/
add_action( 'admin_menu', function(){
	fc_options::fc_add_menu_page();
});

add_action( 'admin_init', function(){
	new fc_options();
});

/*
* Favicon Code Generator Function
*/

// Front-End (Website) Favicon
add_action('wp_head', function(){?>
	<link rel="Shortcut Icon" type="image/x-icon" href="<?php echo get_option('fc_plugin_options')['fc_frontend_ico']; ?>" />
	<link rel="apple-touch-icon" type="image/png" href="<?php echo get_option('fc_plugin_options')['fc_frontend_png']; ?>" />
	<?php
});

// Back-End (Dashboard) Favicon
add_action('admin_head', function(){?>
	<link rel="Shortcut Icon" type="image/x-icon" href="<?php echo get_option('fc_plugin_options')['fc_backend_ico']; ?>" />
	<link rel="apple-touch-icon" type="image/png" href="<?php echo get_option('fc_plugin_options')['fc_backend_png']; ?>" />
	<?php
});

// Login (User-Access) Favicon
add_action('login_head', function(){?>
	<link rel="Shortcut Icon" type="image/x-icon" href="<?php echo get_option('fc_plugin_options')['fc_login_ico']; ?>" />
	<link rel="apple-touch-icon" type="image/png" href="<?php echo get_option('fc_plugin_options')['fc_login_png']; ?>" />
	<?php
});

/*
* Favicon Controller Back-link in Admin Dashboard Footer
*/
add_action( 'in_admin_footer', function(){
	echo '<div>Thank you for Using <a href="http://css-gen.com/products/wp-plugins/favicon-controller/" title="Favicon Controller" >Favicon Controller</a>.<br /></div>';
});

?>