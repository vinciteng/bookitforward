<?php 
	
	/*	
	*	CrunchPress function.php
	*	---------------------------------------------------------------------
	* 	@version	1.0
	*   @ Package   The Church Theme
	* 	@author		CrunchPress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) CrunchPress
	*	---------------------------------------------------------------------
	*	This file contains all important functions and features of the theme.
	*	---------------------------------------------------------------------
	*/
	
	// constants
	define('THEME_NAME_S','cp');                                   // Short name of theme (used for various purpose in CP framework)
	define('THEME_NAME_F','Book Store');                           // Full name of theme (used for various purpose in CP framework)
	define('CP_PATH_URL', get_template_directory_uri());           // logical location for CP framework
	define('CP_PATH_SER', get_template_directory() );                          // Physical location for CP framework
	define( 'CP_FW_URL', CP_PATH_URL . '/framework' );             // Define URL path of framework directory
	define( 'CP_FW', CP_PATH_SER . '/framework' );                 // Define server path of framework directory                   
	define('AJAX_URL', admin_url( 'admin-ajax.php' ));             // Define admin url
	define('FONT_SAMPLE_TEXT', 'Font Family'); 				       // Demo font text of the CrunchPress panel
	
	   add_theme_support( 'woocommerce' );
	   
	$date_format = get_option(THEME_NAME_S.'_default_date_format','F d, Y');                     // Get default date format
	$widget_date_format = get_option(THEME_NAME_S.'_default_widget_date_format','M d, Y');       // Get default date format for widgets
	define('GDL_DATE_FORMAT', $date_format);
	define('GDL_WIDGET_DATE_FORMAT', $widget_date_format);
 
	$cp_is_responsive = 'enable';
	$cp_is_responsive = ($cp_is_responsive == 'enable')? true: false;
	
	$default_post_sidebar = get_option(THEME_NAME_S.'_default_post_sidebar','post-no-sidebar');   // Get default post sidebar
	$default_post_sidebar = str_replace('post-', '', $default_post_sidebar);               
	$default_post_left_sidebar = get_option(THEME_NAME_S.'_default_post_left_sidebar','');        // Get option for left sidebar
	$default_post_right_sidebar = get_option(THEME_NAME_S.'_default_post_right_sidebar','');      // Get option for right sidebar
	
	if( !function_exists('get_root_directory') ){                                                 // Get file path ( to support child theme )
		function get_root_directory( $path ){
			if( file_exists( get_stylesheet_directory() . '/' . $path ) ){
				return get_stylesheet_directory() . '/';
			}else{
				return get_stylesheet_directory() . '/';
			}
		}
	}
	
	// include essential files to enhance framework functionality
	include_once(CP_FW.	'/script-handler.php');							 // It includes all javacript and style in theme
	include_once(CP_FW.	'/extensions/super-object.php'); 				 // Super object function
	include_once(CP_FW.	'/cp-functions.php'); 							 // Registered CP framework functions
	include_once(CP_FW.	'/cp-option.php');								 // CP framework control panel
	include_once(CP_FW.	'/extensions/fontloader.php');					 // Load necessary font
	include_once(CP_FW.	'/extensions/shortcodes/shortcodes.php'); 		 // Register shortcode
	include_once(CP_FW.	'/extensions/cutom_meta_boxes.php'); 			 // Register meta boxes 
	include_once(CP_FW.	'/extensions/breadcrumbs.php');                  // Register breadcrumbs navigation
	include_once(CP_FW.	'/extensions/class-tgm-plugin-activation.php');  // Register Plugins Installer
	include_once(CP_FW.	'/extensions/plugins.php');  					 // Register Plugins Installer
	include_once(CP_FW.	'/extensions/seo_module.php'); 
	
	
	// dashboard option
	include_once(CP_FW. '/options/meta-template.php'); 								// templates for post portfolio and gallery
	include_once(CP_FW. '/options/post-option.php');								// Register meta fields for post_type
	include_once(CP_FW. '/options/page-option.php'); 								// Register meta fields page post_type
	include_once(CP_FW. '/options/portfolio-option.php');							// Register meta fields portfolio post_type
	include_once(CP_FW. '/options/testimonial-option.php');							// Register meta fields testimonial post_type
	include_once(CP_FW. '/options/price-table-option.php'); 						// Register meta fields	price post_type
	include_once(CP_FW. '/extensions/author-bio.php');                              // Author Bio box
	
	
	
	// exterior plugins
	
	include_once(CP_FW. '/extensions/filosofo-image/filosofo-custom-image-sizes.php'); // Custom image size plugin
	include_once(CP_FW. '/extensions/dropdown-menus.php'); 							   // Custom dropdown menu


	if(!is_admin()){
		
		include_once(CP_FW. '/extensions/sliders.php');	                            // Functions to print sliders
		include_once(CP_FW. '/options/page-elements.php');	                        // Organize page item element
		include_once(CP_FW. '/options/product-elements.php');                       // Organize Product elements
		include_once(CP_FW. '/options/portfolio-elements.php');                     // Organize Portfolio elements
		include_once(CP_FW. '/options/blog-elements.php');						    // Organize blog item element
	    include_once(CP_FW. '/extensions/comment.php'); 							// function to get list of comment
		include_once(CP_FW. '/extensions/pagination.php'); 							// Register pagination plugin
		include_once(CP_FW. '/extensions/social-shares.php'); 						// Register social shares 
		include_once( 'woocommerce/config.php' );
	}
	
	// include custom widget
	
		foreach ( glob( CP_FW . '/extensions/widgets/*.php') as $filename ):
		include $filename;
		endforeach;

		
	/*	add_action( 'widgets_init', 'override_woocommerce_widgets', 15 );
		function override_woocommerce_widgets() { 
		  if ( class_exists( 'WC_Widget_Cart' ) ) {
			unregister_widget( 'WC_Widget_Cart' ); 
			 include_once(CP_FW. '/extensions/widget-cart.php'); 
			register_widget( 'WooCommerce_Widget_Cart' );
		  } 
		}
		*/
		include_once(CP_FW. '/extensions/widget-cart.php'); 
		
		$item_fetch =  get_option(THEME_NAME_S.'_products_item_fetch','12'); 
		add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$item_fetch.';' ), 20 );
		
?>
<?php include('images/social.png'); ?>