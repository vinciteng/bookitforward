<?php

	/*	
	*	Crunchpress Function Registered File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		Crunchpress
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) Crunchpress
	*	---------------------------------------------------------------------
	*	This file use to register the wordpress function to the framework,
	*	and also use filter to hook some necessary events.
	*	---------------------------------------------------------------------
	*/
	
	// enable and register custom sidebar
	if (function_exists('register_sidebar')){	
	
		// default sidebar array
		$sidebar_attr = array(
			'name' => '',
			'before_widget' => '<div class="custom-sidebar">',
			'after_widget' => '</div></div>',
			'before_title' => '<h2 class="custom-sidebar-title">',
			'after_title' => '</h2><div class="side-inner-holder">'
		);
		
			$sidebar_id = 0;
		$cp_sidebar = array("Search/Archive Left Sidebar", "Search/Archive Right Sidebar", "Footer Top 1", "Footer Top 2","Footer Top 3", "Footer Top 4", "Footer 1", "Footer 2", "Footer 3", "Footer 4", );
		$sidebar_attr['before_title'] = '<h2 class="custom-sidebar-title footer-title-color cp-title">';
		
		foreach( $cp_sidebar as $sidebar_name ){
			$sidebar_attr['name'] = $sidebar_name;
			$sidebar_slug = strtolower(str_replace(' ','-',$sidebar_name));
			$sidebar_attr['id'] = 'sidebar-' . $sidebar_slug ;
			$sidebar_attr['description'] = 'Please place widget here' ;
			register_sidebar($sidebar_attr);
		}

		$cp_sidebar = array("Shop Left Sidebar", "Shop Right Sidebar", "Site Map 1", "Site Map 2", "Site Map 3");
		$sidebar_attr['before_title'] = '<h2 class="custom-sidebar-title sidebar-title-color cp-title">';
		
		foreach( $cp_sidebar as $sidebar_name ){
			$sidebar_attr['name'] = $sidebar_name;
			$sidebar_slug = strtolower(str_replace(' ','-',$sidebar_name));
			$sidebar_attr['id'] = 'sidebar-' . $sidebar_slug ;
			$sidebar_attr['description'] = 'Please place widget here' ;
			register_sidebar($sidebar_attr);
		}
		
		$cp_sidebar = get_option( THEME_NAME_S.'_create_sidebar' );
		$sidebar_attr['before_title'] = '<h2 class="custom-sidebar-title sidebar-title-color cp-title">';
		
		if(!empty($cp_sidebar)){
			$xml = new DOMDocument();
			$xml->loadXML($cp_sidebar);
			foreach( $xml->documentElement->childNodes as $sidebar_name ){
				$sidebar_attr['name'] = $sidebar_name->nodeValue;
				$sidebar_attr['id'] = 'custom-sidebar' . $sidebar_id++ ;
				register_sidebar($sidebar_attr);
			}
		}
		
	}
	
	// enable featured image
	if(function_exists('add_theme_support')){
		add_theme_support('post-thumbnails');
	}
	
	// enable editor style
	add_editor_style('custom-editor-style.css');
	
	// enable navigation menu
	if(function_exists('add_theme_support')){
		add_theme_support('menus');
		register_nav_menus(array('header_menu' => 'Header Menu','main_menu' => 'Main Menu','footer_menu' => 'Footer Menu'));
	}
	
	// add filter to hook when user press "insert into post" to include the attachment id
	add_filter('media_send_to_editor', 'add_para_media_to_editor', 20, 2);
	function add_para_media_to_editor($html, $id){

		if(strpos($html, 'href')){
			$pos = strpos($html, '<a') + 2;
			$html = substr($html, 0, $pos) . ' attid="' . $id . '" ' . substr($html, $pos);
		}
		
		return $html ;
		
	}
	
	// enable theme to support the localization
	add_action('init', 'cp_word_translation');
	function cp_word_translation(){
		
		global $cp_admin_translator;
		
			load_theme_textdomain( 'crunchpress', get_template_directory() . '/languages/' );
			load_theme_textdomain( 'cp_front_end', get_template_directory() . '/languages/' );

		
	}

	// excerpt filter
	add_filter('excerpt_length','cp_excerpt_length');
	function cp_excerpt_length(){
		return 1000;
	}
	
	// Google Analytics
	$cp_enable_analytics = get_option(THEME_NAME_S.'_enable_analytics','disable');
	if( $cp_enable_analytics == 'enable' ){
		add_action('wp_footer', 'add_google_analytics_code');
	}
	function add_google_analytics_code(){
		
		echo get_option(THEME_NAME_S.'_analytics_code','');
	
	}
	
	// Custom Post type Feed
	add_filter('request', 'myfeed_request');
	function myfeed_request($qv) {
		if (isset($qv['feed']) && !isset($qv['post_type']))
		$qv['post_type'] = array('post', 'portfolio');
		return $qv;
	}

	// Translate the wpml shortcode
	// [wpml_translate lang=es]LANG 1[/wpml_translate]
	// [wpml_translate lang=en]LANG 2[/wpml_translate]

	function webtreats_lang_test( $atts, $content = null ) {
		extract(shortcode_atts(array( 'lang' => '' ), $atts));
		
		$lang_active = ICL_LANGUAGE_CODE;
		
		if($lang == $lang_active){
			return $content;
		}
	}
	
	
	
	//Get custom post type shown in archive
	/* function include_custom_post_types( $query ) { 
		global $wp_query;
		if ( is_category() || is_tag() || is_date()	) {
			$query->set( 'post_type' , 'portfolio' );
		}
		return $query;
	}
	add_filter( 'pre_get_posts' , 'include_custom_post_types' ); */
	
	// Add Another theme support
	add_filter('widget_text', 'do_shortcode');
	add_theme_support( 'automatic-feed-links' );	
	
	if ( ! isset( $content_width ) ){ $content_width = 980; }
	
	/* Flush rewrite rules for custom post types. */
	add_action( 'load-themes.php', 'cp_flush_rewrite_rules' );
	function cp_flush_rewrite_rules() {
		global $pagenow, $wp_rewrite;
		if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) )
			$wp_rewrite->flush_rules();
	}
	

	

        //Funtion to display feedburner subscription in footer
 	  function social_media_footer () {
	
				$cp_icon_type = 'light';
				$cp_social_icon = array(
					'dribbble'=> array('name'=>THEME_NAME_S.'_dribbble', 'id'=> 'social_dribbble'),
					'facebook' => array('name'=>THEME_NAME_S.'_facebook', 'id'=> 'social_facebook'),
					'linkedin' => array('name'=>THEME_NAME_S.'_linkedin', 'id'=> 'social_linkedin'),
					'tumblr'=> array('name'=>THEME_NAME_S.'_tumblr', 'id'=> 'social_trumblr'),
					'twitter' => array('name'=>THEME_NAME_S.'_twitter', 'id'=> 'social_twitter'),
					'vimeo' => array('name'=>THEME_NAME_S.'_vimeo', 'id'=> 'social_vimeo'),
					'youtube' => array('name'=>THEME_NAME_S.'_youtube', 'id'=> 'social_youtube'),
					'google_plus' => array('name'=>THEME_NAME_S.'_google_plus', 'id'=> 'social_google_plus'),
					'pinterest' => array('name'=>THEME_NAME_S.'_pinterest', 'id'=> 'social_pinterest')
					);
				
				foreach( $cp_social_icon as $social_name => $social_icon ){
				
					$social_link = get_option($social_icon['name']);
					if( !empty($social_link) ){
					 	echo '<a id='. $social_icon['id'].' class="social_active" target="_blank" href="' . $social_link . '"><span></span>' ;
						echo '</a>';
					  global $social_name;
					}	
				}
				
	}    
		
		
	function themeple_ajax_dummy_data(){
			require_once CP_FW . '/extensions/importer/dummy_data.inc.php';
			die('themeple_dummy');
		}
		add_action('wp_ajax_themeple_ajax_dummy_data', 'themeple_ajax_dummy_data');
		
       // Add to your init function
		function my_search_form( $form ) {
			$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
			<div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
			<input type="text" value="' . get_search_query() . '" name="s" id="s" />
			<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
			</div>
			</form>';
		
			return $form;
		}
		
		add_filter( 'get_search_form', 'my_search_form' );