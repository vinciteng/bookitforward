<?php

// Check if woocommerce plugin active

function cp_woocommerce_enabled()

{
	if (defined("WOOCOMMERCE_VERSION")) { return true; }
	return false;
}

// Query whether WooCommerce is activated.
if(!function_exists('is_woocommerce_activated')){
	function is_woocommerce_activated(){
		if(class_exists('woocommerce')){
			$is_woocommerce_active = true;
		}
		else{
			$is_woocommerce_active = false;
		}
		return $is_woocommerce_active;
	}
}

/* If WooCommerce is active then we load the plugin. */

global $cp_config;

add_filter( 'woocommerce_enqueue_styles', '__return_false' );

add_theme_support( 'woocommerce' );


global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action('init', 'woo_install_theme', 1);
function woo_install_theme() {
 
}
######################################################################
# Create the correct template html structure
######################################################################

//remove woo defaults
//remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action( 'woocommerce_before_main_content', 'cp_woocommerce_before_main_content', 10);
add_action( 'woocommerce_after_main_content', 'cp_woocommerce_after_main_content', 10);	

function cp_woocommerce_before_main_content() {
	
	   global $cp_config;
		 global $paged, $sidebar, $left_sidebar, $right_sidebar;
		$left_sidebar = "Shop Left Sidebar";
		$right_sidebar = "Shop Right Sidebar";
			
		$sidebar = get_option ( THEME_NAME_S . '_products_single_page_sidebar', 'no-sidebar' );
        $sidebar = str_replace('single-product-', '', $sidebar) ; 
		    $bcontainer_class ='';
		    $sidebar_class = '';
        if ($sidebar == "left-sidebar" || $sidebar == "right-sidebar") {
            $sidebar_class = "sidebar-included " . $sidebar;
			$container_class = "span9";
        } else if ($sidebar == "both-sidebar") {
            $sidebar_class = "both-sidebar-included";
			 $bcontainer_class ="span9";
			 $container_class = "span8";
        } else {
		    $container_class = "span12";	
		}
		
		   
	       echo '<section id="content-holder" class="container-fluid">';
	          echo '<section class="container">';
		        echo '<div class="row-fluid '.$sidebar_class.'">';
		       	   echo "<div class='".$bcontainer_class." cp-page-float-left'>";
				 		echo "<div class='".$container_class. " page-item'>";
						
	}
function cp_woocommerce_after_main_content()
{ 
	  
       
			echo "</div>"; // end of cp-page-item
							echo "</div>"; // end of cp-page-item
		            	    get_sidebar ( 'left' );
							echo "</div>"; // cp-page-float-left
		                	get_sidebar ( 'right' );
		 	
		      
        
    
   			 echo '</div>';
       echo '</section>';
       echo '</section>';
}


remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action( 'woocommerce_pagination', 'woocommerce_pagination', 10 );
/*remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action( 'woocommerce_pagination', 'woocommerce_catalog_ordering', 20 );
remove_action( 'woocommerce_pagination', 'woocommerce_pagination', 10 );
//single page removes
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display');
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10, 2);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20, 2);

remove_action( 'woocommerce_product_tabs', 'woocommerce_product_description_tab', 10 );
remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
remove_action( 'woocommerce_before_single_product', array($woocommerce, 'show_messages'), 10);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30, 2 );*/



//add theme actions && filter
//add_action( 'woocommerce_before_main_content', 'cp_woocommerce_before_main_content', 10);
//add_action( 'woocommerce_after_main_content', 'cp_woocommerce_after_main_content', 10);
//remove_action( 'woocommerce_template_loop_product_thumbnail', 10 );
//remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnaild', 10 );
//remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
//remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
//add_action( 'woocommerce_after_shop_loop', 'cp_woocommerce_after_shop_loop', 10);
//add_action( 'woocommerce_before_shop_loop_item', 'cp_woocommerce_thumbnail', 10);
//add_action( 'woocommerce_after_shop_loop_item_title', 'cp_woocommerce_overview_excerpt', 10);
//add_filter( 'loop_shop_columns', 'cp_woocommerce_loop_columns');
//add_filter( 'loop_shop_per_page', 'cp_woocommerce_product_count' );


//single page adds
//add_action( 'woocommerce_before_single_product', 'check_cp_title', 1);
//add_action( 'woocommerce_single_product_summary', array($woocommerce, 'show_messages'), 10);
//add_action( 'woocommerce_single_product_summary', 'cp_woocommerce_template_single_excerpt', 10, 2);
//add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 50);
//add_action( 'woocommerce_single_product_summary', 'cp_woocommerce_output_related_products', 60);
//add_action( 'woocommerce_single_product_summary', 'cp_woocommerce_output_upsells', 70);
//add_action( 'woocommerce_before_single_product_summary', 'cp_woocommerceproduct_prev_image', 1,  2);
//add_action( 'woocommerce_before_single_product_summary', 'cp_add_summary_div', 2);
//add_action( 'woocommerce_after_single_product_summary',  'cp_close_summary_div', 1000);
//add_action( 'cp_add_to_cart', 'woocommerce_template_single_add_to_cart', 30, 2 );

//add_action( 'woocommerce_product_thumbnails', 'cp_woocommerceproduct_prev_image_after', 1000 );

//add_filter( 'single_product_small_thumbnail_size', 'cp_woocommerce_thumb_size');
//add_filter( 'cp_sidebar_menu_filter', 'cp_woocommerce_sidebar_filter');



//check if the plugin is enabled, otherwise stop the script


remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display');

//register my own styles, remove wootheme stylesheet

if(!is_admin()){
	add_action('init', 'cp_woocommerce_register_assets');
	
}
/*define('WOOCOMMERCE_USE_CSS', false);*/

function cp_woocommerce_register_assets()

{
	wp_enqueue_style( 'cp-woocommerce-css', CP_PATH_URL.'/woocommerce/woocommerce-mod.css');
	wp_enqueue_script( 'cp-woocommerce-js', CP_PATH_URL.'/woocommerce/woocommerce-mod.js', array('jquery'), 1, true);
}



//add cp_framework config defaults

$cp_config['shop_overview_column']  = get_option('cp_woocommerce_column_count');  // columns for the overview page
$cp_config['shop_overview_products']= get_option('cp_woocommerce_product_count'); // products for the overview page
$cp_config['shop_single_column'] 	 = 4;			// columns for related products and upsells
$cp_config['shop_single_column_items'] 	 = 4;	// number of items for related products and upsells
$cp_config['shop_overview_excerpt'] = false;		// display excerpt

if(!$cp_config['shop_overview_column']) $cp_config['shop_overview_column'] = 3;


if(cp_woocommerce_enabled()) { 
function cp_collect_shop_urls()

{
	global $woocommerce;
	$url['cart']				= $woocommerce->cart->get_cart_url();
	$url['checkout']			= $woocommerce->cart->get_checkout_url();
	$url['account_overview'] 	= get_permalink(get_option('woocommerce_myaccount_page_id'));
	$url['account_edit_adress']	= get_permalink(get_option('woocommerce_edit_address_page_id'));
	$url['account_view_order']	= get_permalink(get_option('woocommerce_view_order_page_id'));
	$url['account_change_pw'] 	= get_permalink(get_option('woocommerce_change_password_page_id'));
	$url['logout'] 				= wp_logout_url(home_url('/'));
	$url['register'] 			= site_url('wp-login.php?action=register', 'login');
	return $url;
}

function cp_shop_nav()

{

	$output = "";
	$url = cp_collect_shop_urls();
	$output .= "<ul class='cp_shop_url'>";
	if( is_user_logged_in() )
	{
		$output .= "<li><a class='account_overview_link' title='Account' href='".$url['account_overview']."'>".__('My Account ', 'cp_framework')."</a></li> ";
	       /*	$output .= "<li ><a class='account_login_link'  title='logout' href='".$url['logout']."'>".__('Log Out', 'cp_framework ')."</a></li>";*/
		/*$output .= "<li class='account_change_pw_link'><a href='".$url['account_change_pw']."'>".__('Change Password', 'cp_framework')."</a></li>";*/
			/*$output .= "<li class='account_edit_adress_link'><a href='".$url['account_edit_adress']."'>".__('Edit Address', 'cp_framework')."</a></li>";*/
			$output .= "<li><a class='account_view_order_link'  title='Order' href='".$url['account_view_order']."'>".__('View Order ', 'cp_framework')."</a></li>";
	}else
	{
		if(get_option('users_can_register')) 
		{
			$output .= "<li><a class='register_link' title='Register' href='".$url['register']."'>".__('Register', 'cp_framework')."</a></li> ";
		}
		$output .= "<li><a class='account_login_link' title='Log In' href='".$url['account_overview']."'>".__('Log In ', 'cp_framework')."</a></li>";
	}

	$output .= "<li><a class='shopping_cart_link' title='Cart' href='".$url['cart']."'>".__('Cart', 'cp_framework')."</a></li>";
	$output .= "<li><a class='checkout_link' title='Checkout' href='".$url['checkout']."'>".__('Checkout', 'cp_framework')."</a></li>";
	$output .= "</ul>";
	
	{
		return $output;
	} 
}

function cp_shop_nav_top()

{

	$output = "";
	$url = cp_collect_shop_urls();
	echo "<ul class='user-login-link'>";
	if( is_user_logged_in() )
	{   
	  global $current_user;
        get_currentuserinfo();
       echo '<li>'.__('Welcome! ','crunchpress').'<a>' . $current_user->display_name . "\n</a></li>";
		/*echo  "<li><a title='Account' href='".$url['account_overview']."'>".__('My Account ', 'cp_framework')."</a></li>";*/
	       echo "<li ><a title='logout' href='".$url['logout']."'>".__('Log Out', 'cp_framework ')."</a></li>";
		/*$output .= "<li class='account_change_pw_link'><a href='".$url['account_change_pw']."'>".__('Change Password', 'cp_framework')."</a></li>";*/
			/*$output .= "<li class='account_edit_adress_link'><a href='".$url['account_edit_adress']."'>".__('Edit Address', 'cp_framework')."</a></li>";*/
			/*echo "<li><a title='Order' href='".$url['account_view_order']."'>".__('View Order ', 'cp_framework')."</a></li>";*/
	}else
	
	{
		
		echo '<li>'.__('Welcome!','crunchpress').'</li>';
	  echo "<li><a title='Log In' href='".$url['account_overview']."'>".__('Log In ', 'cp_framework')."</a></li>";
	  
	  if(get_option('users_can_register')) 
		{
			echo "<li>or <a title='Register' href='".$url['register']."'>".__('Creat an Account', 'cp_framework')."</a></li> ";
		}
	}
      
 
    echo  "</ul>";
	
	{
	
	} 
}
 }
#
# helper function that collects all the necessary urls for the shop navigation
#

function cp_add_to_cart($post, $_product )

{
	echo "<div class='cp_cart cp_cart_".$_product->product_type."'>";
	do_action( 'cp_add_to_cart', $post, $_product );
	echo "</div>";
}

#
# shopping cart dropdown in the main menu
#

function cp_woocommerce_cart_dropdown()

{
	 the_widget('WooCommerce_Widget_CartPlus');
	/*global $woocommerce;
	$cart_subtotal = $woocommerce->cart->get_cart_subtotal();
	$link = $woocommerce->cart->get_cart_url();
	ob_start();
    the_widget('WooCommerce_Widget_CartPlus', '', array('widget_id'=>'cart-dropdown',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<span class="hidden">',
        'after_title' => '</span>'
		

    ));*/
   /* $widget = ob_get_clean();
	$output = "";
	$output .= "<ul class = 'cart_dropdown' data-success='".__('Product added', 'cp_framework')."'><li class='cart_dropdown_first'>";
	$output .= "<a class='cart_dropdown_link' href='".$link."'>".__('Cart', 'cp_framework')."</a><span class='cart_subtotal'>".$cart_subtotal."</span>";
	$output .= "<div class='dropdown_widget dropdown_widget_cart'>";
	$output .= $widget;
	$output .= "</div>";
	$output .= "</li></ul>";
	return $output;*/
	

    /*$widget = ob_get_clean();
	$output = "<div class='widget_shopping_cart'>";
	$output .= "<ul class = 'cart_dropdown' data-success='".__('Product added', 'crunchpress')."'><li class='cart_dropdown_first'>";
	$output .= "<span class='cart-btn2'><a></a></span> <a class='cart_dropdown_link' href='".$link."'>".__('Cart', 'crunchpress')."</a>";
	$output .= "<div class='dropdown_widget dropdown_widget_cart'>";
	$output .= $widget;
	$output .= "</div>";
	$output .= "</li></ul>";
	$output .=  '<div class="btn-group">
              <div class="btn btn-mini dropdown-toggle cart_dropdown2"><span class="cart_count">'. __('Subtotal','crunchpress').'</span> - <span class="cart_subtotal">'.$cart_subtotal.'</span></div>
            </div>';
			*/
			

	return $output;
}

#
# modify shop overview product count
#

function cp_woocommerce_product_count() 

{
	global $cp_config;
	return $cp_config['shop_overview_products'];
}

add_filter('cp_style_filter', 'cp_wooceommerce_colors');
