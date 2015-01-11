<?php

/*-------------------------------------------------------------------------------------------*/
/*    contact form
/*-------------------------------------------------------------------------------------------*/

// function to get the IP address of the user
if (!function_exists('capital_get_the_ip')) {
	function capital_get_the_ip() {
		if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
			return $_SERVER["HTTP_X_FORWARDED_FOR"];
		}
		elseif (isset($_SERVER["HTTP_CLIENT_IP"])) {
			return $_SERVER["HTTP_CLIENT_IP"];
		}
		else {
			return $_SERVER["REMOTE_ADDR"];
		}
	}
}

/*-------------------------------------------------------------------------------------------*/
/* contact form shortcode
/*-------------------------------------------------------------------------------------------*/

if (!function_exists('capital_contact_form_sc')) {
	function capital_contact_form_sc($atts) {
		extract(shortcode_atts(array(
			"email" => get_bloginfo('admin_email'),
			"subject" => '',
			"label_name" => __('Your Name', 'capital_themes'),
			"label_email" => __('Your E-mail Address', 'capital_themes'),
			"label_subject" => __('Subject', 'capital_themes'),
			"label_message" => __('Your Message', 'capital_themes'),
			"label_submit" => __('Submit', 'capital_themes'),
			"info"        => '',
			"error_empty" => __('Please fill in all the required fields.', 'capital_themes'),
			"error_noemail" => __('Please enter a valid e-mail address.', 'capital_themes'),
			"success" => __('Thanks for your e-mail! We\'ll get back to you as soon as we can.', 'capital_themes')
		), $atts));

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$error = false;
			$required_fields = array("your_name", "email", "message", "subject");
			
			foreach ($_POST as $field => $value) {
				if (get_magic_quotes_gpc()) {
					$value = stripslashes($value);
				}
				$form_data[$field] = strip_tags($value);
			}

			foreach ($required_fields as $required_field) {
				$value = trim($form_data[$required_field]);
				if(empty($value)) {
					$error = true;
					$result = $error_empty;
				}
			}

			if(!is_email($form_data['email'])) {
				$error = true;
				$result = $error_noemail;
			}

			if ($error == false) {
				$email_subject = "[" . get_bloginfo('name') . "] " . $form_data['subject'];
				$email_message = $form_data['message'] . "\n\nIP: " . capital_get_the_ip();
				$headers  = "From: ".$form_data['your_name']." <".$form_data['email'].">\n";
				$headers .= "Content-Type: text/plain; charset=UTF-8\n";
				$headers .= "Content-Transfer-Encoding: 8bit\n";
				wp_mail($email, $email_subject, $email_message, $headers);
				$result = $success;
				$sent = true;
			}
		}

		if( isset($result) && $result != "") {
			if ( $result == $error_empty || $result == $error_noemail ) {
				$info = '<div class="alert alert-box">'.$result.'</div>';
			} elseif ( $result == $success ) {
				$info = '<div class="alert-success">'.$result.'</div>';
			}
		}
		$email_form = '<form class="contact-form" method="post" action="'.get_permalink().'">
			<div>
				<label for="ccf_name">'.$label_name.' <abbr class="required" title="required">*</abbr></label>
				<input type="text" name="your_name" id="ccf_name" size="50" maxlength="50" value="'.$form_data['your_name'].'" />
			</div>
			<div>
				<label for="ccf_email">'.$label_email.' <abbr class="required" title="required">*</abbr></label>
				<input type="text" name="email" id="ccf_email" size="50" maxlength="50" value="'.$form_data['email'].'" />
			</div>
			<div>
				<label for="ccf_subject">'.$label_subject.' <abbr class="required" title="required">*</abbr></label>
				<input type="text" name="subject" id="ccf_subject" size="50" maxlength="50" value="'.$subject.$form_data['subject'].'" />
			</div>
			<div>
				<label for="ccf_message">'.$label_message.' <abbr class="required" title="required">*</abbr></label>
				<textarea name="message" id="ccf_message" cols="50" rows="7">'.$form_data['message'].'</textarea>
			</div>
			<div>
				<input type="submit" value="'.$label_submit.'" name="send" id="ccf_send" />
			</div>
		</form>';
		
		if( isset($sent) && $sent == true) {
			return $info;
		} else {
			return $info.$email_form;
		}
	}

	add_shortcode('capital-contact', 'capital_contact_form_sc');
}

/*-------------------------------------------------------------------------------------------*/
/*     google map shortcode
/*-------------------------------------------------------------------------------------------*/

if (!function_exists('googlemap_shortcode')) {
function googlemap_shortcode($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '600',
      "height" => '300',
      "src" => ''
   ), $atts));
   return '<iframe class="google-map" width="'.$width.'" height="'.$height.'" src="'.$src.'&output=embed" ></iframe>';
}

add_shortcode("googlemap", "googlemap_shortcode");
}

/*-------------------------------------------------------------------------------------------*/
/*    creats a shortcode for tag cloud (base on D'Arcy Norman plugin, TagCloudShortCode;
/*    Author URI: http://www.darcynorman.net
/*-------------------------------------------------------------------------------------------*/
if ( !class_exists( "TagCloudShortcode" ) ) {
    
    class TagCloudShortcode {

        /**
         * Shortcode Function
         */
         function shortcode($atts)
         {

      		$out = "";

			$out .= '<div id="tagcloud-shortcode">';
			
			// do something intelligent to pull attributes to set up the parameters properly, with defaults. (not working yet. deal with it.)
			$listparams = 'number=100&echo=0';
			
			$out .= wp_tag_cloud($listparams);
			
			$out .='</div>';
            
            return $out;
         }
    } // End Class TagCloudShortcode
} 


/**
 * Initialize the admin panel function 
 */

if (class_exists("TagCloudShortcode")) {

    $TagCloudShortcodeInstance = new TagCloudShortcode();
}

if (isset($TagCloudShortcodeInstance)) {
    add_shortcode('tagcloud',array(&$TagCloudShortcodeInstance, 'shortcode'));
}

/*-------------------------------------------------------------------------------------------*/
/*    tabs shortcode (based on zillashortcodes)
/*-------------------------------------------------------------------------------------------*/

if (!function_exists('capital_tabs')) {
	function capital_tabs( $atts, $content = null ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		
		STATIC $i = 0;
		$i++;

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		
		$output = '';
		
		if( count($tab_titles) ){
		    $output .= '<div id="capital-tabs-'. $i .'" class="capital-tabs"><div class="capital-tab-inner">';
			$output .= '<ul class="capital-nav clearfix">';
			
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#capital-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		return $output;
	}
	add_shortcode( 'capital_tabs', 'capital_tabs' );
}

if (!function_exists('capital_tab')) {
	function capital_tab( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		return '<div id="capital-tab-'. sanitize_title( $title ) .'" class="capital-tab">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'capital_tab', 'capital_tab' );
}

/*-------------------------------------------------------------------------------------------*/
/*    Accordion Shortcodes
/*-------------------------------------------------------------------------------------------*/

/* Credits: http://ctlt.ubc.ca */

/**
 * OLT_Accordion_Shortcode class.
 */
class OLT_Accordion_Shortcode {

	static $add_script;
	static $shortcode_count;
	static $shortcode_js_data;
	static $support;
	static $current_accordion_id;
	static $current_active_content;

	/**
	 * init function.
	 * 
	 * @access public
	 * @static
	 * @return void
	 */
	static function init() {

		add_shortcode('accordion', array(__CLASS__, 'accordion_shortcode'));
		add_shortcode('capital_accordions', array(__CLASS__, 'capital_accordions_shortcode'));

		/* Apply filters to the tabs content. */
		add_filter( 'accordion_content', 'wpautop' );
		add_filter( 'accordion_content', 'shortcode_unautop' );
		add_filter( 'accordion_content', 'do_shortcode' );

		self::$shortcode_count = 0;
	}

	/**
	 * accordion_shortcode function.
	 * 
	 * @access public
	 * @static
	 * @param mixed $atts
	 * @param mixed $content
	 * @return void
	 */
	public static  function accordion_shortcode( $atts, $content ) {
		global $post;

		$selected = ( self::$current_active_content == self::$shortcode_count ? true : false ); 
		extract(shortcode_atts(array(
					'title' => null,
					'class' => null,
					'before_shell' => '',
					'after_shell'  => '',
					'before' => '',
					'after'  => '',
					'heading_tag' => 'h3',
					'heading_link_attr' => '',
					'heading_attr' => ''
				), apply_filters( 'accordion-shortcode-atts', $atts, $selected ) ) );

		ob_start();



		$title 		= ( empty( $title ) ? $post->post_title : $title );
		$id         = preg_replace("[^A-Za-z0-9]", "", $title )."-".self::$shortcode_count;

		if( empty( $title ) )
			return '<span style="color:red">Please enter a title attribute like [accordion title="title name"] accordion content [accordion]</span>';

		self::$shortcode_count++;

		$str  = $before_shell;
		$str .= '<'. $heading_tag .' '. $heading_attr .'><a href="#'. $id .'" '. $heading_link_attr .'>'. $title .'</a></'. $heading_tag .'>';
		$str .= '<div id="'. $id .'" class="accordian-shortcode-content '. $class. '" >'. $before. apply_filters( 'accordion_content', $content ) . $after. '</div>';
		$str .= $after_shell;

		return $str;
	}

	/**
	 * eval_bool function.
	 * 
	 * @access public
	 * @static
	 * @param mixed $item
	 * @return void
	 */
	static function eval_bool( $item ) {
		return ( (string) $item == 'false' || (string)$item == 'null'  || (string)$item == '0' || empty($item) ? false : true );
	}

	/**
	 * capital_accordions_shortcode function.
	 * 
	 * @access public
	 * @static
	 * @param mixed $atts
	 * @param mixed $content
	 * @return void
	 */
	public static function capital_accordions_shortcode( $atts, $content ) {
		global $wp_version;
		self::$add_script = true;
		if( is_string($atts) )
			$atts = array();

		$atts = apply_filters( 'accordion-shortcode-accordion-atts', $atts );

		$defaults = array(
			'heightstyle'=> 'content',
			'autoheight' => false,
			'disabled' => false,
			'active' => 0,
			'clearstyle'  => false,
			'collapsible' => false,
			'fillspace' => false,
			'before' =>'',
			'after' => '',
			'class' => ''
		);

		$atts = shortcode_atts(  $defaults , apply_filters( 'capital_accordions-shortcode-atts', $atts ) );

		self::$current_accordion_id = "accordion-id-".rand(0,1000);

		$content = str_replace( "]<br />","]", ( substr( $content, 0 , 6 ) == "<br />" ? substr( $content, 6 ): $content ) );

		self::$shortcode_js_data[self::$current_accordion_id] = $atts;

		return str_replace("\r\n", '', '<div id="'.self::$current_accordion_id.'" class="accordion-shortcode">'.$atts['before'].do_shortcode( $content ).$atts['after'].'</div><!-- #'.self::$current_accordion_id.'end of accordion shortcode -->');
	}
}
// lets play
OLT_Accordion_Shortcode::init();

/*-------------------------------------------------------------------------------------------*/
/*   Buttons Shortcode
/*-------------------------------------------------------------------------------------------*/

if (!function_exists('capital_button')) {
	function capital_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'url' => '#',
			'size' => 'medium',
			'color' => 'violet',
			'type' => 'rounded',
			'target' => '_self'
	    ), $atts));
		
	   return '<a href="'.$url.'" class="button capital-button button-'.$size.' button-'.$color.' button-'. $type .'" target="'.$target.'">' . do_shortcode($content) . '</a>';
	}
	add_shortcode('capital_button', 'capital_button');
}

/*-------------------------------------------------------------------------------------------*/
/*    Columns Shortcode
/*-------------------------------------------------------------------------------------------*/

if (!function_exists('capital_columns')) {
	function capital_columns( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'column_type'    => 'one-third'
	    ), $atts));
		
	   return '<div class="capital-column-'.$column_type.'">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('capital_columns', 'capital_columns');
}

/*-------------------------------------------------------------------------------------------*/
/*	  Secure email Shortcode
/*-------------------------------------------------------------------------------------------*/

if (!function_exists('secure_email_shortcode')) {
	function secure_email_shortcode( $atts , $content=null ) {
	   $encodedmail = '';
	    for ($i = 0; $i < strlen($content); $i++) $encodedmail .= "&#" . ord($content[$i]) . ';';   
	   
	    return '<a href="mailto:'.$encodedmail.'">'.$encodedmail.'</a>';  
	   
	}
	add_shortcode('secure-email', 'secure_email_shortcode');
}

/*-------------------------------------------------------------------------------------------*/
/*	Google Docs Viewer
/*-------------------------------------------------------------------------------------------*/

if (!function_exists('pdflink')) {
	function pdflink($attr, $content) {
		if (isset($attr['href'])) {
			return '<a class="pdf" href="http://docs.google.com/viewer?url=' . $attr['href'] . '">'.$content.'</a>';
		} else {
			$src = str_replace("=", "", $attr[0]);
			return '<a class="pdf" href="http://docs.google.com/viewer?url=' . $src . '">'.$content.'</a>';
		}
	}
	add_shortcode('pdf', 'pdflink');
}

/*-------------------------------------------------------------------------------------------*/
/*    related posts
/*-------------------------------------------------------------------------------------------*/

if (!function_exists('related_posts_shortcode')) {
	function related_posts_shortcode( $atts ) {
		extract(shortcode_atts(array(
		    'limit' => '5',
		    'related_posts_title' => 'Ralted Posts'
		), $atts));
	 
		global $wpdb, $post, $table_prefix;
	 
		if ($post->ID) {
			$retval = '<div class="related-posts"><h3 class="capital-related-posts-title">'.$related_posts_title.'</h3><ul class="capital-ralated-posts">';
	 		// Get tags
			$tags = wp_get_post_tags($post->ID);
			$tagsarray = array();
			foreach ($tags as $tag) {
				$tagsarray[] = $tag->term_id;
			}
			$tagslist = implode(',', $tagsarray);
	 
			// Do the query
			$q = "SELECT p.*, count(tr.object_id) as count
				FROM $wpdb->term_taxonomy AS tt, $wpdb->term_relationships AS tr, $wpdb->posts AS p WHERE tt.taxonomy ='post_tag' AND tt.term_taxonomy_id = tr.term_taxonomy_id AND tr.object_id  = p.ID AND tt.term_id IN ($tagslist) AND p.ID != $post->ID
					AND p.post_status = 'publish'
					AND p.post_date_gmt < NOW()
	 			GROUP BY tr.object_id
				ORDER BY count DESC, p.post_date_gmt DESC
				LIMIT $limit;";
	 
			$related = $wpdb->get_results($q);
	 		if ( $related ) {
				foreach($related as $r) {
					$retval .= '<li><a title="'.wptexturize($r->post_title).'" href="'.get_permalink($r->ID).'">'.wptexturize($r->post_title).'</a></li>';
				}
			} else {
				$retval .= '
		<li>No related posts found</li>';
			}
			$retval .= '</ul></div>';
			return $retval;
		}
		return;
	}

	add_shortcode('related_posts', 'related_posts_shortcode');
}

/*-------------------------------------------------------------------------------------------*/
/*    flickr badge shortcode
/*-------------------------------------------------------------------------------------------*/

if (!function_exists('flickr_badge_shortcode')) {
	function flickr_badge_shortcode($atts){

	//Here's our defaults 
	$query_atts = shortcode_atts(array('count' => '6', 'display' => 'latest', 'source' => 'user', 'size' => 't', 'user' => '', 'layout' => 'x', 'tag' => '', 'group' => '', 'set' => ''), $atts); 

	 	return sprintf('<div class="flickr-badge clearfix"><script src="http://www.flickr.com/badge_code_v2.gne?%s" type="text/javascript"></script></div>
	', http_build_query($query_atts));
	}

	add_shortcode('flickrbadge', 'flickr_badge_shortcode');

}

/*-------------------------------------------------------------------------------------------*/
/*	Video embed shortcode
/*-------------------------------------------------------------------------------------------*/

if (!function_exists('video_shortcode')) {
	function video_shortcode($atts, $content=null) {
		extract(
			shortcode_atts(array(
				'site' => 'youtube',
				'id' => '',
				'w' => '700',
				'h' => '360'
			), $atts)
		);
		if ( $site == "youtube" ) { $src = 'https://www.youtube-nocookie.com/embed/'.$id.'?wmode=transparent'; }
		else if ( $site == "vimeo" ) { $src = 'http://player.vimeo.com/video/'.$id; }
		else if ( $site == "dailymotion" ) { $src = 'http://www.dailymotion.com/embed/video/'.$id; }
		else if ( $site == "yahoo" ) { $src = 'http://d.yimg.com/nl/vyc/site/player.html#vid='.$id; }
		else if ( $site == "bliptv" ) { $src = 'http://a.blip.tv/scripts/shoggplayer.html#file=http://blip.tv/rss/flash/'.$id; }
		else if ( $site == "veoh" ) { $src = 'http://www.veoh.com/static/swf/veoh/SPL.swf?videoAutoPlay=0&permalinkId='.$id; }
		else if ( $site == "viddler" ) { $src = 'http://www.viddler.com/simple/'.$id; }
		if ( $id != '' ) {
			return '<iframe width="'.$w.'" height="'.$h.'" src="'.$src.'" class="vid iframe-'.$site.'"></iframe>';
		}
	}
	add_shortcode('video','video_shortcode');
}

/*-------------------------------------------------------------------------------------------*/
/*	Price Table Shortcodes
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'price-table', 'price_table_shortcode' );

function price_table_shortcode ($atts, $content = null) {
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
	$return .=  do_shortcode($content);
						
	$return .=	'<dd class="plan-buy">
					<a href="'. $button_link .'">'. $button_title .'</a>
					</dd>
					</dl>
				</div>';
   return $return;
}

add_shortcode( 'pricing-plans', 'pricing_plans_shortcode' );

function pricing_plans_shortcode ( $atts, $content = null ) {
extract(shortcode_atts(array(
      'columns' => 'four',
), $atts));

	$return =	'<div class="pricing-plans clearfix '. $columns .'-columns">';
	$return .=		do_shortcode($content);
	$return .=	'</div><span class="clear"></span>';

	return $return;
}

add_shortcode( 'plan-feature', 'plan_features_shortcode' );

function plan_features_shortcode ( $atts, $content = null ) {

		$return =	'<dd class="plan-features">';
		$return .=		$content;
		$return .=	'</dd>';

	return $return;
}

/*-------------------------------------------------------------------------------------------*/
/*	Lead Texts
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'lead-text', 'lead_text_shortcode' );

function lead_text_shortcode ($atts, $content = null) {
extract(shortcode_atts(array(
      'class' => '',
), $atts));

	$return =	'<p class="lead '. $class .'">';
	$return .=		do_shortcode($content);
	$return .=	'</p>';

	return $return;
}

/*-------------------------------------------------------------------------------------------*/
/*	Header Line Borders (3 donut shapes)
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'headline-border', 'headline_border_shortcode' );

function headline_border_shortcode ($atts) {
extract(shortcode_atts(array(
	'class' => '',
), $atts));

	$return =	'<span class="clear"></span><span class="headline-border '. $class .'"></span><span class="clear"></span>';

	return $return;
}

/*-------------------------------------------------------------------------------------------*/
/*	Borderline
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'border-line', 'border_line_shortcode' );

function border_line_shortcode ($atts) {
extract(shortcode_atts(array(
	'class' => '',
), $atts));

	$return = '<span class="clear"></span><i class="border-line shortcode '. $class .'"></i><span class="clear"></span>';

	return $return;
}

/*-------------------------------------------------------------------------------------------*/
/*	Call To Action Box
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'action-box', 'action_box_shortcode' );

function action_box_shortcode ($atts, $content = null) {
	extract(shortcode_atts(array(
	'class' => '',
), $atts));
	$return =	'<div class="action-box clearfix '. $class .'">';
	$return .=  '<p>' .do_shortcode($content) .' </p>';
	$return .=	'</div>';

	return $return;
}

/*-------------------------------------------------------------------------------------------*/
/*    Featured Box Shortcode
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'featured-box', 'featured_box_shortcode' );

function featured_box_shortcode ($atts, $content = null) {
extract(shortcode_atts(array(
      'class' => '',
      'css' => '',
      'title' => '',
      'image_url' => '',
), $atts));

	$return  =	'<div style="background-image:url('. $image_url .');'. $css .'" class="featured-box '. $class .'">';
	$return .=	'<div class="featured-box-text">';
	if ( $title !== '' ) : $return .=  '<p class="no-margin-bottom lead light-text">' .$title. '</p>'; endif;
	$return .=	do_shortcode($content);
	$return .=	'</div></div>';

	return $return;
}

/*-------------------------------------------------------------------------------------------*/
/*	Flipping Circle
/*-------------------------------------------------------------------------------------------*/

add_shortcode( 'flipping-circle', 'flipping_circle_shortcode' );

function flipping_circle_shortcode ($atts) {
extract(shortcode_atts(array(
      'class' => '',
      'image_url' => '',
      'title' => '',
      'link_url' => '#',
      'link_text' => 'View More',
      'description' => '',
), $atts));

	$return  =	'<div class="flipper-wrapper"><div class="flipping-circle-item" style="background-image:url('. $image_url .');" ontouchstart="this.classList.toggle(\'hover\');">';
	$return .=	'<div class="flipping-circle-info-wrap">';
	$return .=  '<div class="flipping-circle-info">';
	$return .=	'<div class="flipping-circle-info-front" style="background-image:url('. $image_url .');" ></div>';
	$return .=	'<div class="flipping-circle-info-back">';
	$return .=	'<h3>'. $title .'</h3>';
	$return .=	'<p>'. $description .' <a href="'. $link_url .'">'. $link_text .'</a></p>';
	$return .=	'</div></div></div></div></div>';

	return $return;
}
?>