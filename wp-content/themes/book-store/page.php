<?php
/*
 * This file is used to generate different page layouts set from backend.
 */
get_header ();
?>
		<?php
        
        $sidebar = get_post_meta ( $post->ID, 'page-option-sidebar-template', true );
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
			$sidebar_class = "no-sidebar";
		}
        	$left_sidebar = get_post_meta ( $post->ID, "page-option-choose-left-sidebar", true );
			$right_sidebar = get_post_meta ( $post->ID, "page-option-choose-right-sidebar", true );
		
		
    
				// Top Slider Part
				global $cp_top_slider_type, $cp_top_slider_xml;
					
				if( $cp_top_slider_type == 'Layer Slider' ){
					$layer_slider_id = get_post_meta( $post->ID, 'page-option-layer-slider-id', true);
					echo '<div class="slider-wrapper">';
					echo '<section class="slider-container">';
					echo do_shortcode('[layerslider id="' . $layer_slider_id . '"]');					
					echo '</section>';
       			echo '</div>';
				}else if ($cp_top_slider_type != "No Slider" && $cp_top_slider_type != '') {
					echo '<section class="slider-wrapper top-slider">';
					$slider_xml = "<Slider>" . create_xml_tag ( 'size', 'full-width' );
					$slider_xml = $slider_xml . create_xml_tag ( 'height', get_post_meta ( $post->ID, 'page-option-top-slider-height', true ) );
					$slider_xml = $slider_xml . create_xml_tag ( 'width', 960 );
					$slider_xml = $slider_xml . create_xml_tag ( 'slider-type', $cp_top_slider_type );
					$slider_xml = $slider_xml . $cp_top_slider_xml;
					$slider_xml = $slider_xml . "</Slider>";
					$slider_xml_dom = new DOMDocument ();
					$slider_xml_dom->loadXML ( $slider_xml );
					print_slider_item ( $slider_xml_dom->documentElement );
					echo '</section>';
				  }
			 
	
    
  echo '<section id="content-holder" class="container-fluid">';
           echo '<section class="container">';
		       echo '<div class="row-fluid '.$sidebar_class.'">';
	 
			global $bcontainer_class;
			
			echo "<div class='".$bcontainer_class." cp-page-float-left'>";
			          echo "<div class='".$container_class. " page-item'>";
								
								// Page title and content
								$cp_show_title = get_post_meta ( $post->ID, 'page-option-show-title', true );
								$cp_show_content = get_post_meta ( $post->ID, 'page-option-show-content', true );
								if ($cp_show_title != "No") {
									while ( have_posts () ) {
										the_post ();
										echo '<section class="span12 columns">';
											if (! empty ( $cp_page_xml )) {	
													$page_xml_val = new DOMDocument ();
													$page_xml_val->loadXML ( $cp_page_xml );
													
											foreach ( $page_xml_val->documentElement->childNodes as $item_xml ) {
													$page_title = ($item_xml->nodeName);
													}
											}
										/*    if ($page_title !== 'Portfolio' && $page_title !== 'Products' ){*/
											   		
													  $cp_show_title = get_post_meta ( $post->ID, 'page-option-show-title', true );
													  $cp_show_content = get_post_meta ( $post->ID, 'page-option-show-content', true );
											if ($cp_show_title != "No") {
												echo'<div class="heading-bar">';
												echo '<h2>';
												the_title ();
												echo '</h2>';
												echo'<span class="h-line"></span>';
                                                echo '</div>';
											}
											
											/*}*/
										$content = get_the_content ();
										if ($cp_show_content != 'No' && ! empty ( $content )) {
											echo '<div class="cp-page-wrapper">';
											echo '<div class="cp-page-content">';
											the_content ();
											wp_link_pages ( array ('before' => '<div class="page-link"><span>' . __ ( 'Pages:', 'cp_front_end' ) . '</span>', 'after' => '</div>' ) );
											echo '</div>';
											echo '</div>';
											echo '<div class="clear"></div>';
										}
										echo '</section>';
									}
								} else {
									while ( have_posts () ) {
										the_post ();
										$content = get_the_content ();
										if ($cp_show_content != 'No' && ! empty ( $content )) {
											echo '<section class="span12 columns">';
											echo '<div class="cp-page-content">';
											the_content ();
											echo '</div>';
											echo '</section>';
										}
									}
								}
								
								global $cp_item_row_size;
								$cp_item_row_size = 0;
								// Page Item Part
								if (! empty ( $cp_page_xml )) {
									$page_xml_val = new DOMDocument ();
									$page_xml_val->loadXML ( $cp_page_xml );
									foreach ( $page_xml_val->documentElement->childNodes as $item_xml ) {
										switch ($item_xml->nodeName) {
											case 'Accordion' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ), 'wrapper' );
												print_accordion_item ( $item_xml );
												break;
											case 'Blog' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ), 'columns ');
												print_blog_item ( $item_xml );
												break;
											case 'Contact-Form' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ), 'columns ' );
												print_contact_form ( $item_xml );
												break;
											case 'Column' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ), 'columns ' );
												print_column_item ( $item_xml );
												break;
											case 'Content' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ) , 'columns ' );
												print_content_item ( $item_xml );
												break;
											case 'Divider' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ), 'columns ');
												print_divider ( $item_xml );
												break;
											case 'Message-Box' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ), 'columns ' );
												print_message_box ( $item_xml );
												break;
											case 'Page' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ), 'columns ' );
												print_page_item ( $item_xml );
												break;
											case 'Price-Item' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ), 'cp-price-item columns ' );
												print_price_item ( $item_xml );
												break;
											case 'Portfolio' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ), 'columns' );
												print_portfolio ( $item_xml ); // print_portfolio_style1
												break;
											case 'Product-Slider' :
											 	print_item_size ( find_xml_value ( $item_xml, 'size' ), 'product-slider-wrapper');
												print_product_slider_item ( $item_xml );
												break;
											case 'Product-Onsale' :
											 	print_item_size ( find_xml_value ( $item_xml, 'size' ),'columns wrapper  onsale');
												print_product_on_sales ( $item_xml );
												break;
											case 'Featured-Product' :
											 	print_item_size ( find_xml_value ( $item_xml, 'size' ),'columns  features-books features-books-sliders');
												print_product_featured_product ( $item_xml );
												break;
											case 'Featured-Author' :
											 	print_item_size ( find_xml_value ( $item_xml, 'size' ),' columns  m-bottom');
												print_product_featured_author ( $item_xml );
												break;
											case 'Best-Saller' :
											 	print_item_size ( find_xml_value ( $item_xml, 'size' ),' columns  best-sellers');
												print_product_best_saller ( $item_xml );
												break;
											case 'Blog-Slider' :
											 	print_item_size ( find_xml_value ( $item_xml, 'size' ),' columns  blog-section  m-bottom');
												print_blog_posts ( $item_xml );
												break;
											case 'Products' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ), 'columns  cp-portfolio-item' );
												print_product ( $item_xml ); // print_portfolio_style2 New
												break;
											case 'Slider' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ), 'columns ' );
												print_slider_item ( $item_xml );
												break;
											case 'Text-Widget' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ), 'columns  wellcome-msg m-bottom ' );
												print_text_widget ( $item_xml );
												break;
											case 'Tab' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ) , 'columns ');
												print_tab_item ( $item_xml );
												break;
											case 'Testimonial' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ),'columns  testimonials');
												print_testimonial ( $item_xml );
												break;
											case 'Toggle-Box' :
												print_item_size ( find_xml_value ( $item_xml, 'size' ), 'columns ' );
												print_toggle_box_item ( $item_xml );
												break;
											default :
												print_item_size ( find_xml_value ( $item_xml, 'size' ) );
												break;
										}
										echo '</article>';
									}
								}
						echo "</div>"; // end of cp-page-item
						    get_sidebar ( 'left' );
					echo "</div>"; // cp-page-float-left
					    	get_sidebar ( 'right' );
		 	
			?>
        
    
    </div>
    </section>
  </section>
<?php get_footer(); ?>