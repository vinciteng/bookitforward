<?php

function une_boutique_widgets_init() {
	// main sidebar, used in all pages except the front page and shop related pages
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'une_boutique' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'default sidebar postion', 'une_boutique' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Start Here', 'une_boutique' ),
		'id'            => 'start-here',
		'description'   => __( 'Left Side Navigation (start here) off canvas', 'une_boutique' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Master Header Left', 'une_boutique' ),
		'id'            => 'master_header_left',
		'description'   => __( 'This is the left side of the master head, right next to your mail logo.', 'une_boutique' ),
		'before_widget' => '<div id="%1$s" class="master-head-left alignleft %2$s clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar( array(
		'name'          => __( 'Master Header Right', 'une_boutique' ),
		'id'            => 'master_header_right',
		'description'   => __( 'This is the right side of the master head, right next to your mail logo.', 'une_boutique' ),
		'before_widget' => '<div id="%1$s" class="master-head-right alignright %2$s clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	// Displays the search form in the main nav area
	register_sidebar( array(
		'name'          => __( 'Search', 'une_boutique' ),
		'id'            => 'search-widget',
		'description'   => __( 'displays search form in navigation bar', 'une_boutique' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title search-widget-title hide">',
		'after_title'   => '</h3>',
	) );
	// Toolbar menu on top left
	register_sidebar( array(
		'name'          => __( 'Toolbat Left', 'une_boutique' ),
		'id'            => 'toolbar-left',
		'description'   => __( 'Toolbar menu on top left', 'une_boutique' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title hide">',
		'after_title'   => '</h3>',
	) );
	// Toolbar menu on top right
	register_sidebar( array(
		'name'          => __( 'Toolbat Right', 'une_boutique' ),
		'id'            => 'toolbar-right',
		'description'   => __( 'Toolbar menu on top right', 'une_boutique' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title hide">',
		'after_title'   => '</h3>',
	) );
	// is displayed in the page options section (dropdown) on shoprelated pages
	register_sidebar( array(
		'name'          => __( 'Shop Page Options', 'une_boutique' ),
		'id'            => 'shop-page-widget',
		'description'   => __( 'display widgets in the shop page options section (dropdown)', 'une_boutique' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title search-widget-title">',
		'after_title'   => '</h3>',
	) );
	// Top light footer position
	register_sidebar( array(
		'name'          => __( 'Footer Light', 'une_boutique' ),
		'id'            => 'footer-light',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// bottom dark footer position
	register_sidebar( array(
		'name'          => __( 'Footer Dark', 'une_boutique' ),
		'id'            => 'footer-dark',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Left Aligned Colophon widget postion
	register_sidebar( array(
		'name'          => __( 'Colophon Left', 'une_boutique' ),
		'id'            => 'colophone-l',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Right Aligned Colophon widget postion
	register_sidebar( array(
		'name'          => __( 'Colophon Right', 'une_boutique' ),
		'id'            => 'colophone-r',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'une_boutique_widgets_init' );


/*-------------------------------------------------------------------------------------------*/
/*	Column counters
/*-------------------------------------------------------------------------------------------*/

// footer light

function ub_footer_light_column_count($params) {

	$sidebar_id = $params[0]['id'];

	if ( $sidebar_id == 'footer-light' ) {

		$total_widgets = wp_get_sidebars_widgets();
		$sidebar_widgets = count($total_widgets[$sidebar_id]);

		$params[0]['before_widget'] = str_replace('class="', 'class="columns small-12 large-' . floor(12 / $sidebar_widgets) . ' ', $params[0]['before_widget']);
	}

	return $params;
}
add_filter('dynamic_sidebar_params','ub_footer_light_column_count');

// footer dark

function ub_footer_dark_column_count($params) {

	$sidebar_id = $params[0]['id'];

	if ( $sidebar_id == 'footer-dark' ) {

		$total_widgets = wp_get_sidebars_widgets();
		$sidebar_widgets = count($total_widgets[$sidebar_id]);

		$params[0]['before_widget'] = str_replace('class="', 'class="columns small-12 large-' . floor(12 / $sidebar_widgets) . ' ', $params[0]['before_widget']);
	}

	return $params;
}
add_filter('dynamic_sidebar_params','ub_footer_dark_column_count');