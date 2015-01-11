<?php
/*
Plugin Name: Capital Shortcodes
Plugin URI: http://capitalh.ir
Description: insert shortcodes easily into your posts/pages
Version: 2.0
Author: CapitalH.ir
Author URI: http://capitalh.ir
Author Email: capitalh.ir@gmail.com
License:

  Copyright 2013 CapitalH.ir (capitalh.ir@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as 
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
  
*/

class Capital_Shortcodes {
	 
	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/
	
	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {
		
		// Load plugin text domain
		add_action( 'init', array( $this, 'plugin_textdomain' ) );

		// Register admin styles and scripts
		add_action( 'admin_print_styles', array( $this, 'register_admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_scripts' ) );
	
		// Register site styles and scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_scripts' ) );
		
		//adds shortcodes readability to widget areas
		add_filter('widget_text', 'do_shortcode');
	
		// Register hooks that are fired when the plugin is activated, deactivated, and uninstalled, respectively.
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
		
		 
		include( plugin_dir_path( __FILE__ ) . 'shortcodes.php' );
	    add_action('media_buttons_context',  'add_capital_shortcodes_button');
		
		function add_capital_shortcodes_button($context) {

		  //path to my icon
		  $img = plugins_url('capital-shortcodes/images/capital-shortcodes.png');

		  //our popup's title
		  $title = 'Capital Shortcodes';

		  //append the icon
		  $context .= "<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?width=670&height=600' class='thickbox' title='{$title}'>
			<img style='padding:0;vertical-align:text-bottom;margin-right:3px;' src='{$img}' />Capital Shortcodes</a>";

		  return $context;
		}


	} // end constructor

	/**
	 * Loads the plugin text domain for translation
	 */
	public function plugin_textdomain() {
	
		$domain = 'capital_themes';
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
        load_textdomain( $domain, WP_LANG_DIR.'/'.$domain.'/'.$domain.'-'.$locale.'.mo' );
        load_plugin_textdomain( $domain, FALSE, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );

	} // end plugin_textdomain

	/**
	 * Registers and enqueues admin-specific styles.
	 */
	public function register_admin_styles() {
	
		wp_enqueue_style( 'capital-shortcodes-admin-styles', plugins_url( 'capital-shortcodes/css/admin.css' ) );
	
	} // end register_admin_styles

	/**
	 * Registers and enqueues admin-specific JavaScript.
	 */	
	public function register_admin_scripts() {
	
		wp_enqueue_script( 'capital-shortcodes-admin-script', plugins_url( 'capital-shortcodes/js/admin.js' ), array('jquery'), '1.0' , true );
	
	} // end register_admin_scripts
	
	/**
	 * Registers and enqueues plugin-specific styles.
	 */
	public function register_plugin_styles() {
	
		wp_enqueue_style( 'capital-shortcodes-plugin-styles', plugins_url( 'capital-shortcodes/css/display.css' ) );
	
	} // end register_plugin_styles
	
	/**
	 * Registers and enqueues plugin-specific scripts.
	 */
	public function register_plugin_scripts() {
	
		wp_enqueue_script( 'capital-shortcodes-plugin-script', plugins_url( 'capital-shortcodes/js/display.js' ), array('jquery', 'jquery-ui-accordion', 'jquery-ui-tabs'), '', true );
		wp_enqueue_script('jquery-ui-tabs', '', array('jquery'), '', true);
		wp_enqueue_script('jquery-ui-accordion', '', array('jquery'), '', true);
	
	} // end register_plugin_scripts

} // end class

$Capital_Shortcodes = new Capital_Shortcodes();
