<?php

/* Register the required plugins for this theme. */
add_action( 'tgmpa_register', 'tokokoo_register_required_plugins' );

/* Load the TGM_Plugin_Activation class. */
require_once( trailingslashit ( TOKOKOO_CLASS ) . 'class-tgm-plugin-activation.php' );

/**
 * Register the required plugins for this theme.
 *
 * @since 1.0
 */
function tokokoo_register_required_plugins() {

	/* Plugins lists. */
	$plugins = array(

		array(
			'name'     				=> 'Tokokoo Extensions',
			'slug'     				=> 'tokokoo-extensions',
			'source'   				=> get_stylesheet_directory() .'/inc/plugins/tokokoo-extensions.zip',
			'required' 				=> true,
			'version' 				=> '1.0.2',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false
		),

		array(
			'name' 		=> 'Woocommerce',
			'slug' 		=> 'woocommerce',
			'required' 	=> true,
		),

		array(
			'name' 		=> 'Regenerate Thumbnails',
			'slug' 		=> 'regenerate-thumbnails',
			'required' 	=> true,
		),

		array(
			'name'     => 'YITH WooCommerce Ajax Search',
			'slug'     => 'yith-woocommerce-ajax-search',
			'required' => false
		),

		array(
			'name'     => 'YITH WooCommerce Wishlist',
			'slug'     => 'yith-woocommerce-wishlist',
			'required' => false
		),
						
		array(
			'name'     => 'XTENSIONPRESS Woocommerce Catalog Mode',
			'slug'     => 'woocommerce-catalog-mode-by-xtensionpress-v1.0',
			'source'   => get_stylesheet_directory() .'/inc/plugins/woocommerce-catalog-mode-by-xtensionpress-v1.0.zip',
			'required' => false
		),
		
		array(
			'name'     => 'Koo Shortcodes',
			'slug'     => 'koo-shortcodes',
			'source'   => get_stylesheet_directory() .'/inc/plugins/koo-shortcodes.zip',
			'required' => false
		),

		array(
			'name'     => 'Revolution Slider',
			'slug'     => 'revslider',
			'source'   => get_stylesheet_directory() .'/inc/plugins/revslider.zip',
			'required' => false
		)

	);

	$theme_text_domain = 'raakbookoo';
	$config = array(
		'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', 'raakbookoo' ),
			'menu_title'                       			=> __( 'Install Plugins', 'raakbookoo' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'raakbookoo' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'raakbookoo' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'raakbookoo' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'raakbookoo' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'raakbookoo' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}
?>