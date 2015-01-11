<?php

/*-------------------------------------------------------------------------------------------*/
/*	random string genrator (this is not a shortcode, but it's used in carousel shortcoes)
/*-------------------------------------------------------------------------------------------*/
function random_string($length) {
	$key = '';
	$keys = array_merge(range(0, 9));

for ($i = 0; $i < $length; $i++) {
    $key .= $keys[array_rand($keys)];
}
	return $key;
}

/*-------------------------------------------------------------------------------------------*/
/*	Price Table Shortcodes
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'price-table', 'vc_price_table_shortcode' );

function vc_price_table_shortcode ($atts, $content = null) {
   extract(shortcode_atts(array(
      'state'        => 'normal',
      'price'        => '$00',
      'title'        => 'Starter',
      'button_title' => 'Buy Now',
      'button_link'  => '#'
   ), $atts));

	$return = '<div id="price-table" class="'. $state .'">
					<dl class="plan-header">
						<dd class="plan-title">'. $title .'</dd>
						<dd class="plan-price">'. $price .'</dd>
					</dl>
				<dl class="plan-body">';

	$content = explode(",", $content);
	if(is_array($content)) {
		foreach($content as $plan_feature) {
			$return .= '<dd>'.$plan_feature.'</dd>';
		}
	}
						
	$return .=	'<dd class="plan-buy">
					<a href="'. $button_link .'">'. $button_title .'</a>
					</dd>
					</dl>
				</div>';
   return $return;
}

add_shortcode( 'plan-feature', 'plan_features_shortcode' );

vc_map( array(
   "name"              => __("Price Tables", 'une_boutique'),
   "base"              => "price-table",
   "class"             => "",
   "category"          => __('Capital Shortcodes', 'une_boutique'),
   "admin_enqueue_css" => array(get_template_directory_uri().'/inc/vc_extend/css/capital-shortcodes-admin.css'),
   "icon"              => "icon-wpb-price_table",
   "params"            => array(
      array(
         "type"        => "textfield",
         "class"       => "",
         "heading"     => __("Table Title", 'une_boutique'),
         "param_name"  => "title",
         "admin_label"   => true,
         "value"       => __("Starter", 'une_boutique'),
         "description" => __("Enter The Price Table Column Title", 'une_boutique')
      ),
      array(
         "type"        => "textfield",
         "class"       => "",
         "heading"     => __("Table Price", 'une_boutique'),
         "param_name"  => "price",
         "value"       => "$00",
         "admin_label"   => true,
         "description" => __("Enter The Price Table Column Price", 'une_boutique')
      ),
      array(
         "type"          => "dropdown",
         "admin_label"   => true,
         "heading"       => __("Table Type", "une_boutique"),
         "param_name"    => "state",
         "value"         => array("normal", "featured"),
         "description"   => __("Select the state of the price table column.", "une_boutique")
    ),
    array(
		  "type"        => "textfield",
		  "admin_label"   => true,
		  "class"       => "",
		  "heading"     => __("Button Title", 'une_boutique'),
		  "param_name"  => "button_title",
		  "value"       => __("Buy Now", "une_boutique"),
		  "description" => __("Enter The Price Table Column Button Text", 'une_boutique')
    ),
    array(
		  "type"        => "textfield",
		  "class"       => "",
		  "heading"     => __("Table Price", 'une_boutique'),
		  "param_name"  => "button_link",
		  "value"       => "#",
		  "description" => __("Enter The Price Table Button Link", 'une_boutique')
      ),
    array(
      	  "type" => "exploded_textarea",
      	  "heading" => __("Plan Feature", "une_boutique"),
      	  "param_name" => "content",
      	  "description" => __('Input plane features here, separate each feature by enetring a new line.', '	  une_boutique'),
      	  "value" => "plan feature one \n plan feature two \n plan feature three",
    ),
   )
));

/*-------------------------------------------------------------------------------------------*/
/*	Product Categories Slider
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'product_categories_slider', 'vc_categories_slider_shortcode' );

function vc_categories_slider_shortcode ($atts) {
extract(shortcode_atts(array(
	'limit'           => '12',
	'orderby'         => 'name',
	'order'           => 'asc',
	'slide_speed'     => '800',
	'items' 		  => '4',
	'auto_play'		  => 'false',
	'navigation'      => 'true',
	'pagination'      => 'false',
	'scroll_per_page' => 'false',
), $atts));
	
	$uniqid = random_string(6);
	$return = '<div id="categories_slides" class="categories-slides_'.$uniqid.'">';
	$return .= do_shortcode('[product_categories number="'. $limit .'" columns="99999" order="'.$order.'" orderby="'.$orderby.'"]');
	$return .= '</div>';
	$return .= '<script>jQuery(document).ready(function($){"use strict";$(".categories-slides_'.$uniqid.' .woocommerce .products").owlCarousel({items:'.$items.',autoPlay:'.$auto_play.',itemsTablet:[768,3],paginationSpeed:500,rewindSpeed:'.$slide_speed.',slideSpeed:'.$slide_speed.',navigation:'.$navigation.',navigationText:["<i class=\'ub-icon-arrow-left7\'></i>","<i class=\'ub-icon-arrow-right7\'></i>"],scrollPerPage:'.$scroll_per_page.',pagination:'.$pagination.',addClassActive:true,lazyLoad:true,lazyEffect:"fade",});});</script>';

	return $return;
}

vc_map( array(
   "name"              => __("Product Category Silder", 'une_boutique'),
   "base"              => "product_categories_slider",
   "class"             => "",
   "category"          => __('Capital Shortcodes', 'une_boutique'),
   "admin_enqueue_css" => array(get_template_directory_uri().'/inc/vc_extend/css/capital-shortcodes-admin.css'),
   "icon"              => "icon-wpb-products_carousel",
   "params"            => array(
		array(
			"type"        => "textfield",
			"class"       => "",
			"heading"     => __("Number of visible items", 'une_boutique'),
			"param_name"  => "items",
			"admin_label"   => true,
			"value"       => __("4", 'une_boutique'),
			"description" => __("Enter The number of items visible at the same time", 'une_boutique'),
		),
		array(
			"type"        => "textfield",
			"class"       => "",
			"heading"     => __("Limit", 'une_boutique'),
			"param_name"  => "limit",
			"admin_label"   => true,
			"value"       => __("12", 'une_boutique'),
			"description" => __("Limit The Number of catgeories to include in the carousel", 'une_boutique'),
		),
		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Items Ordered By", "une_boutique"),
			"param_name"    => "orderby",
			"value"         => array(__("Title", "une_boutique") => "name", __("Date", "une_boutique") => "date"),
			"description"   => __("choose how the items are ordered by, date, title or (rand)om.", "une_boutique")
		),
		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Items Ordered By", "une_boutique"),
			"param_name"    => "order",
			"value"         => array(__("Ascending", "une_boutique") => "asc", __("Descending", "une_boutique") => "desc"),
			"description"   => __("choose the default orderign of the items, (asc)ening or (desc)ending.", "une_boutique")
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Slide Speed", 'une_boutique'),
			"param_name"    => "slide_speed",
			"admin_label"   => true,
			"value"         => __("800", 'une_boutique'),
			"description"   => __("change carousel sliding speed", 'une_boutique'),
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Auto Play", 'une_boutique'),
			"param_name"    => "auto_play",
			"admin_label"   => true,
			"value"         => __("", 'une_boutique'),
			"description"   => __("add a number here to both enable auto play and give a timeout, for example 5000 to make autopaly slide evey 5 seconds. <strong>Leave empty to disable autoplay.</strong>", 'une_boutique'),
		),
		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Scroll Per Page", "une_boutique"),
			"param_name"    => "scroll_per_page",
			"value"         => array("true", "false"),
			"description"   => __("choose whether you want the items to scroll per page(TRUE) or per item(FALSE)", "une_boutique")
		),
		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Navigation", "une_boutique"),
			"param_name"    => "navigation",
			"value"         => array("true", "false"),
			"description"   => __("show or hide carousel navigation.", "une_boutique")
		),
		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Pagination", "une_boutique"),
			"param_name"    => "pagination",
			"value"         => array("false", "true"),
			"description"   => __("show or hide carousel pagination.", "une_boutique")
		),
	)
));

/*-------------------------------------------------------------------------------------------*/
/*	Recent Product Slider
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'vc_products_slider', 'vc_recent_products_slider_shortcode' );

function vc_recent_products_slider_shortcode ($atts) {
extract(shortcode_atts(array(
	'per_page'          => '12',
	'orderby'           => 'date',
	'order'             => 'desc',
	'slide_speed'       => '800',
	'items' 		    => '4',
	'auto_play'		    => 'false',
	'navigation'        => 'true',
	'pagination'        => 'false',
	'scroll_per_page'   => 'false',
	'carousel_type'     => 'recent_products'
), $atts));
	
	$uniqid = random_string(6);
	$return = '<div id="recent_products_slides" class="'.$carousel_type.'-slides_'.$uniqid.'">';
	$return .= do_shortcode('['.$carousel_type.' per_page="'. $per_page .'" columns="99999" order="'.$order.'" orderby="'.$orderby.'"]');
	$return .= '</div>';
	$return .= '<script>jQuery(document).ready(function($){"use strict";$(".'.$carousel_type.'-slides_'.$uniqid.' .woocommerce .products").owlCarousel({items:'.$items.',autoPlay:'.$auto_play.',itemsTablet:[768,3],paginationSpeed:500,goToFirstSpeed:'.$slide_speed.',slideSpeed:'.$slide_speed.',navigation:'.$navigation.',navigationText:["<i class=\'ub-icon-arrow-left7\'></i>","<i class=\'ub-icon-arrow-right7\'></i>"],scrollPerPage:'.$scroll_per_page.',pagination:'.$pagination.',addClassActive:true,stopOnHover:true,lazyEffect:"fade",});});</script>';

	return $return;
}

vc_map( array(
   "name"                   => __("Products Silder", 'une_boutique'),
   "base"                   => "vc_products_slider",
   "class"                  => "",
   "category"               => __('Capital Shortcodes', 'une_boutique'),
   "admin_enqueue_css"      => array(get_template_directory_uri().'/inc/vc_extend/css/capital-shortcodes-admin.css'),
   "icon"                   => "icon-wpb-products_carousel",
   "params"                 => array(
   		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Carousel Type", "une_boutique"),
			"param_name"    => "carousel_type",
			"value"         => array(__("Recent Products", "une_boutique") => "recent_products", __("Featured Products", "une_boutique") => "featured_products", __("Sale Products", "une_boutique") => "sale_products", __("Best Selling Products", "une_boutique") => "best_selling_products", __("Top Rated Products", "une_boutique") => "top_rated_products"),
			"description"   => __("choose how the items are ordered by, date, title or (rand)om.", "une_boutique")
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Number of visible items", 'une_boutique'),
			"param_name"    => "items",
			"admin_label"   => true,
			"value"         => __("4", 'une_boutique'),
			"description"   => __("Enter The number of items visible at the same time", 'une_boutique'),
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Limit", 'une_boutique'),
			"param_name"    => "per_page",
			"admin_label"   => true,
			"value"         => __("12", 'une_boutique'),
			"description"   => __("Limit The Number of catgeories to include in the carousel", 'une_boutique'),
		),
		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Items Ordered By", "une_boutique"),
			"param_name"    => "orderby",
			"value"         => array(__("Date", "une_boutique") => "date", __("Title", "une_boutique") => "title", __("Random", "une_boutique") => "rand"),
			"description"   => __("choose how the items are ordered by, date, title or (rand)om.", "une_boutique")
		),
		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Items Order", "une_boutique"),
			"param_name"    => "order",
			"value"         => array(__("Ascending", "une_boutique") => "asc", __("Descending", "une_boutique") => "desc"),
			"description"   => __("choose the default orderign of the items, (asc)ening or (desc)ending", "une_boutique")
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Slide Speed", 'une_boutique'),
			"param_name"    => "slide_speed",
			"admin_label"   => true,
			"value"         => __("800", 'une_boutique'),
			"description"   => __("change carousel sliding speed", 'une_boutique'),
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Auto Play", 'une_boutique'),
			"param_name"    => "auto_play",
			"admin_label"   => true,
			"value"         => __("", 'une_boutique'),
			"description"   => __("add a number here to both enable auto play and give a timeout, for example 5000 to make autopaly slide evey 5 seconds. <strong>Leave empty to disable autoplay.</strong>", 'une_boutique'),
		),
		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Scroll Per Page", "une_boutique"),
			"param_name"    => "scroll_per_page",
			"value"         => array("true", "false"),
			"description"   => __("choose whether you want the items to scroll per page(TRUE) or per item(FALSE)", "une_boutique")
		),
		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Navigation", "une_boutique"),
			"param_name"    => "navigation",
			"value"         => array("true", "false"),
			"description"   => __("show or hide carousel navigation.", "une_boutique")
		),
		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Pagination", "une_boutique"),
			"param_name"    => "pagination",
			"value"         => array("false", "true"),
			"description"   => __("show or hide carousel pagination.", "une_boutique")
		),
	)
));

/*-------------------------------------------------------------------------------------------*/
/*	advanced separator line
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'advanced_separator', 'vc_advanced_separator' );

function vc_advanced_separator ($atts) {
extract(shortcode_atts(array(
	'class'    => '',
	'position' => 'aligncenter',
	'size'     => 'sep-small',
	'color'    => 'sep-dark',
), $atts));

	$return = '<span class="clear"></span><div class="relative advanced-separator '. $class . ' ' . $position .' '. $size . ' '. $color . '"></div><span class="clear"></span>';

	return $return;
}

vc_map( array(
   "name"      => __("Separator Advanced", 'une_boutique'),
   "base"      => "advanced_separator",
   "category"  => __('Capital Shortcodes', 'une_boutique'),
   'icon'      => 'icon-wpb-ui-separator',
   "params"    => array(
		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Separator Type", "une_boutique"),
			"param_name"    => "position",
			"value"         => array(__("Center", "une_boutique") => "aligncenter", __("Left", "une_boutique") => "alignleft", __("Right", "une_boutique") => "alignright"),
			"description"   => __("Choose the type of the separator alignment", "une_boutique")
		),
		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Separator Size", "une_boutique"),
			"param_name"    => "size",
			"value"         => array(__("Small", "une_boutique") => "sep-small", __("Medium", "une_boutique") => "sep-medium", __("Large", "une_boutique") => "sep-large"),
			"description"   => __("Choose the size of the separator", "une_boutique")
		),
		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Separator Color", "une_boutique"),
			"param_name"    => "color",
			"value"         => array(__("Dark", "une_boutique") => "sep-dark", __("Light", "une_boutique") => "sep-light"),
			"description"   => __("Choose the color echeme of the separator", "une_boutique")
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Additional Classes", 'une_boutique'),
			"param_name"    => "class",
			"admin_label"   => true,
			"value"         => __("", 'une_boutique'),
			"description"   => __("Separator Line Class", 'une_boutique'),
		),
	)
));


/*-----------------------------------------------------------------------------------*/
/*	Capital Testimonials Shortcode
/*-----------------------------------------------------------------------------------*/

add_shortcode( 'capital-testimonials', 'testimonial_shortcode' );
/**
 * Shortcode to display testimonials
 *
 * [capital-testimonials limit="" orderby="none"]
 */
function testimonial_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'limit'          => '4',
		'orderby'        => 'none',
		'testimonial_id' => '',
		'type'           => 'static',
	), $atts ) );

	return ub_get_testimonials( $limit, $orderby, $testimonial_id, $type );
}

/*-----------------------------------------------------------------------------------*/
/*	Capital Testimonials vc map
/*-----------------------------------------------------------------------------------*/

vc_map( array(
   "name"      => __("Capital Testimonials", 'une_boutique'),
   "base"      => "capital-testimonials",
   "category"  => __('Capital Shortcodes', 'une_boutique'),
   "icon"      => "icon-wpb-testimonials",
   "params"    => array(
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Limit", 'une_boutique'),
			"param_name"    => "limit",
			"admin_label"   => true,
			"value"         => __("4", 'une_boutique'),
			"description"   => __("Enter The number of testimonials to be displayed.", 'une_boutique'),
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Testiminia ID", 'une_boutique'),
			"param_name"    => "testimonial_id",
			"admin_label"   => true,
			"value"         => __("", 'une_boutique'),
			"description"   => __("Enter The the testimonial post ID to display a single one.", 'une_boutique'),
		),
		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Ordered By", "une_boutique"),
			"param_name"    => "orderby",
			"value"         => array(__("Date", "une_boutique") => "date", __("Title", "une_boutique") => "title", __("Random", "une_boutique") => "rand"),
			"description"   => __("choose how the items are ordered by, date, title or random.", "une_boutique")
		),
		array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Testimonial Type", "une_boutique"),
			"param_name"    => "type",
			"value"         => array(__("Static Grid", "une_boutique") => "static", __("Slider", "une_boutique") => "slider"),
			"description"   => __("Choose the testimonial display type, a grid or a slider.", "une_boutique")
		),
	)
));

/*-------------------------------------------------------------------------------------------*/
/*	Special Box Shortcode
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'special-box', 'vc_special_box' );

function vc_special_box ( $atts, $content = null ) {
extract(shortcode_atts(array(
	'class'             => '',
	'alignment'         => 'center',
	'title'             => '',
	'box_url'           => 'javascript:void(0)',
	'box_padding'       => '25px 25px',
	'margin_bottom'     => '20px',
	'background_color'  => '',
	'background_image'  => '',
	'text_color'        => '',
), $atts));


$img_id = preg_replace('/[^\d]/', '', $background_image);
$image_attributes = wp_get_attachment_image_src( $img_id, 'full' );
	
	$return  = '<div id="vc_special_box_wrapper" class="'.$class.' display-table text-'.$alignment.'" style="background-color:'.$background_color.'; background-image:url('.$image_attributes[0].');color:'.$text_color.';margin-bottom:'.$margin_bottom.';">';
	$return .= '<a style="display:block;" href="'.$box_url.'">';
	$return .= '<div class="vc-special-box" style="padding:'.$box_padding.';">';
	$return .= '<div class="special-box-title"><h3 class="no-margin">'.$title.'</h3></div>';
	$return .= '<span class="clear"></span><div class="relative advanced-separator align'.$alignment.' sep-small sep-light"></div><span class="clear"></span>';
	$return .= '<div class="special-box-content"><p class="no-margin">'.$content.'</p></div>';
	$return .= '</div>';
	$return .= '</a>';
	$return .= '</div>';
	return $return;
}

vc_map( array(
   "name"      => __("Special Box", 'une_boutique'),
   "base"      => "special-box",
   "category"  => __('Capital Shortcodes', 'une_boutique'),
   "icon"      => "icon-wpb-special-box",
   "params"    => array(
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Box Title", 'une_boutique'),
			"param_name"    => "title",
			"admin_label"   => true,
			"value"         => __("Enter the box title here", 'une_boutique'),
			"description"   => __("Enter the box title here.", 'une_boutique'),
		),
		array(
			"type"          => "textarea",
			"admin_label"   => false,
			"holder"        => "div",
			"class"         => "",
			"heading"       => __("Content", "une_boutique"),
			"param_name"    => "content",
			"value"         => __("I am test text block. Click edit button to change this text."),
			"description"   => __("Enter your content here.", "une_boutique"),
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Box URL", 'une_boutique'),
			"param_name"    => "box_url",
			"admin_label"   => true,
			"value"         => __("", 'une_boutique'),
			"description"   => __("Add a url if you want the box to be linked", 'une_boutique'),
		),
      	array(
			"type"          => "dropdown",
			"admin_label"   => true,
			"heading"       => __("Text Alignment", "une_boutique"),
			"param_name"    => "alignment",
			"value"         => array(__("Center", "une_boutique") => "center", __("Left", "une_boutique") => "left", __("Right", "une_boutique") => "right"),
			"description"   => __("change the default text alingment, which is centered.", "une_boutique")
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Box Padding", 'une_boutique'),
			"param_name"    => "box_padding",
			"admin_label"   => true,
			"value"         => __("", 'une_boutique'),
			"description"   => __("You should use px, em, %, etc.", 'une_boutique'),
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Margin Bottom", 'une_boutique'),
			"param_name"    => "margin_bottom",
			"admin_label"   => true,
			"value"         => __("", 'une_boutique'),
			"description"   => __("You should use px, em, %, etc.", 'une_boutique'),
		),
		array(
			"type"          => "colorpicker",
			"class"         => "",
			"heading"       => __("Background Color", 'une_boutique'),
			"param_name"    => "background_color",
			"admin_label"   => true,
			"value"         => __("#525252", 'une_boutique'),
			"description"   => __("Please choose a background color to give your box a solid background.", 'une_boutique'),
		),
		array(
			"type"          => "colorpicker",
			"class"         => "",
			"heading"       => __("Text Color", 'une_boutique'),
			"param_name"    => "text_color",
			"admin_label"   => true,
			"value"         => __("#fefefe", 'une_boutique'),
			"description"   => __("Please choose a color for the text appearing on the special box.", 'une_boutique'),
		),
		array(
			"type"          => "attach_image",
			"class"         => "",
			"heading"       => __("Background Image", 'une_boutique'),
			"param_name"    => "background_image",
			"description"   => __("Select image from media library.", 'une_boutique'),
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Additional Classes", 'une_boutique'),
			"param_name"    => "class",
			"value"         => __("", 'une_boutique'),
			"description"   => __("Add any additional css classes here.", 'une_boutique'),
		),
	)
));

/*-------------------------------------------------------------------------------------------*/
/*	Flipping Circle
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'vc-flipping-circle', 'vc_flipping_circle_shortcode' );

function vc_flipping_circle_shortcode ($atts) {
extract(shortcode_atts(array(
      'class'              => '',
      'background_image'   => '',
      'background_color'   => '',
      'title'              => '',
      'link_url'           => '#',
      'link_text'          => 'View More',
      'description'        => '',
), $atts));

$img_id = preg_replace('/[^\d]/', '', $background_image);
$image_url = wp_get_attachment_image_src( $img_id, 'thumbnail' );

	$return  =	'<div class="vc_flipper-wrapper"><div class="vc_flipping-circle-item" style="background-color:'.$background_color.';background-image:url('. $image_url[0] .');" ontouchstart="this.classList.toggle(\'hover\');">';
	$return .=	'<div class="vc_flipping-circle-info-wrap">';
	$return .=  '<div class="vc_flipping-circle-info">';
	$return .=	'<div class="vc_flipping-circle-info-front" style="background-color:'.$background_color.';background-image:url('. $image_url[0] .');" ></div>';
	$return .=	'<div class="vc_flipping-circle-info-back">';
	$return .=	'<h3>'. $title .'</h3>';
	$return .=	'<p>'. $description .' <a href="'. $link_url .'">'. $link_text .'</a></p>';
	$return .=	'</div></div></div></div></div>';

	return $return;
}

vc_map( array(
   "name"      => __("Flipping Circle", 'une_boutique'),
   "base"      => "vc-flipping-circle",
   "category"  => __('Capital Shortcodes', 'une_boutique'),
   "icon"      => "icon-wpb-fillping-circle",
   "params"    => array(
		array(
			"type"          => "colorpicker",
			"class"         => "",
			"heading"       => __("Background Color", 'une_boutique'),
			"param_name"    => "background_color",
			"admin_label"   => true,
			"value"         => __("#525252", 'une_boutique'),
			"description"   => __("Please choose a background color to give your box a solid background.", 'une_boutique'),
		),
		array(
			"type"          => "attach_image",
			"class"         => "",
			"heading"       => __("Background Image", 'une_boutique'),
			"param_name"    => "background_image",
			"description"   => __("Select image from media library.", 'une_boutique'),
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Circle Title", 'une_boutique'),
			"param_name"    => "title",
			"admin_label"   => true,
			"value"         => __("The Title", 'une_boutique'),
			"description"   => __("Enter the circle title here.", 'une_boutique'),
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Circle Description", 'une_boutique'),
			"param_name"    => "description",
			"admin_label"   => true,
			"value"         => __("Description Here", 'une_boutique'),
			"description"   => __("Enter the circle short description here.", 'une_boutique'),
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Link URL", 'une_boutique'),
			"param_name"    => "link_url",
			"admin_label"   => true,
			"value"         => __("#", 'une_boutique'),
			"description"   => __("Enter the url for the circle link", 'une_boutique'),
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Link Title", 'une_boutique'),
			"param_name"    => "link_text",
			"admin_label"   => true,
			"value"         => __("View More", 'une_boutique'),
			"description"   => __("Enter the text for the circle link", 'une_boutique'),
		),
		array(
			"type"          => "textfield",
			"class"         => "",
			"heading"       => __("Additional Classes", 'une_boutique'),
			"param_name"    => "class",
			"value"         => __("", 'une_boutique'),
			"description"   => __("Add any additional css classes here.", 'une_boutique'),
		),
	)
));