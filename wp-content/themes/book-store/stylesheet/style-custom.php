<?php
	/*	
	*	CrunchPress Custom Style File (style-custom.php)
	*	---------------------------------------------------------------------
	*	This file fetch all style options in admin panel to generate the css
	*	to attach to header.php file
	*	---------------------------------------------------------------------
	*/

	header('Content-type: text/css;');
	
	$current_url = dirname(__FILE__);
	$wp_content_pos = strpos($current_url, 'wp-content');
	$wp_content = substr($current_url, 0, $wp_content_pos);

	require_once $wp_content . 'wp-load.php';
	
?>

/* Background
   ------------------------------------------------------------------ */
<?php   $color_scheme = get_option(THEME_NAME_S.'_default_background_color','#fff'); 
	    $background_style =  get_option(THEME_NAME_S.'_background_style','None');
	    if($background_style == 'None'){ ?>
        
		html{ 
			background-color: <?php echo $color_scheme; ?> ; 
		}
        
  <?php
  
  
       $background_style =  get_option(THEME_NAME_S.'_background_style','Pattern');
	   }elseif($background_style == 'Custom Image'){
			$background_id = get_option(THEME_NAME_S.'_background_custom');
			if(!empty($background_id)){ 
				$background_image = wp_get_attachment_image_src( $background_id, 'full' );
				echo ' html{ background: url("'.$background_image[0] . '")};';
			}
		}
	   elseif($background_style == 'Pattern'){
       $background_pattern = get_option(THEME_NAME_S.'_background_pattern','1');
		?>
		html{
			background-image: url('<?php echo CP_PATH_URL; ?>/images/pattern/pattern-<?php echo $background_pattern; ?>.png');
			background-repeat: repeat; 
		}
		
		<?php
	}
?>

<?php  if ( is_user_logged_in() ) {echo 'html{margin-top:28px;}';} ?>


<?php $heading_color = get_option(THEME_NAME_S.'_default_heading_color','#809F14');  ?>
<?php $link_color = get_option(THEME_NAME_S.'_default_link_color','#809F14');  ?>
<?php $overall_color = get_option(THEME_NAME_S.'_default_overall_color','#809F14');  ?>

a, .e-commerce-list li a {
   color:<?php echo $overall_color;  ?>
}
#main-header input[type="submit"], .post-date2, .slide2-caption, .h-line, .post-date, .sub-menu li:hover, .sub-menu li.sfHover, .more-btn, .side-holder h2, .top-nav li a:hover,
.top-nav li a.active, .summary .button  {
    background: <?php echo $overall_color .'!important'; ?>
}
.cp-button, .btn, #submit, .button {
    background: <?php echo $overall_color; ?>
}

div.portfolio-thumbnail-image-hover, .pagination a:hover, .pagination span.current, .bb-custom-content {
	background-color: <?php echo $overall_color .'!important'; ?>
}
<?php /*?>.bb-custom-content { background-color: <?php echo $overall_color .'!important'; ?> }<?php */?>
.row-fluid .wellcome-msg[class*="span"], .author-img-holder, .Featured-Author, body, #main-header .navbar-inverse .nav > li > a:hover  {
    border-color:<?php echo $overall_color .'!important';  ?>
}
.features-books .slide:hover  {
    border-color:<?php echo $overall_color .'!important';  ?>
}
ul.tabs li a.active {
    color:<?php echo $overall_color .'!important';  ?>
}
 a.cp-button, input[type="submit"], input[type="reset"], input[type="button"], .shop-btn a {
    background-color: <?php echo $overall_color; ?>
}
.portfolio-thumbnail-slider .cp-title, .blog-thumbnail-slider .cp-title{
      color:<?php echo $overall_color;  ?>
}
 h1, h2, h3, h4, h5, h6, .cp-title, .b-post h3 a, .main-slider .cp-title > a , .testimonials .title span, .wellcome-msg p, .testimonials .title span, .author-det-box .title2 , .cart-btn2 a, div.product .product_title, #content div.product .product_title{
   color:<?php echo $overall_color;  ?>
}
 .e-commerce-list .widgettitle {
      color:<?php echo $overall_color;  ?>
}
 
 span.onsale {
    border-color: <?php echo $overall_color;  ?> transparent transparent;
 }
 
 .woocommerce div.product .woocommerce-tabs ul.tabs li.active,.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active,.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active,.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active {
   border-color: <?php echo $overall_color;  ?> transparent transparent !important;
}
 
 
/* RTL funtion
   ------------------------------------------------------------------ */
				   
<?php $rtl = get_option ( THEME_NAME_S . '_rtl', 'disable' ); ?>

<?php if ($rtl== "enable") { ?>

	 body {
     	text-align:right; 
     }
	.post-comments-top {
    	float:left !important;
    }
    
<?php }?>

body {
	text-align:<?php echo $rtl?>;
}
 
/* Font Size
   ------------------------------------------------------------------ */
body{
	font-size: <?php echo get_option(THEME_NAME_S.'_content_size', '12'); ?>px;
}
h1{
	font-size: <?php echo get_option(THEME_NAME_S.'_h1_size', '30'); ?>px;
}
h2{
	font-size: <?php echo get_option(THEME_NAME_S.'_h2_size', '25'); ?>px;
}
h3{
	font-size: <?php echo get_option(THEME_NAME_S.'_h3_size', '20'); ?>px;
}
h4{
	font-size: <?php echo get_option(THEME_NAME_S.'_h4_size', '18'); ?>px;
}
h5{
	font-size: <?php echo get_option(THEME_NAME_S.'_h5_size', '16'); ?>px;
}
h6{
	font-size: <?php echo get_option(THEME_NAME_S.'_h6_size', '15'); ?>px;
}


/* Font Family 
  ------------------------------------------------------------------ */
body{
	font-family: <?php echo substr(get_option('cp_content_font'), 2); ?>;
}

h1, h2, h3, h4, h5, h6, .cp-title{
	font-family: <?php echo substr(get_option('cp_header_font'), 2); ?>;
}
.wellcome-msg h2 { font-family: <?php echo substr(get_option('_text_widget_font'), 2); ?>; }

#nav a, .top-nav a, .user-login-link{ font-family: <?php echo substr(get_option('cp_menu_font'), 2); ?>; }

#wp-calendar td, #wp-calendar th, .post h4, .tech-text, ul#nav, .box, .footer-tweet, .box h5, .right-heading span, .worship, .vies-calender, .news-heading, ul.pagination, .prayer-box, .posted, .prayer-heading, .prayer-heading span, .share-request, .blog-holder, .post-title, .blog-date, .title, .txt-widget, .txt-widget h4, .btn, .name, .map-view, .event-comment, .comment-post li, .blog-comments, .add-comment, .post-heading, .tags a, ul.tabs-content, div.comment-wrapper #reply-title, h3.accordion-header-title, div.blog-item-holder .blog-item2 .post-title, div.contact-form-wrapper ol li input, div.contact-form-wrapper textarea, .detail, .inner-heading, .event-slider-caption .left, .info-heading, .event-slider-button, #wp-calendar caption {
   font-family: <?php echo substr(get_option('cp_header_font'), 2); ?>;
}  

html, body, div, span, applet, object, iframe, p, blockquote, pre, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video, .wellcome-msg p {
   font-family: <?php echo substr(get_option('cp_content_font'), 2); ?>;
}
/* Font Color
   ------------------------------------------------------------------ */


<?php $custom_style = get_option(THEME_NAME_S.'_custom_styling'); ?>

<?php echo $custom_style ?>

