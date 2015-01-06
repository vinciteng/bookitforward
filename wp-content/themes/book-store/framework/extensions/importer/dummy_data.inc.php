<?php
	/** 
     * @Author: NasirHayat
	   @Url: http://nasirhayat.com
     * @Version 2013 (crunchpress)
	   @Rights Reserved 2013
     */          
	 
	        
			
			if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);
			
			require_once ABSPATH . 'wp-admin/includes/import.php';
			
			$import_filepath = get_template_directory()."/framework/extensions/importer/dummy_data";
			$errors = false;
			if ( !class_exists( 'WP_Importer' ) ) {
				$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
				if ( file_exists( $class_wp_importer ) )
				{
					require_once $class_wp_importer;
				}
				else
				{
					$errors = true;
				}
			}
			if ( !class_exists( 'WP_Import' ) ) {
				$wp_importer = CP_FW. '/extensions/importer/wordpress-importer.php';
				
				  
				  
				  
				if ( file_exists( $wp_importer ) )
				{
					require_once $wp_importer ;
				}
				else
				{
					$errors = true;
				}
			}
			
			if($errors){
			   echo "Errors while loading classes. Please use the standart wordpress importer."; 
			}else{
    
			
			include_once 'default_dummy_data.inc.php';
			
	    	
			
			if(!is_file($import_filepath.'_1.xml'))
			{
				echo "Problem with dummy data file. Please check the permisions of the xml file";
			}
			else
			{  
			   if(class_exists( 'WP_Import' )){
					
			$menuname = $lblg_themename . 'Main Menu'; $bpmenulocation = 'main_menu'; $menu_exists = wp_get_nav_menu_object( $menuname );
			if( !$menu_exists){ $menu_id = wp_create_nav_menu($menuname); if( !has_nav_menu( $bpmenulocation ) ){ $locations = get_theme_mod('nav_menu_locations');	$locations[$bpmenulocation] = $menu_id;	set_theme_mod( 'nav_menu_locations', $locations ); }
			} 
        	$menuname2 = $lblg_themename2 . 'Header Menu'; $bpmenulocation2 = 'header_menu'; $menu_exists2 = wp_get_nav_menu_object( $menuname2 ); if( !$menu_exists){	$menu_id = wp_create_nav_menu($menuname2); if( !has_nav_menu( $bpmenulocation2 ) ){	$locations2 = get_theme_mod('nav_menu_locations'); $locations2[$bpmenulocation2] = $menu_id; set_theme_mod( 'nav_menu_locations', $locations2 ); }
			}
		    $menuname3 = $lblg_themename3 . 'Footer Menu'; $bpmenulocation3 = 'footer_menu'; $menu_exists3 = wp_get_nav_menu_object( $menuname3 ); if( !$menu_exists){	$menu_id = wp_create_nav_menu($menuname3); if( !has_nav_menu( $bpmenulocation3 ) ){	$locations3 = get_theme_mod('nav_menu_locations'); $locations3[$bpmenulocation3] = $menu_id; set_theme_mod( 'nav_menu_locations', $locations3 ); }
			} 	
		  
	        
			$our_class = new themeple_dummy_data();
			$our_class->fetch_attachments = true;
			
			/* $our_class->import($import_filepath.'megamenu.xml');*/
			 $our_class->import($import_filepath.'_1.xml');
			//Default Settings Saved End
			$sidebars_widgetss = array ( 
			'wp_inactive_widgets' => array ( ), 
			'sidebar-footer-top-1' => array ( 0 => 'cp_subscribe-multi'),
			'sidebar-footer-top-2' => array ( 0 => 'recent-comments'),
			'sidebar-footer-top-3' => array ( 0 => 'text-5', ),
			'sidebar-footer-top-4' => array ( 0 => 'text-4'),
			'sidebar-footer-1' => array ( 0 => 'woocommerce_recently_viewed_products-3'),
			'sidebar-footer-2' => array ( 0 => 'woocommerce_top_rated_products-3'),
			'sidebar-footer-3' => array ( 0 => 'rpwe_widget'),
			'array_version' => 3 , );
			 
			/*save_option('sidebars_widgets','', $sidebars_widgetss);*/
		    
			save_option('widget_cp_subscribe-multi-3',get_option('widget_cp_subscribe-multi-3'), array ( 'title' => 'NewsLetter', 'feedId'=>'Crunchpress' ) );
			save_option('widget_recent-comments', get_option('widget_recent-comments'), array ( 'title' => 'Comments', 'number' => '5' ) );	
		    save_option('widget_rpwe_widget',get_option('widget_rpwe_widget'), array ( 'title' => 'From the blog', 'limit' => '5', 'cat' => '0', 'post_type' => 'post' )  );	
		 	save_option('widget_woocommerce_recent_reviews', get_option('widget_woocommerce_recent_reviews'),  array ( 'title' => 'Reviewed Products', 'number' => '5', '_multiwidget' =>'1' ) );
			save_option('widget_woocommerce_top_rated_products', get_option('widget_woocommerce_top_rated_products'),  array ( 'title' => 'Top Rated Products', 'number' => '5', '_multiwidget' =>'1'  ) );
			
			
			//Home Page Settings
			$text4 = array();
			$text4 = get_option('widget_text');
			$text4[4] = array(
								"title"			=>	'Opening Time',
								"text"			=>	'<p>Monday-Friday ______8.00 to 18.00</p><p>Saturday ____________ 9.00 to 18.00</p><p>Sunday _____________10.00 to 16.00</p><p>Every 30 day of month Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
								);						
			$text4['_multiwidget'] = '1';
			update_option('widget_text',$text4);
			$text4 = get_option('widget_text');
			krsort($text4);
			foreach($text4 as $key1=>$val1)
			{
				$text4_key = $key1;
				if(is_int($text4_key))
				{
					break;
				}
			}
			
			$sidebars_widgets["Footer Top 4"] = array("text-$text4_key");
			
			//////////////////////////////////////////////////////////
			
				$text5 = array();
			$text5 = get_option('widget_text');
			$text5[5] = array(
								"title"			=>	'Location',
								"text"			=>	'<p>5/23, Loft Towers, Business Center, 6th Floor, Media City, Dubai.</p><span><ul class="phon-list"><li>(971) 438-555-314</li><li>(971) 367-252-333</li></ul></span> <span class="mail-list"> <a href="#">info@companyname</a><br><a href="#">jobs@companyname.com</a> </span> ',
								);						
			$text4['_multiwidget'] = '1';
			update_option('widget_text',$text5);
			$text4 = get_option('widget_text');
			krsort($text5);
			foreach($text5 as $key1=>$val1)
			{
				$text5_key = $key1;
				if(is_int($text5_key))
				{
					break;
				}
			}
			
			$sidebars_widgets["Footer Top 3"] = array("text-$text5_key");
			 
			$front_page = get_page_by_title ('Home'); update_option('page_on_front',$front_page->ID); update_option('show_on_front','page');
			
			/*$blog_page = get_page_by_title ('Blog');
			update_option('page_for_posts',$blog_page->ID);*/
		
			update_option(THEME_NAME_S.'_footer_style', 'footer-style4'); update_option(THEME_NAME_S.'_facebook', 'http://crunchpress.com/'); update_option(THEME_NAME_S.'_flickr', 'http://crunchpress.com/'); update_option(THEME_NAME_S.'_skype', 'http://crunchpress.com/'); update_option(THEME_NAME_S.'_twitter', 'http://crunchpress.com/'); update_option(THEME_NAME_S.'_linkedin', 'http://crunchpress.com/');
			update_option(THEME_NAME_S.'_create_sidebar', '<sidebar><name>Right Sidebar</name><name>Left Sidebar</name></sidebar>');
			update_option(THEME_NAME_S.'_background_style', 'None');
          
		  	
			
        }
	}    
}


?>