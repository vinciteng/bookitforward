<?php

	/*
	*	CrunchPress Page Item File
	*	---------------------------------------------------------------------
	* 	@version	7.0
	* 	@author		Nasir Hayat
	* 	@link		http://crunchpress.com
	* 	@copyright	Copyright (c) CrunchPress
	*	---------------------------------------------------------------------
	*	This file contains the function that can print each page item in 
	*	different conditions.
	*	---------------------------------------------------------------------
	*/

	// Print the item size <div> with it's class
	function print_item_size($item_size, $addition_class=''){
		global $cp_item_row_size;
		$cp_item_row_size = (empty($cp_item_row_size))? 0: $cp_item_row_size;
		if($cp_item_row_size >= 1){
			$cp_item_row_size = 0;
		}
	    global $post;	
	
		$sidebar = get_post_meta ( $post->ID, 'page-option-sidebar-template', true );
		
        $sidebar_class = '';
        if ($sidebar == "left-sidebar" || $sidebar == "right-sidebar") {
            $sidebar_class = "sidebar-included " . $sidebar;
        } else if ($sidebar == "both-sidebar") {
            $sidebar_class = "both-sidebar-included";
        }
        	$left_sidebar = get_post_meta ( $post->ID, "page-option-choose-left-sidebar", true );
			$right_sidebar = get_post_meta ( $post->ID, "page-option-choose-right-sidebar", true );
		
		switch($item_size){
			case 'element1-4':
				echo '<article class="span3 ' . $addition_class . ' ">';
				$cp_item_row_size += 1/4; 
				break;
			case 'element1-3':
				echo '<article class="span4 ' . $addition_class . '">';
				$cp_item_row_size += 1/3; 
				break;
			case 'element1-2':
				echo '<article class="span6 ' . $addition_class . '">';
				$cp_item_row_size += 1/2; 
				break;
			case 'element2-3':
				echo '<article class="span7' . $addition_class . '">';
				$cp_item_row_size += 2/3; 
				break;
			case 'element3-4':
				echo '<article class="span9' . $addition_class . '">';
				$cp_item_row_size += 3/4; 
				break;
			case 'element1-1':
				echo '<article class="span12 ' . $addition_class . '">';
				$cp_item_row_size += 1; 
				break;	
		}
		
	}
	
	/////////// Print Columns //////////
	
	function print_column_item($item_xml){
		echo do_shortcode(html_entity_decode(find_xml_value($item_xml,'column-text')));
	}

	if( $cp_is_responsive ){
		$gallery_div_size_num_class = array(
			'1/4' => array( 'class'=>'four columns', 'size'=>'390x250', 'size2'=>'390x250', 'size3'=>'390x250'),
			'1/3' => array( 'class'=>'one-third column', 'size'=>'300x150', 'size2'=>'300x150', 'size3'=>'300x150'),
			'1/2' => array( 'class'=>'eight columns', 'size'=>'460x390', 'size2'=>'460x390', 'size3'=>'460x390'),
			'1/16' => array( 'class'=>'gallery', 'size'=>'210x210', 'size2'=>'135x135', 'size3'=>'210x210'),
		); 	
	}else{
		$gallery_div_size_num_class = array(
			'1/4' => array( 'class'=>'four columns', 'size'=>'210x210', 'size2'=>'135x135', 'size3'=>'210x210'),
			'1/3' => array( 'class'=>'one-third column', 'size'=>'290x290', 'size2'=>'190x190', 'size3'=>'210x210'),
			'1/2' => array( 'class'=>'eight columns', 'size'=>'450x450', 'size2'=>'300x300', 'size3'=>'210x210'),
		); 			
	}
	
	
	/////////// Print Slider Items //////////
	
	function print_slider_item($item_xml){
		
		$xml_size = find_xml_value($item_xml, 'size');
		if( $xml_size == 'full-width' ){
			
		}else{
			echo '<div class="slider-wrapper">';
		}
		
		$slider_width = find_xml_value($item_xml, 'width');
		$slider_height = find_xml_value($item_xml, 'height');
		if( !empty($slider_width) && !empty($slider_height) ){
			$xml_size = $slider_width . 'x' . $slider_height;
		}else{
			$xml_size = '980x360';
		}

		switch(find_xml_value($item_xml,'slider-type')){
		
			case 'Nivo Slider': 
				print_nivo_slider(find_xml_node($item_xml,'slider-item'), $xml_size); 
				break;
			
			case 'Flex Slider': 
				print_flex_slider(find_xml_node($item_xml,'slider-item'), $xml_size); 
				break;
		}
		
		if( find_xml_value($item_xml, 'size') == 'full-width' ){
		
		}else{
		      echo "</div>";
		}
		
	}
	
	/////////// Print Content Item //////////
	
	function print_content_item($item_xml){
		wp_reset_query();
		
		if(have_posts()){
			while(have_posts()){
				the_post(); 
				the_content();
			}
		}
	}
	
	/////////// Print Accordions ////////// 
	
	function print_accordion_item($item_xml){
	
		$tab_xml = find_xml_node($item_xml, 'tab-item');

		$header = find_xml_value($item_xml, 'header');
		if(!empty($header)){
			echo '<h3 class="accordion-header-title title-color cp-title">' . $header . '</h3>';
		}
		
		echo "<ul class='cp-accordion'>";
		
		foreach($tab_xml->childNodes as $accordion){
		
			echo "<li class='cp-divider'>";
			echo "<h2 class='accordion-head title-color cp-title'>";
			echo "<span class='accordion-head-image'></span>";
			echo find_xml_value($accordion, 'title') . "</h2>";
			echo "<div class='accordion-content' >";
			echo do_shortcode(html_entity_decode(find_xml_value($accordion, 'caption'))) . '</div>';
			echo "</li>";
			
		}
		
		echo "</ul>";
	
	}
	
	/////////// Print Item Devider //////////
	
	function print_divider($item_xml){
		
		echo '<div class="divider"><div class="scroll-top">';
		echo find_xml_value($item_xml, 'text');
		echo '</div></div>';
		
	}
	
	/////////// Print Message Box //////////
	
	function print_message_box($item_xml){
		$box_color = find_xml_value($item_xml, 'color');
		$box_title = find_xml_value($item_xml, 'title');
		$box_content = html_entity_decode(find_xml_value($item_xml, 'content'));
		echo '<div class="message-box-wrapper ' . $box_color . '">';
		echo '<div class="message-box-title">' . $box_title . '</div>';
		echo '<div class="message-box-content">' . $box_content . '</div>';
		echo '</div>';
	}
	
	/////////// Print Toggles //////////
	
	function print_toggle_box_item($item_xml){
		$tab_xml = find_xml_node($item_xml, 'tab-item');
		$header = find_xml_value($item_xml, 'header');
		if(!empty($header)){
			echo '<h3 class="toggle-box-header-title title-color cp-title">' . $header . '</h3>';
		}
		echo "<ul class='cp-toggle-box'>";
		foreach($tab_xml->childNodes as $toggle_box){
			$active = find_xml_value($toggle_box, 'active');
			echo "<li class='cp-divider'>";
			echo "<h2 class='toggle-box-head title-color cp-title'>";
			echo "<span class='toggle-box-head-image";
			echo ($active == 'Yes')? ' active':'';
			echo "' ></span>" . find_xml_value($toggle_box, 'title') . '</h2>';
			echo "<div class='toggle-box-content"; 
			echo ($active == 'Yes')? ' active': '';
			echo "' id='toggle-box-content' >";
			echo do_shortcode(html_entity_decode(find_xml_value($toggle_box, 'caption'))) . '</div>';
			echo "</li>";
		
		}
		echo "</ul>";
	}

	/////////// Print Tabs //////////
	
	function print_tab_item($item_xml){
	
		$tab_xml = find_xml_node($item_xml, 'tab-item');
		$tab_widget_title =  html_entity_decode(find_xml_value($item_xml,'tab-widget'));
		$num = 0;
		$tab_title = array();
		$tab_content = array();
		$tab_title[$num] = find_xml_value($item_xml, 'title');
		if( !empty($tab_widget_title) ){
		echo '<h3 class="tab-widget-title title-color cp-title">';
		echo  $tab_widget_title;
		echo '</h3>';
		}
		foreach($tab_xml->childNodes as $toggle_box){
			$tab_title[$num] = find_xml_value($toggle_box, 'title');
			$tab_content[$num] = html_entity_decode(find_xml_value($toggle_box, 'caption'));
			$num++;
		}
		
		echo "<ul class='tabs cp-divider'>";
		for($i=0; $i<$num; $i++){
			echo '<li><a data-href="' . str_replace(' ', '-', $tab_title[$i]) . '" class=" cp-divider ';
			echo ( $i == 0 )? 'active':'';
			echo '" >' . $tab_title[$i] . '</a></li>';
		}
		echo "</ul>";
		echo "<ul class='tabs-content'>";
		for($i=0; $i<$num; $i++){
			echo '<li data-href="' . str_replace(' ', '-', $tab_title[$i]) . '" class="';
			echo ( $i == 0 )? 'active':'';  
			echo '" >' . do_shortcode($tab_content[$i]) . '</li>';
		}
		echo "</ul>";	
	}
	
	/////////// Print Price Items //////////
	
	function print_price_item($item_xml){

		$price_item_number = find_xml_value($item_xml, 'item-number');
		$price_item_category = find_xml_value($item_xml, 'category');
		$price_item_category = ($price_item_category == 'All')? '': $price_item_category;
		$price_posts = get_posts(array('post_type'=>'price_table', 'price-table-category'=>$price_item_category, 
			'numberposts'=>$price_item_number));
		foreach($price_posts as $price_post){
			$best_price = get_post_meta( $price_post->ID, 'price-table-best-price', true );
			$best_price = ($best_price == 'Yes')? 'active': '';
			echo '<div class="cp-price-item span3">';
			echo '<div class="percent-column1-' . $price_item_number . ' cp-divider">';
			echo '<div class="price-item ' . $best_price . '">';
			echo '<div class="price-tag">' . sprintf(__('%s','crunchpress'), get_post_meta( $price_post->ID, 'price-table-price-tag', true ) ) . '</div>';

			echo '<div class="price-title">' . $price_post->post_title . '</div>';
			
			echo '<div class="price-content">';
			echo do_shortcode( $price_post->post_content );
			echo '</div>';
			
			$price_url = sprintf(__('%s','crunchpress'), get_post_meta( $price_post->ID, 'price-table-option-url', true ) ) ;
			if( !empty($price_url) ){
				echo '<div class="price-button">';
				echo '<a class="cp-button" href="' . $price_url . '">' . __('Read More','cp_front_end') . '</a>';
				echo '</div>';
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	}
	
	/////////// Print Services Column //////////
	
	function print_column_service($item_xml){
		$column_service_img_id = find_xml_value($item_xml, 'image');
		$column_service_image = wp_get_attachment_image_src($column_service_img_id, 'full');
		$column_service_title = find_xml_value($item_xml, 'title');
		$column_service_link = find_xml_value($item_xml, 'morelink');
		$service_widget_style = find_xml_value($item_xml, 'service-widget-style');
		$column_service_caption = html_entity_decode(find_xml_value($item_xml, 'caption'));
		$alt_text = get_post_meta($column_service_img_id , '_wp_attachment_image_alt', true);
		if($service_widget_style == 'Style-1'){
		echo '<div class="column-service-content style-1">';
		echo '<h3 class="column-service-title cp-title">' . $column_service_title . '</h3>';
		if(!empty($column_service_image)){
			echo "<img src='" . $column_service_image[0] . "' alt='" . $alt_text ."' class='column-service-image'/>";
		}
		echo '<p>'.do_shortcode($column_service_caption).'';
		echo '</p>';
		if(!empty($column_service_link)){echo'<a class="txt-btn" href="'.$column_service_link.'">More+</a>';}
		echo '</div>';
		}else{
			echo '<div class="column-service-content style-2">';
		if(!empty($column_service_image)){
			echo "<img src='" . $column_service_image[0] . "' alt='" . $alt_text ."' class='column-service-image'/>";
		}
		echo '<h3 class="column-service-title cp-title">' . $column_service_title . '</h3>';
		echo '<p>'.do_shortcode($column_service_caption).'';
		echo '</p>';
		if(!empty($column_service_link)){echo'<a class="cp-button" href="'.$column_service_link.'">View More...</a>';}
		echo '</div>';
	
	    }
	}

	/////////// Print Contact From //////////
	
	function print_contact_form($item_xml){
		global $post;
		$cp_name_string = get_option(THEME_SHORT_NAME.'_translator_name_contact_form', 'Name');
		$cp_name_error_string = get_option(THEME_SHORT_NAME.'_translator_name_error_contact_form', 'Please enter your name');
		$cp_email_string = get_option(THEME_SHORT_NAME.'_translator_email_contact_form', 'Email');
		$cp_email_error_string = get_option(THEME_SHORT_NAME.'_translator_email_error_contact_form', 'Please enter a valid email address');
		$cp_message_string = get_option(THEME_SHORT_NAME.'_translator_message_contact_form', 'Message');
		$cp_message_error_string = get_option(THEME_SHORT_NAME.'_translator_message_error_contact_form', 'Please enter message');
		?>

		<div class="contact-form-wrapper" id="cp-contact-form">
		<form id="cp-contact-form">
		<ol class="forms">
		<li><strong><?php echo $cp_name_string; ?> *</strong>
		<input type="text" name="name" class="require-field name" />
		<div class="error">* <?php echo $cp_name_error_string; ?></div>
		</li>
		<li><strong><?php echo $cp_email_string; ?> *</strong>
		<input type="text" name="email" class="require-field email" />
		<div class="error">* <?php echo $cp_email_error_string; ?></div>
		</li>
		<li class="textarea"><strong><?php echo $cp_message_string; ?> *</strong>
		<textarea name="message" class="require-field"></textarea>
		<div class="error">* <?php echo $cp_message_error_string; ?></div>
		</li>
		<li><input type="hidden" name="receiver" value="<?php echo find_xml_value($item_xml, 'email'); ?>"></li>
		<li class="sending-result" id="sending-result" ><div class="message-box-wrapper green"></div></li>
		<li class="buttons">
		<button type="submit" class="contact-submit button"><?php echo get_option(THEME_SHORT_NAME.'_translator_submit_contact_form','Submit'); ?></button>
		<div class="contact-loading" id="contact-loading"></div>
		</li>
		</ol>
		</form>
		<div class="clear"></div>
		</div>
		<?php
		}
	
	/////////// Print Text Widget //////////
	
	function print_text_widget($item_xml){
		
		$title = find_xml_value($item_xml, 'title');
		$caption = html_entity_decode(find_xml_value($item_xml, 'caption'));
		$button_title =  find_xml_value($item_xml, 'button-title');
		echo '<h2>' . $title . '</h2>';
		echo '<P>' . do_shortcode($caption) . '</p>';
	}
	
	/////////// Print Featured Author //////////
	
	function print_product_featured_author($item_xml){
		$image = find_xml_value($item_xml, 'image');
		$heading = find_xml_value($item_xml, 'heading');
		$name = find_xml_value($item_xml, 'name');
		$item_size ='140x140';
		$thumbnail = wp_get_attachment_image_src( $image , $item_size );
		$linkdin = find_xml_value($item_xml, 'linkdin');
		$twitter = find_xml_value($item_xml, 'twitter');
		$facebook = find_xml_value($item_xml, 'facebook');
				
		$listbook_1_img = find_xml_value($item_xml, 'listbook1_img');
		$listbook_1_url = find_xml_value($item_xml, 'listbook1_url');
		
		$listbook_2_img = find_xml_value($item_xml, 'listbook2_img');
		$listbook_2_url = find_xml_value($item_xml, 'listbook2_url');
		
		$listbook_3_img = find_xml_value($item_xml, 'listbook3_img');
		$listbook_3_url = find_xml_value($item_xml, 'listbook3_url');
		
		$listbook_4_img = find_xml_value($item_xml, 'listbook4_img');
		$listbook_4_url = find_xml_value($item_xml, 'listbook4_url');
		 
		$specific = find_xml_value($item_xml, 'featured-book');

		$item_size = '59x89';
		echo '<div class="Featured-Author">';
		  echo '<div class="left">';
		  if (!empty ($thumbnail)) { echo '<span class="author-img-holder"><img src="' . $thumbnail[0] .'" alt="author"/></span>'; };
			echo '<div class="author-det-box">';
			  echo '<div class="ico-holder">';
				echo '<div id="socialicons" class="hidden-phone">';
				
				if (!empty ($linkdin)) { echo '<a id="social_linkedin" class="social_active" href="'.$linkdin.'" title="Linked In"><span></span></a>'; }
				if (!empty ($facebook)) { echo '<a id="social_facebook" class="social_active" href="'.$facebook.'" title="Visit Facebook page"><span></span></a>'; }
				if (!empty ($twitter)) { echo '<a id="social_twitter" class="social_active" href="'.$twitter.'" title="Visit Twitter page"><span></span></a>'; }
				
			  echo '</div>';
			  echo '</div>';
			  echo '<div class="author-det"> <span class="title">'.$heading.'</span> <span class="title2">'.$name.'</span>';
				echo '<ul class="books-list">';
        				$thumbnail = wp_get_attachment_image_src( $listbook_1_img , $item_size );
						if (!empty ($thumbnail)) {
						echo '<li>';
						echo '<a href="' . $listbook_1_url . '" title="book">';
						echo '<img src="' . $thumbnail[0] .'" alt="thumb"/>';
						echo '</a>';
						echo '</li>';
						}
						$thumbnail = wp_get_attachment_image_src( $listbook_2_img , $item_size );
						if (!empty ($thumbnail)) {
						echo '<li>';
						echo '<a href="' . $listbook_2_url . '" title="book">';
						echo '<img src="' . $thumbnail[0] .'" alt="thumb"/>';
						echo '</a>';
						echo '</li>';
						}
						$thumbnail = wp_get_attachment_image_src( $listbook_3_img , $item_size );
						if (!empty ($thumbnail)) {
						echo '<li>';
						echo '<a href="' . $listbook_3_url . '" title="book">';
						echo '<img src="' . $thumbnail[0] .'" alt="thumb"/>';
						echo '</a>';
						echo '</li>';
						}
			    		$thumbnail = wp_get_attachment_image_src( $listbook_4_img , $item_size );
						if (!empty ($thumbnail)) {
						echo '<li>';
						echo '<a href="' . $listbook_4_url . '" title="book">';
						echo '<img src="' . $thumbnail[0] .'" alt="thumb"/>';
						echo '</a>';
						echo '</li>';
						}
				echo '</ul>';
			echo '  </div>';
			echo '</div>';
		echo '  </div>';
		echo '  <div class="right featured-author-book">';
		
		 $item_size= "110x170";
			query_posts(array('post_type' => 'product', 'name'=>$specific, 'numberposts'=> 1));
			while( have_posts() ){
								the_post();				
									
				
				 $image_type = empty($image_type)? "Link to Current Post": $image_type; 
				 $thumbnail_id = get_post_thumbnail_id();
				
				 $thumbnail2 = wp_get_attachment_image_src( $thumbnail_id , $item_size );
				 $alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
				 $product_title = get_the_title();
				 $title_length = get_option(THEME_NAME_S.'_products_page_title_length');					 
				 $short_title = substr($product_title,0,$title_length);
				 $num_excerpt = '5';
		        
		}
		echo '<div class="c-b-img">';
		if (!empty ($thumbnail2)) {
		echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
				echo '<img src="' . $thumbnail2[0] .'" alt="featured book"/>';
				echo '</a>';
		} else {
		 echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
				$item_size_arr= explode('x',$item_size); $item_size_new_h=$item_size_arr[1]; $item_size_new_w=$item_size_arr[0];
				echo '<img style="width:'. $item_size_new_w .'px; height:'. $item_size_new_h .'px;" " src="' .CP_PATH_URL.'/images/no-image.jpg" alt="no image"/>';
		 echo '</a>'; 
		}echo '</div>';
		echo '<div class="current-book"> <strong class="title"><a href="' . get_permalink() . '">' . $product_title. '</a></strong>';
		echo '<p>'. substr(get_the_excerpt(), 0,100). '</p>';
		echo '<div class="cart-btn2">';
				   do_action( 'woocommerce_after_shop_loop_item' );
				  echo '</div>';
				  echo '<div class="cart-price"> <span class="price">' . do_action( 'woocommerce_after_shop_loop_item_title' ).'</span> </div>';
		echo '	</div>';
		echo '  </div>';
		echo '</div>';

		}
	
	/////////// Print Testimonials //////////
	
	function print_testimonial($item_xml){
		
		$display_type = find_xml_value($item_xml, 'display-type');
		$header = find_xml_value($item_xml, 'header');
		if($display_type == 'Specific Testimonial'){
			echo '<div class="tastimonialcon">';
			if(!empty($header)){
				echo '<h3 class="testimonial-header-title title-color cp-title">' . $header . '</h3>';
			}
			$item_size = find_xml_value($item_xml, 'item-size');
			$header = find_xml_value($item_xml, 'header');
			$specific = find_xml_value($item_xml, 'specific');
			$posts = get_posts(array('post_type' => 'testimonial', 'name'=>$specific, 'numberposts'=> 1));
			global $cp_div_size_num_class;
			echo '<div class="' . $cp_div_size_num_class[$item_size] . '">';
			echo '<div class="testimonial-content">';
			echo '<div class="testimonial-icon"></div>';
			$testicontent = $posts[0]->post_content;
			echo substr($testicontent,0,'30');
			echo '</div>';
			$position = printf(__('%s','crunchpress'), get_post_meta( $price_post->ID, 'testimonial-option-author-position', true ) );
			echo '<div class="testimonial-author cp-divider">';
			echo '<span class="testimonial-author-name">' . $posts[0]->post_title . '</span>';
			if( !empty( $position ) ){
				echo '<span class="testimonial-author-position">, '; 
				echo $position;
				echo '</span>';
			}
			echo '</div>';
			echo '</div>'; // columns (cp-div-size-num-class)
			echo '</div>';

		}else{
		
			global $cp_div_size_num_class, $item_size;
			
			echo $cp_div_size_num_class[$item_size];
			
			$item_size = find_xml_value($item_xml, 'item-size');
			$category = find_xml_value($item_xml, 'category');
			$category = ( $category == 'All' )? '': $category;
			$category_posts = get_posts(array('post_type'=>'testimonial', 'testimonial-category'=>$category, 'numberposts'=>100));
			
			echo '<div class="heading-bar">';
			if(!empty($header)){
				echo '<h2>' . $header . '</h2>';
			}else{
				echo '<h2>Testimonials</h2>';
			}
			echo '
					  
			 <span class="h-line"></span> </div>
			 <div class="slider4">';
			foreach( $category_posts as $category_post){ 
			  $item_size = '75x75';
			  $thumbnail_id = get_post_thumbnail_id( $category_post->ID );
			  $thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size );
			  $alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
			  global $ID;
			?>
			
		  <div class="slide">
			   <?php echo '<a href="'.post_permalink( $ID ).'">'; ?>
				<div class="author-name-holder"> <?php if (!empty ($thumbnail[0])) { echo '<img  src="'. $thumbnail[0] .'" alt="'. $alt_text .'"/>';  } ?> </div></a>
					<strong class="title"><?php echo '<a href="'.post_permalink( $ID ).'">' .$category_post->post_title .'</a>'?><span>
					<?php  printf(__('%s','crunchpress'), get_post_meta( $category_post->ID, 'testimonial-option-author-position', true ) );?></span></strong>
					<div class="slide">
				  <p><?php  $testicontent =  $category_post->post_content;
			      echo substr($testicontent,0,'100'); ?></p>
				</div>
		   </div>
								
				   <?php 
				}
			  echo '</div>';
			}
		}



	


	// Print nested page
	function print_page_item($item_xml){
		
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
		
		// get the item class and size from array
		$item_class = $port_div_size_num_class[$port_size]['class'];
		if( $sidebar == "no-sidebar" ){
			$item_size = $port_div_size_num_class[$port_size]['size'];
		}else if ( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
			$item_size = $port_div_size_num_class[$port_size]['size2'];
		}else{
			$item_size = $port_div_size_num_class[$port_size]['size3'];
		}

		// get the page meta value
		$header = find_xml_value($item_xml, 'header');
		$num_fetch = find_xml_value($item_xml, 'num-fetch');
		$num_excerpt = find_xml_value($item_xml, 'num-excerpt');	

		// page header
		if(!empty($header)){
			echo '<h3 class="portfolio-header-title title-color cp-title">' . $header . '</h3>';
		}
		global $post;
		$post_temp = query_posts(array('post_type'=>'page', 'paged'=>$paged, 'post_parent'=>$post->ID, 'posts_per_page'=>$num_fetch ));
		// get the portfolio size
		$port_wrapper_size = $class_to_num[find_xml_value($item_xml, 'size')];
		$port_current_size = 0;
		$port_size =  $class_to_num[$port_size];
		
		$port_num_have_bottom = sizeof($post_temp) % (int)($port_wrapper_size/$port_size);
		$port_num_have_bottom = ( $port_num_have_bottom == 0 )? (int)($port_wrapper_size/$port_size): $port_num_have_bottom;
		$port_num_have_bottom = sizeof($post_temp) - $port_num_have_bottom;
		
		echo '<section id="portfolio-item-holder" class="portfolio-item-holder">';
		while( have_posts() ){
			the_post();
			// start printing data
			echo '<figure class="' . $item_class . ' mt0 pt25 portfolio-item">'; 
			$image_type = get_post_meta( $post->ID, 'post-option-featured-image-type', true);
			$image_type = empty($image_type)? "Link to Current Post": $image_type; 
			$thumbnail_id = get_post_thumbnail_id();
			$thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size );
			$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
			
			$hover_thumb = "hover-link";
			$pretty_photo = "";
			$permalink = get_permalink();
			

			if( !empty($thumbnail[0]) ){
				echo '<div class="portfolio-thumbnail-image">';
				echo '<div class="overflow-hidden">';
				echo '<a href="' . $permalink . '" ' . $pretty_photo . ' title="' . get_the_title() . '">';
				echo '<span class="portfolio-thumbnail-image-hover">';
				echo '<span class="' . $hover_thumb . '"></span>';
				echo '</span>';
				echo '</a>';
				echo '<img src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/>';
				echo '</div>'; //overflow hidden
				echo '</div>'; //portfolio thumbnail image						
			}
			
			
			echo '<div class="portfolio-thumbnail-context">';
			// page title
			if( find_xml_value($item_xml, "show-title") == "Yes" ){
				echo '<h2 class="portfolio-thumbnail-title port-title-color cp-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
			}
			// page excerpt
			if( find_xml_value($item_xml, "show-excerpt") == "Yes" ){			
				echo '<div class="portfolio-thumbnail-content">' . mb_substr( get_the_excerpt(), 0, $num_excerpt ) . '</div>';
			}
			// read more button
			if( find_xml_value($item_xml, "read-more") == "Yes" ){
				echo '<a href="' . get_permalink() . '" class="portfolio-read-more cp-button">' . __('Read More','cp_front_end') . '</a>';
			}
			echo '</div>';
			// print space if not last line
			if($port_current_size < $port_num_have_bottom){
				echo '<div class="portfolio-bottom"></div>';
				$port_current_size++;
			}
			echo '</figure>';

		}

		echo "</section>";
		echo '<div class="clear"></div>';
		if( find_xml_value($item_xml, "pagination") == "Yes" ){	
			pagination();
		}		
		
	}
	
