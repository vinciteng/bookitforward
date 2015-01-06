<?php
/**
 * Options setting default
 *
 * @package TokokooCore
 * @version 1.0
 * @author Tokokooo
 * @copyright Copyright (c) 2013, Tokokoo
 * @license license.txt
 */

/* Add general settings tab. */
add_filter( 'tokokoo_options_setting', 'tokokoo_options_setting_general', 1 );

/* Add slides settings tab. */
add_filter( 'tokokoo_options_setting', 'tokokoo_options_setting_slides', 2 );

/* Add page settings tab. */
add_filter( 'tokokoo_options_setting', 'tokokoo_options_setting_page', 3 );

/**
 * Initialized options settings name.
 *
 * @since 1.0
 */
function optionsframework_option_name() {
	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 *  
 * @since 1.0
 */
function optionsframework_options() {

	$options = array();

	/* Allow theme developer to filter the options setting. */
	return apply_filters( 'tokokoo_options_setting', $options );

}

/**
 * General Settings.
 * Prepare filter to allow theme developer add more settings.
 *
 * @since 1.0
 */
function tokokoo_options_setting_general( $options ) {

	$options[] = array( 
		'name'	=> __( 'General', 'raakbookoo' ),
		'type'	=> 'heading'
	);

	$options[] = array( 
		'name'	=> __( 'Header Code', 'raakbookoo' ),
		'desc'	=> __( 'Add any custom script like the meta verification from various search engine. It will be inserted before the closing head tag of your theme.', 'raakbookoo' ),
		'id'	=> 'tokokoo_header_code',
		'type'	=> 'textarea'
	);
						
	$options[] = array( 
		'name'	=> __( 'Footer Code', 'raakbookoo' ),
		'desc'	=> __( 'Add your analytic code or you can add any custom script here. It will be inserted before the closing body tag of your theme.', 'raakbookoo' ),
		'id'	=> 'tokokoo_footer_code',
		'type'	=> 'textarea'
	);

	$options[] = array( 
		'name'	=> __( 'Credits', 'raakbookoo' ),
		'desc'	=> __( 'Disable the credits links for Tokokoo? Are you sure?', 'raakbookoo' ),
		'id'	=> 'tokokoo_credits',
		'type'	=> 'checkbox' 
	);

	$options[] = array( 
		'name'	=> __( 'Activate IE Warning', 'raakbookoo' ),
		'desc'	=> __( 'Activate warning if user browse your website using IE6 or IE7', 'raakbookoo' ),
		'id'	=> 'tokokoo_ie_warning',
		'type'	=> 'checkbox' 
	);

	return apply_filters( 'tokokoo_options_setting_general', $options );

}

/**
 * Slides Settings.
 * Prepare filter to allow theme developer add more settings.
 *
 * @since 1.0
 */
function tokokoo_options_setting_slides( $options ) {

	if( current_theme_supports( 'tokokoo-post-types' ) && post_type_exists( 'slides' ) ) {

		$options[] = array( 
			'name' => __( 'Slides', 'raakbookoo' ),
			'type' => 'heading'
		);

		$options[] = array(
			'name'		=> __( 'Choose Slide Type', 'raakbookoo' ),
			'desc'		=> __( 'Select your slide type.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slides_type',
			'std'		=> 'none',
			'type'		=> 'select',
			'class'		=> 'mini',
			'options'	=> array(
				'none'			=> __( 'Choose Slide', 'raakbookoo' ),
				'flexslider'	=> __( 'Flexslider', 'raakbookoo' ),
				'camera'		=> __( 'Camera', 'raakbookoo' ),
				'revolution'			=> __( 'Revolution Slider', 'raakbookoo' )
			)
		);

		$options[] = array(
			'name'		=> __( 'Automatically', 'raakbookoo' ),
			'desc'		=> __( 'Animate slider automatically.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_flex_auto_play',
			'std'		=> '1',
			'class'		=> 'hidden',
			'type'		=> 'checkbox'
		);

		$options[] = array(
			'name'		=> __( 'Transition Effect', 'raakbookoo' ),
			'desc'		=> __( 'Select your animation type.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_flex_effect',
			'std'		=> 'fade',
			'type'		=> 'select',
			'class'		=> 'mini hidden',
			'options'	=> array(
				'fade'	=> __( 'Fade', 'raakbookoo' ),
				'slide'	=> __( 'Slide', 'raakbookoo' )
			)
		);

		$options[] = array(
			'name'		=> __( 'Easing Animation', 'raakbookoo' ),
			'desc'		=> __( 'Select your easing animation type.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_flex_easing',
			'std'		=> 'swing',
			'type'		=> 'select',
			'class'		=> 'mini hidden',
			'options'	=> array(
				'swing'				=> 'Swing',
				'linear'			=> 'Linear',
				'easeInQuad'		=> 'easeInQuad',
				'easeOutQuad'		=> 'easeOutQuad',
				'easeInOutQuad'		=> 'easeInOutQuad',
				'easeInCubic'		=> 'easeInCubic',
				'easeOutCubic'		=> 'easeOutCubic',
				'easeInOutCubic'	=> 'easeInOutCubic',
				'easeInQuart'		=> 'easeInQuart',
				'easeOutQuart'		=> 'easeOutQuart',
				'easeInOutQuart'	=> 'easeInOutQuart',
				'easeInQuint'		=> 'easeInQuint',
				'easeOutQuint'		=> 'easeOutQuint',
				'easeInOutQuint'	=> 'easeInOutQuint',
				'easeInSine'		=> 'easeInSine',
				'easeOutSine'		=> 'easeOutSine',
				'easeInOutSine'		=> 'easeInOutSine',
				'easeInExpo'		=> 'easeInExpo',
				'easeOutExpo'		=> 'easeOutExpo',
				'easeInOutExpo'		=> 'easeInOutExpo',
				'easeInCirc'		=> 'easeInCirc',
				'easeOutCirc'		=> 'easeOutCirc',
				'easeInOutCirc'		=> 'easeInOutCirc',
				'easeInElastic'		=> 'easeInElastic',
				'easeOutElastic'	=> 'easeOutElastic',
				'easeInOutElastic'	=> 'easeInOutElastic',
				'easeInBack'		=> 'easeInBack',
				'easeOutBack'		=> 'easeOutBack',
				'easeInOutBack'		=> 'easeInOutBack',
				'easeInBounce'		=> 'easeInBounce',
				'easeOutBounce'		=> 'easeOutBounce',
				'easeInOutBounce'	=> 'easeInOutBounce',
			)
		);

		$options[] = array(
			'name'		=> __( 'Animation Speed', 'raakbookoo' ),
			'desc'		=> __( 'Set the speed of animations, in milliseconds.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_flex_animation_speed',
			'std'		=> '600',
			'class'		=> 'mini hidden',
			'type'		=> 'text'
		);

		$options[] = array(
			'name'		=> __( 'Slideshow Speed', 'raakbookoo' ),
			'desc'		=> __( 'Set the speed of the slideshow cycling, in milliseconds.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_flex_speed',
			'std'		=> '7000',
			'class'		=> 'mini hidden',
			'type'		=> 'text'
		);

		$options[] = array(
			'name'		=> __( 'Pause on Action', 'raakbookoo' ),
			'desc'		=> __( 'Pause the slideshow when interacting with control elements.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_flex_pause_action',
			'std'		=> '1',
			'class'		=> 'hidden',
			'type'		=> 'checkbox'
		);

		$options[] = array(
			'name'		=> __( 'Pause on Hover', 'raakbookoo' ),
			'desc'		=> __( 'Pause the slideshow when hovering over slider, then resume when no longer hovering.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_flex_pause_hover',
			'std'		=> '0',
			'class'		=> 'hidden',
			'type'		=> 'checkbox'
		);

		$options[] = array(
			'name'		=> __( 'Video Support', 'raakbookoo' ),
			'desc'		=> __( 'If you need to use video in the slider, please enable it.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_flex_video',
			'std'		=> '0',
			'class'		=> 'hidden',
			'type'		=> 'checkbox'
		);

		$options[] = array(
			'name'		=> __( 'Control Navigation', 'raakbookoo' ),
			'desc'		=> __( 'Create navigation for paging control of each slide?.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_flex_control_nav',
			'std'		=> '1',
			'class'		=> 'hidden',
			'type'		=> 'checkbox'
		);

		$options[] = array(
			'name'		=> __( 'Direction Navigation', 'raakbookoo' ),
			'desc'		=> __( 'Create navigation for previous/next slide?.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_flex_direction_nav',
			'std'		=> '1',
			'class'		=> 'hidden',
			'type'		=> 'checkbox'
		);

		$options[] = array(
			'name'		=> __( 'Slide Direction', 'raakbookoo' ),
			'desc'		=> __( 'Select the sliding direction. <strong>Note: you need to choose \'slide\' effect in the \'Transition Effect\' option above.</strong>', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_flex_direction',
			'std'		=> 'horizontal',
			'type'		=> 'select',
			'class'		=> 'mini hidden',
			'options'	=> array(
				'horizontal'	=> __( 'Horizontal', 'raakbookoo' ),
				'vertical'	=> __( 'Vertical', 'raakbookoo' )
			)
		);

		/* ============================== End FLEXSLIDER Settings ================================= */

		$options[] = array(
			'name'		=> __( 'Automatically', 'raakbookoo' ),
			'desc'		=> __( 'Animate slider automatically.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_auto_play',
			'std'		=> '1',
			'class'		=> 'hidden',
			'type'		=> 'checkbox'
		);

		$options[] = array(
			'name'		=> __( 'Thumbnail', 'raakbookoo' ),
			'desc'		=> __( 'Display thumbnail for each slide.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_thumbnail',
			'std'		=> '0',
			'class'		=> 'hidden',
			'type'		=> 'checkbox'
		);

		$options[] = array(
			'name'		=> __( 'Transition Effect', 'raakbookoo' ),
			'desc'		=> __( 'Select your animation type.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_effect',
			'std'		=> 'random',
			'type'		=> 'select',
			'class'		=> 'hidden',
			'options'	=> array(
				'random'					=> __( 'random', 'raakbookoo' ),
				'simpleFade'				=> 'simpleFade',
				'curtainTopLeft'			=> 'curtainTopLeft',
				'curtainTopRight'			=> 'curtainTopRight',
				'curtainBottomLeft'			=> 'curtainBottomLeft',
				'curtainBottomRight'		=> 'curtainBottomRight',
				'curtainSliceLeft'			=> 'curtainSliceLeft',
				'curtainSliceRight'			=> 'curtainSliceRight',
				'blindCurtainTopLeft'		=> 'blindCurtainTopLeft',
				'blindCurtainTopRight'		=> 'blindCurtainTopRight',
				'blindCurtainBottomLeft'	=> 'blindCurtainBottomLeft',
				'blindCurtainBottomRight'	=> 'blindCurtainBottomRight',
				'blindCurtainSliceBottom'	=> 'blindCurtainSliceBottom',
				'blindCurtainSliceTop'		=> 'blindCurtainSliceTop',
				'stampede'					=> 'stampede',
				'mosaic'					=> 'mosaic',
				'mosaicReverse'				=> 'mosaicReverse',
				'mosaicRandom'				=> 'mosaicRandom',
				'mosaicSpiral'				=> 'mosaicSpiral',
				'mosaicSpiralReverse'		=> 'mosaicSpiralReverse',
				'topLeftBottomRight'		=> 'topLeftBottomRight',
				'bottomRightTopLeft'		=> 'bottomRightTopLeft',
				'bottomLeftTopRight'		=> 'bottomLeftTopRight',
				'scrollLeft'				=> 'scrollLeft',
				'scrollRight'				=> 'scrollRight',
				'scrollHorz'				=> 'scrollHorz',
				'scrollBottom'				=> 'scrollBottom',
				'scrollTop'					=> 'scrollTop'
			)
		);

		$options[] = array(
			'name'		=> __( 'Animation Speed', 'raakbookoo' ),
			'desc'		=> __( 'Set the speed of animations, in milliseconds.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_animation_speed',
			'std'		=> '1500',
			'class'		=> 'hidden',
			'type'		=> 'text'
		);

		$options[] = array(
			'name'		=> __( 'Slideshow Speed', 'raakbookoo' ),
			'desc'		=> __( 'milliseconds between the end of the sliding effect and the start of the next one.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_speed',
			'std'		=> '7000',
			'class'		=> 'hidden',
			'type'		=> 'text'
		);

		$options[] = array(
			'name'		=> __( 'Pause on Hover', 'raakbookoo' ),
			'desc'		=> __( 'Pause the slideshow when hovering over slider, then resume when no longer hovering.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_pause_hover',
			'std'		=> '1',
			'class'		=> 'hidden',
			'type'		=> 'checkbox'
		);

		$options[] = array(
			'name'		=> __( 'Pause on Click', 'raakbookoo' ),
			'desc'		=> __( 'It stops the slideshow when you click the sliders.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_pause_click',
			'std'		=> '1',
			'class'		=> 'hidden',
			'type'		=> 'checkbox'
		);

		$options[] = array(
			'name'		=> __( 'Pagination', 'raakbookoo' ),
			'desc'		=> __( 'Display paging control for each slide.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_pagination',
			'std'		=> '1',
			'class'		=> 'hidden',
			'type'		=> 'checkbox'
		);

		$options[] = array(
			'name'		=> __( 'Navigation', 'raakbookoo' ),
			'desc'		=> __( 'Display the prev, next and play/stop buttons.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_navigation',
			'std'		=> '1',
			'class'		=> 'hidden',
			'type'		=> 'checkbox'
		);

		$options[] = array(
			'name'		=> __( 'Play/pause Buttons', 'raakbookoo' ),
			'desc'		=> __( 'Display or not the play/pause buttons.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_play_pause',
			'std'		=> '1',
			'class'		=> 'hidden',
			'type'		=> 'checkbox'
		);

		$options[] = array(
			'name'		=> __( 'Height', 'raakbookoo' ),
			'desc'		=> __( 'here you can type pixels (for instance 300px), a percentage (relative to the width of the slideshow, for instance 50%) or auto.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_height',
			'std'		=> '50%',
			'class'		=> 'hidden',
			'type'		=> 'text'
		);

		$options[] = array(
			'name'		=> __( 'Loader', 'raakbookoo' ),
			'desc'		=> __( 'Select your loading bar style.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_loader',
			'std'		=> 'pie',
			'type'		=> 'select',
			'class'		=> 'hidden',
			'options'	=> array(
				'pie'	=> 'Pie',
				'bar'	=> 'Bar',
				'none'	=> 'None'
			)
		);

		$options[] = array(
			'name'		=> __( 'Loader Color', 'raakbookoo' ),
			'desc'		=> __( 'Select the loading style color.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_loader_color',
			'std'		=> '#eeeeee',
			'class'		=> 'hidden',
			'type'		=> 'color' 
		);

		$options[] = array(
			'name'		=> __( 'Loader Background Color', 'raakbookoo' ),
			'desc'		=> __( 'Select the loading style background color.', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_loader_bg_color',
			'std'		=> '#222222',
			'class'		=> 'hidden',
			'type'		=> 'color' 
		);

		$options[] = array(
			'name'		=> __( 'Pie Loader Position', 'raakbookoo' ),
			'desc'		=> __( 'Select the pie loader position. <strong>Note: You need to choose \'Pie\' in the \'Loader\' option.</strong>', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_loader_pie_position',
			'std'		=> 'rightTop',
			'type'		=> 'select',
			'class'		=> 'hidden',
			'options'	=> array(
				'rightTop'		=> __( 'Right Top', 'raakbookoo' ),
				'rightBottom'	=> __( 'Right Bottom', 'raakbookoo' ),
				'leftTop'		=> __( 'Left Top', 'raakbookoo' ),
				'leftBottom'	=> __( 'Left Bottom', 'raakbookoo' )
			)
		);

		$options[] = array(
			'name'		=> __( 'Bar Loader Position', 'raakbookoo' ),
			'desc'		=> __( 'Select the bar loader position. <strong>Note: You need to choose \'Bar\' in the \'Loader\' option.</strong>', 'raakbookoo' ),
			'id'		=> 'tokokoo_slide_camera_loader_bar_position',
			'std'		=> 'bottom',
			'type'		=> 'select',
			'class'		=> 'hidden',
			'options'	=> array(
				'bottom'	=> __( 'Bottom', 'raakbookoo' ),
				'top'		=> __( 'Top', 'raakbookoo' )
			)
		);

	}	/* ============================== End Slides Settings ================================= */

	return apply_filters( 'tokokoo_options_setting_slides', $options );

}

/**
 * Page Settings.
 * Prepare filter to allow theme developer add more settings.
 *
 * @since 1.0
 */
function tokokoo_options_setting_page( $options ) {

	$options[] = array( 
		'name' => __( 'Page', 'raakbookoo' ),
		'type' => 'heading'
	);

	$options[] = array( 
		'name'	=> __( 'Post Author Box', 'raakbookoo' ),
		'desc'	=> __( 'This will enable the post author box on the single posts page. Edit description in <a href="' . admin_url( 'profile.php' ) . '">Profile Page</a>.', 'raakbookoo' ),
		'id'	=> 'tokokoo_post_author',
		'type'	=> 'checkbox' 
	);

	$options[] = array(
		'name'	=> __( 'Post/Page Comments', 'raakbookoo' ),
		'desc'	=> __( 'This will enable the comments on posts and/or pages.', 'raakbookoo' ),
		'id'	=> 'tokokoo_comment_form',
		'std'	=> '1',
		'type'	=> 'checkbox'
	);

	$options[] = array( 
		'name'	=> __( 'Social Share Buttons', 'raakbookoo' ),
		'desc'	=> __( 'This will enable the social share buttons on the single posts and page.', 'raakbookoo' ),
		'id'	=> 'tokokoo_social_share',
		'type'	=> 'checkbox' 
	);

	return apply_filters( 'tokokoo_options_setting_page', $options );

}
?>