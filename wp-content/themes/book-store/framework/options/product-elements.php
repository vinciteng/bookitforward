<?php

	/*
	*	CrunchPress Product Item Item File
	*	---------------------------------------------------------------------
	* 	@version	1.0
	* 	@author		Nasir Hayat
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) CrunchPress
	*	---------------------------------------------------------------------
	*	This file contains the function that can print product related item in 
	*	different conditions.
	*	---------------------------------------------------------------------
	*/

	

	/////////Print Best Seller Products//////////
	
	function print_product_best_saller($item_xml){
		$header = find_xml_value($item_xml, 'header');
		$query_args = array(
			'post_status' 	 => 'publish',
			'post_type' 	 => 'product',
			'meta_key' 		 => 'total_sales',
			'orderby' 		 => 'meta_value_num',
			'no_found_rows'  => 1,
			 'posts_per_page'=>2,
		);

		if ( isset( $instance['hide_free'] ) && 1 == $instance['hide_free'] ) {
			$query_args['meta_query'][] = array(
				'key'     => '_price',
				'value'   => 0,
				'compare' => '>',
				'type'    => 'DECIMAL',
			);
		}

		$r = new WP_Query($query_args);
		if ( $r->have_posts() ) {
			 echo'<div class="heading-bar">';
			 echo'<h2>';
			 if (!empty($header)){
				 echo $header;	 
			 } else {
					 __('Best Sellers','crunchpress'); 
			 }
			echo '</h2>';
			echo'  <span class="h-line"></span> </div>';
			 echo' <div class="slider2">';
			while ( $r->have_posts()) {
				$r->the_post();
				global $product;
			 $image_type = empty($image_type)? "Link to Current Post": $image_type; 
			 $thumbnail_id = get_post_thumbnail_id();
			 $item_size = find_xml_value($item_xml, 'thumb-size');
			 if (empty ($item_size)) {
			     $item_size ="100x130";
			 }
			 $thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size );
			 $alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
			 $product_title = get_the_title();
			 $title_length = get_option(THEME_NAME_S.'_products_page_title_length');					 
			 $short_title = substr($product_title,0,'15');
			 $num_excerpt = '5';
			 
			
		echo'<div class="slide">';
		
		if (! empty($thumbnail)) {
				         echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
						 echo '<div class="thumb"><img src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/></div>';
						 echo '</a>';
					    }else {
						 echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
								$item_size_arr= explode('x',$item_size); $item_size_new_h=$item_size_arr[1]; $item_size_new_w=$item_size_arr[0];
							   echo '<div class="thumb"><img width="'. $item_size_new_w .'px"  height="'. $item_size_new_h .'px" " src="' .CP_PATH_URL.'/images/no-image.jpg" alt="no image"/></div>';
						 echo '</a>'; 
			 }
		echo'  <div class="slide2-caption">';
		echo'     <div class="left"> <span class="title"><a href="' . get_permalink() . '">' . $short_title. '</a></span>'; 
		echo '<span class="author-name">';
		global $post;
		the_terms( $post->ID, 'author', 'by ', ', ', ' ' );
		echo '</span>';
		echo '</div>';
		echo '<div class="cart-price"> <span class="price">' . do_action( 'woocommerce_after_shop_loop_item_title' ).'</span> </div>';
		echo'    </div>';
		echo'  </div>';
		
			}
			
		}
		
		echo' </div>';

 }

	////////// Print on sales products//////////
	
	function print_product_on_sales($item_xml){
	if(cp_woocommerce_enabled()) { 
	$title = find_xml_value($item_xml, 'title');
	$caption = html_entity_decode(find_xml_value($item_xml, 'caption'));
	$button_title =  find_xml_value($item_xml, 'button-title');
	$category_val = find_xml_value($item_xml, 'onsale-category');
	if ($category_val == "All") {
	    $category_val = "";	
	}
	$post_num = find_xml_value($item_xml, 'onsale-num');
		if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		}			
		$post_temp = query_posts(array('post_type'=>'product', 'paged'=>$paged, 
		'product_cat'=>$category_val, 'posts_per_page'=>$post_num));
		    $counter_product = 0;
			while( have_posts() ){
							the_post();				
								
			 $item_size ="98x130";
			 $image_type = empty($image_type)? "Link to Current Post": $image_type; 
			 $thumbnail_id = get_post_thumbnail_id();
			 $thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size );
			 $alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
			 $product_title = get_the_title();
			 $title_length = get_option(THEME_NAME_S.'_products_page_title_length');					 
			 $short_title = substr($product_title,0,$title_length);
			 $num_excerpt = '5';
			 
			 if($counter_product % 3 == 0 ){
			 echo '<figure class="span4 s-product columns ">';
			  echo '<div class="s-product-img">';
			  if (! empty($thumbnail)) {
				         echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
						 echo '<img src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/>';
						 echo '</a>';
					    }else {
						 echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
								$item_size_arr= explode('x',$item_size); $item_size_new_h=$item_size_arr[1]; $item_size_new_w=$item_size_arr[0];
							   echo '<img width="'. $item_size_new_w .'px"  height="'. $item_size_new_h .'px" " src="' .CP_PATH_URL.'/images/no-image.jpg" alt="no image"/>';
						 echo '</a>'; 
			 }
			 echo'</div>';
			 echo '<article class="s-product-det">';
			 echo '<h3 class="product-thumbnail-title port-title-color cp-title title-holder"><a href="' . get_permalink() . '">' . $product_title. '</a></h3>'; 
			 echo '<p>';
			 echo substr(wp_strip_all_tags( get_the_excerpt() ), 0,100);
			 echo '</p>';
			 echo '<div class="clearfix"></div>';
			 echo '<div class="cart-btn2">';
			 do_action( 'woocommerce_after_shop_loop_item' );
			 echo '</div>';
			 echo '<div class="cart-price"> <span class="price">' . do_action( 'woocommerce_after_shop_loop_item_title' ).'</span> </div>';
			 woocommerce_show_product_loop_sale_flash();
			 echo '</article>';
			 echo '</figure>';
			}else{	
			 echo '<figure class="span4 s-product columns">';
			 echo '<div class="s-product-img">';
			  if (! empty($thumbnail)) {
				         echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
						 echo '<img src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/>';
						 echo '</a>';
					    }else {
						 echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
								$item_size_arr= explode('x',$item_size); $item_size_new_h=$item_size_arr[1]; $item_size_new_w=$item_size_arr[0];
							   echo '<img width="'. $item_size_new_w .'px"  height="'. $item_size_new_h .'px" " src="' .CP_PATH_URL.'/images/no-image.jpg" alt="no image"/>';
						 echo '</a>'; 
			 }
			 echo'</div>';
			 echo '<article class="s-product-det">';
			 echo '<h3 class="product-thumbnail-title port-title-color cp-title title-holder"><a href="' . get_permalink() . '">' . $product_title. '</a></h3>'; 
			 echo '<p>';
			 echo substr(wp_strip_all_tags( get_the_excerpt() ), 0,100);
			 echo '</p>';
			 echo '<div class="clear"></div>';
			 echo '<div class="cart-btn2">';
			 do_action( 'woocommerce_after_shop_loop_item' );
			 echo '</div>';
			 echo '<div class="cart-price"> <span class="price">' . do_action( 'woocommerce_after_shop_loop_item_title' ).'</span> </div>';
			 woocommerce_show_product_loop_sale_flash();
			 echo '</article>';
			 echo '</figure>';
			}
				if($counter_product % 3 == 0 ){'<div class="clear"></div>';}
				  $counter_product++;
		     }
							
			} else {
				  __('Missing Woocommerce plugin','crunchpress');
				   }
			}
	
	///////////Print Featured Products///////////////
	
	function print_product_featured_product($item_xml){
		if(cp_woocommerce_enabled()) { 
		    $title = find_xml_value($item_xml, 'featured-header');
			$featured_category = find_xml_value($item_xml, 'featured-category');
            if ($featured_category == "All" ) {
				$featured_category = "";
			}
			
			
			$featured_num = find_xml_value($item_xml, 'featured-num');
			$caption = html_entity_decode(find_xml_value($item_xml, 'caption'));
			$button_title =  find_xml_value($item_xml, 'button-title');
			if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		    }			
				
				$post_temp = query_posts(array('post_type'=>'product', 'paged'=>$paged, 
				'product_cat'=>$featured_category, 'posts_per_page'=>$featured_num));
					echo '<section class=" m-bottom">';
					echo '<div class="heading-bar">';
					echo '<h2>';
					if(!empty($title)) { echo $title ;} 
					else {
					echo __('Featured Books','crunchpress');
					}
					echo '</h2>';
					echo '<span class="h-line"></span> </div>';
					echo ' <div class="slider1">';
					while( have_posts() ){
									the_post();		
											
					 $image_type = empty($image_type)? "Link to Current Post": $image_type; 
					 $thumbnail_id = get_post_thumbnail_id();
					 $thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size );
					 $alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
					 $product_title = get_the_title();
					 $title_length = get_option(THEME_NAME_S.'_products_page_title_length');					 
					 $short_title = substr($product_title,0,'20');
					 $num_excerpt = '5';
			         
					 $image_resizing = find_xml_value($item_xml, 'image-resizing');
					
					 if ($image_resizing == "Yes" && !empty($thumbnail)) {					 
					     $item_size ="144x183";
					 }else{
						 $item_size ="Full"; 
					 }
					
					 echo '<div class="slide">'; 
					 echo '<div class="product-thumb-wrapper">';
					 if (! empty($thumbnail)) {
				         echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
						 echo '<img src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/>';
						 echo '</a>';
					    }else {
						 echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
								$item_size_arr= explode('x',$item_size); $item_size_new_h=$item_size_arr[1]; $item_size_new_w=$item_size_arr[0];
							   echo '<img width="'. $item_size_new_w .'px"  height="'. $item_size_new_h .'px" " src="' .CP_PATH_URL.'/images/no-image.jpg" alt="no image"/>';
						 echo '</a>'; 
					    }
					  echo '</div>';
					  echo '<div class="product-title-wrapper">';					
					  echo '<span class="title title-holder"><a href="' . get_permalink() . '">' . $product_title. '</a></span>';
					  echo '<div class="cleafix"></div>';
					  echo '<div class="product-meta-wrapper">';
					  echo '<div class="cart-btn2">';
					 	 do_action( 'woocommerce_after_shop_loop_item' );
					  echo '</div>';
					  echo '<div class="cart-price"> <span class="price">' . do_action( 'woocommerce_after_shop_loop_item_title' ).'</span> </div>';
						  woocommerce_show_product_loop_sale_flash().'</article>';
                      echo '</div>';
					  echo '</div>';
					  echo '</div>';
			
				}
				 echo '</div>';
		  echo '</section>';
		  
		} else {
			 __('Missing Woocommerce Plugin','crunchpress');
		}
	}


// Print products
	function print_product($item_xml){
		
		if( function_exists('woocommerce_get_template_part')) {
		wp_reset_query();
		global $paged;
		global $sidebar;
		global $port_div_size_num_class;
		global $class_to_num;
		if(empty($paged)){
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
		}
		
		// get the item class and size from array
		$port_size = find_xml_value($item_xml, 'item-size');
		
		$item_class = $port_div_size_num_class[$port_size]['class'];
		if( $sidebar == "no-sidebar" ){
			$item_size = $port_div_size_num_class[$port_size]['size'];
		}else if ( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
			$item_size = $port_div_size_num_class[$port_size]['size2'];
		}else{
			$item_size = $port_div_size_num_class[$port_size]['size3'];
		}
		
		$port_div_size_min_hight = array(
			"1/4" => array("class"=>"four columns", "size"=>"161", "size2"=>"90", "size3"=>"130"), 
			"1/3" => array("class"=>"one-third column", "size"=>"185", "size2"=>"120", "size3"=>"130"), 
			"1/2" => array("class"=>"eight columns", "size"=>"290", "size2"=>"195", "size3"=>"130"), 
			"1/1" => array("class"=>"sixteen columns", "size"=>"225", "size2"=>"x182", "size3"=>"292"));
		
		if( $sidebar == "no-sidebar" ){
			$min_size = $port_div_size_min_hight[$port_size]['size'];
		}else if ( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
			$min_size = $port_div_size_min_hight[$port_size]['size2'];
		}else{
			$min_size = $port_div_size_min_hight[$port_size]['size3'];
		}
		
		// get the portfolio meta value
		$header = find_xml_value($item_xml, 'header');
		$num_fetch = find_xml_value($item_xml, 'num-fetch');
		$num_excerpt = find_xml_value($item_xml, 'num-excerpt');
		
		$category = find_xml_value($item_xml, 'category');
		$category_val = ( $category == 'All' )? '': $category;
		
		$filterable = find_xml_value($item_xml, 'filterable');
		$filter_class = '';
		// portfolio header
		if(!empty($header)){
			echo '<div class="product-header-wrapper"><h3 class="product-header-title title-color cp-title">' . $header . '</h3></div>';
		} 
		
		$porduct_item_style = find_xml_value($item_xml,'product-style');
	
		// category list for filter
		if( $filterable == "Yes" && $porduct_item_style == "STYLE 1") {
			$category_lists = get_category_list('product_cat', $category_val);
			$is_first = 'active';
			echo'<div class="filter-nav">';
			$view_all_product = find_xml_value($item_xml, 'view-all-product');
			if($view_all_product != 'No'){
				$view_all_product_link = get_permalink( get_page_by_title( $view_all_product ) );
			echo '<a class="view-all" href="' . $view_all_product_link . '">' . __('View All','cp_front_end') . '</a>';
			}
			
			echo '<ul id="product-item-filter">';
			foreach($category_lists as $category_list){
				
				$category_term = get_term_by( 'name', $category_list , 'product_cat');
				if( !empty( $category_term ) ){
					$category_slug = $category_term->slug;
				}else{
					$category_slug = 'all';
				}
				echo '<li><a href="#" class="' . $is_first . '" data-value="' . $category_slug . '">' . $category_list . '</a>  </li>';
				
				$is_first  = '';
			}
		    echo "</ul>";
			echo'</div>';
		    echo '<div class="clear"></div>';
		}
		
		// start fetching database
		global $post, $wp_query;
		
		if( !empty($category_val) ){
			$category_term = get_term_by( 'name', $category_val , 'product_cat');
			$category_val = $category_term->slug;
		}
		
		$post_temp = query_posts(array('post_type'=>'product', 'paged'=>$paged, 
			'product_cat'=>$category_val, 'posts_per_page'=>$num_fetch));

		// get the portfolio size
		$port_wrapper_size = $class_to_num[find_xml_value($item_xml, 'size')];
		$port_current_size = 0;
		
		
							echo '<section id="product-item-holder" class="product-item-holder">';
							
							    $porduct_item_style = find_xml_value($item_xml,'product-style');
												
								while( have_posts() ){
								the_post();				
														
								// get the category for filter
								$item_categories = get_the_terms( $post->ID, 'product_cat' );
								$category_slug = " ";
								if( !empty($item_categories) ){
									foreach( $item_categories as $item_category ){
										$category_slug = $category_slug . $item_category->slug . ' ';
									}
												
								// start printing data
								 echo '<figure class="' . $item_class . $category_slug . ' product-item mt0">';  
										// start printing data
										$thumbnail_types = "Image";
										if( $thumbnail_types == "Image" ){
											$image_type = "Lightbox to Current Thumbnail";
											$image_type = empty($image_type)? "Link to Current Post": $image_type; 
											$thumbnail_id = get_post_thumbnail_id();
											$thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size_new );
											$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
											$image_type ="Lightbox to Picture";
											if($image_type == "Lightbox to Picture" ){
												$hover_thumb = "hover-link";
												$permalink = get_permalink();	
												
											}		
										}
										$product_title= get_the_title();
										$title_length = get_option(THEME_NAME_S.'_products_page_title_length');					 
										$short_title = substr($product_title,0,$title_length);
										echo '<div class="product-thumbnail-context">';
										echo '<div class="product-item-container">';
										echo '<div class="product-thumbnail-image">';
												echo '<img  src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/>'; 
												echo '<div class="product-item-context">';
												echo '<h2 class="product-thumbnail-title port-title-color cp-title"><a href="' . get_permalink() . '">' . $product_title. '</a></h2>';
												echo '<div class="product-price">';
												do_action( 'woocommerce_after_shop_loop_item_title' );
												echo '</div>';
												echo '</div>';
												echo '</div>'; //portfolio thumbnail image	
										
										echo '<div class="product-thumbnail-content">';	
												echo '<span class="product_cart">'. do_action( 'woocommerce_after_shop_loop_item' ).'</span>';
												echo '<span class="details-button"><a href="' . $permalink . '" ' . $pretty_photo . ' class="cp-button" title="' . get_the_title() . '">Item Details</a></span>';
										echo '</div>';
										echo '</div>';
										echo '</div>';
									   woocommerce_show_product_loop_sale_flash();
										do_action( 'woocommerce_show_product_loop_sale_flash');
										do_action( 'woocommerce_before_shop_loop_item' );
										
								 echo '</figure>';
							  }
							}
		echo "</section>";
		
		echo '<div class="clear"></div>';
		if ($porduct_item_style == "STYLE 1") {
		if( find_xml_value($item_xml, "pagination") == "Yes" ){	
			pagination(); }
		}
		} else{ 
		       echo'<div class="message-box-wrapper red mr10">';
			   echo'<div class="message-box-title">Missing Woo Commerce Plugin</div>';
			   echo'<div class="message-box-content">Please install Woo Commerce Plugin</div>';
			   echo'</div>';
 	          } 
  	    }




////////////Print Product Slider ////////////
			
	function print_product_slider_item($item_xml){
		if(cp_woocommerce_enabled()) { 
		wp_reset_query();
		$product_order = find_xml_value($item_xml, 'order');
		$category = find_xml_value($item_xml, 'category');
		if ( $category == "All" ) {
		     $category = "";
	 	}
		$no_slide = find_xml_value($item_xml, 'no-slide');
		$show_author = find_xml_value($item_xml, 'show-author');
		$show_button = find_xml_value($item_xml, 'show-button');
		$readmore = find_xml_value($item_xml, 'readmore');
		$slider_logo = find_xml_value($item_xml, 'slider-logo');
		$category = ($category == 'All')? '': $category;

	
		$args = array(
			'post_type'	=> 'product',
			'post_status' => 'publish',
			'posts_per_page' => $no_slide,
		);
		
	 global $paged;
	 $post_temp = query_posts(array('post_type'=>'product', 'paged'=>$paged, 
			'product_cat'=>$category, 'posts_per_page'=>$no_slide));
			
	 if(have_posts()) :
	


?>
<style > 
<?php 	
$slider_bg = find_xml_value($item_xml, 'slider-bg');
$thumbnail = wp_get_attachment_image_src( $slider_bg , "full" );
if (!empty ($thumbnail)) {
			echo '.bb-custom-content { background: url('. $thumbnail[0].') no-repeat top; background-repeat: no-repeat; background-position: top; }';
} else {
?>
.bb-custom-content { background: url(<?php echo CP_PATH_URL; ?>/images/flower-bg.jpg) no-repeat top; background-repeat: no-repeat; background-position: top; }
<?php  } ?>
</style>
<!-- Elastislide Carousel -->

<section class="span12 slider">
<section class="main-slider">
<div class="bb-custom-wrapper">
<div id="bb-bookblock" class="bb-bookblock">
<?php while (have_posts()) : the_post(); 
	             
				 
				$item_size = find_xml_value($item_xml, 'slide-thumb-size'); 
				if (empty ($item_size)) {
					$item_size = '230x330';
				} 
				$thumbnail_id = get_post_thumbnail_id(); $thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size ); $alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
				
				$product_title= get_the_title();
				$title_length = get_option(THEME_NAME_S.'_products_page_title_length');					 
				$short_title = substr($product_title,0,$title_length);
						
		
		   echo '<div class="bb-item">';
                echo '<div class="bb-custom-content">';
                      echo '<div class="slide-inner">';
                       echo'<div class="span4 book-holder">';
                        if (! empty($thumbnail)) {
				         echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
						 echo '<img src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/>';
						 echo '</a>';
					    }else {
						 echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
								$item_size_arr= explode('x',$item_size); $item_size_new_h=$item_size_arr[1]; $item_size_new_w=$item_size_arr[0];
							   echo '<img style="width:'.$item_size_new_w.'px; height:'.$item_size_new_h.'px; " width="'. $item_size_new_w .'px"  height="'. $item_size_new_h .'px" " src="' .CP_PATH_URL.'/images/no-image.jpg" alt="no image"/>';
						 echo '</a>'; 
					    }
						echo '<div class="clearfix"></div>';
						echo '<div class="slider-meta-wrapper">';
						echo '<div class="slider-cart-wrapper">';
							echo '<div class="cart-btn2">';
								do_action( 'woocommerce_after_shop_loop_item' );
							echo '</div>';
						echo '</div>';
						echo '<div class="slider-price-wrapper">';
					    echo '<div class="cart-price"> <span class="price">' . do_action( 'woocommerce_after_shop_loop_item_title' ).'</span> </div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
                        echo '<div class="span7 book-detail">';
						echo '<div class="details-wrapper">';
                        echo '<h2 class="product-thumbnail-title port-title-color cp-title"><a href="' . get_permalink() . '">' . $product_title. '</a></h2>';
						if ($show_author == 'Yes') { 
                        echo '<strong class="title">'. the_terms( get_the_ID(), 'author', 'by ', ', ', ' ' ). '</strong>'; }
                                                echo '<div class="book-rating">';
                                                do_action( 'woocommerce_after_shop_loop_item_title' );
                                                echo '</div>';
						if   ($show_button == 'Yes') {  
						echo '<span class="shop-btn">';
						do_action( 'woocommerce_after_shop_loop_item' );
						echo '</span>'; }
						echo '</div>';
                        echo '<div class="cap-holder">';
                        echo '<p>'. substr(get_the_excerpt(), 0,200); '</p>';
						echo '<div class="clear"></div>';
						if ( $readmore == 'Yes' ) {
							echo '<a href="'.get_permalink().'">'.__('Read More','crunchpress').'</a>';
					    }
						$thumbnail = wp_get_attachment_image_src( $slider_logo , "full" );
						echo '<div class="slider-logo">';
						echo '<img src="' . $thumbnail[0] .'" alt="Slider Logo"/>';
						echo '</div>';
                        echo '</div>';
                        echo '</div>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';
      endwhile; 
	     echo '</div>';
         echo '</div>';
	     echo '<nav class="bb-custom-nav"> <a href="#" id="bb-nav-prev" class="left-arrow">Previous</a> <a href="#" id="bb-nav-next" class="right-arrow">Next</a> </nav>';
      echo '</section>';
echo '<span class="slider-bottom">';
echo '<img alt="Shadow" src="'.CP_PATH_URL.'/images/slider-bg.png">';
echo '</span>';
 echo '</section>';

endif;

		
		}else {
			   echo'<div class="message-box-wrapper red mr10">';
			   echo'<div class="message-box-title">Missing Woo Commerce Plugin</div>';
			   echo'<div class="message-box-content">Please install Woo Commerce Plugin</div>';
			   echo'</div>';
		}
	}
	
	
