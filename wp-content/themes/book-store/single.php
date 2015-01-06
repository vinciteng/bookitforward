<?php 
	/*
	 * This file is used to generate single post page.
	 */	
get_header(); ?>
<?php
		// Sidebar check and class
		$sidebar = get_post_meta($post->ID,'post-option-sidebar-template',true);
		global $default_post_sidebar;
		if( empty( $sidebar ) ){ $sidebar = $default_post_sidebar; }
		  if ($sidebar == "left-sidebar" || $sidebar == "right-sidebar") {
            $sidebar_class = "sidebar-included " . $sidebar;
			$container_class = "span9";
        } else if ($sidebar == "both-sidebar") {
            $sidebar_class = "both-sidebar-included";
			 $bcontainer_class ="span9";
			 $container_class = "span8";
        } else {
		    $container_class = "span12";	
		}

	?>

	
      <section id="content-holder" class="container-fluid">
       <section class="container">

		       <div class="row-fluid <?php echo $sidebar_class; ?>">	 
					  <?php
							$left_sidebar = get_post_meta( $post->ID , "post-option-choose-left-sidebar", true);
							$right_sidebar = get_post_meta( $post->ID , "post-option-choose-right-sidebar", true);
							global $default_post_left_sidebar, $default_post_right_sidebar;
							if( empty( $left_sidebar )){ $left_sidebar = $default_post_left_sidebar; } 
							if( empty( $right_sidebar )){ $right_sidebar = $default_post_right_sidebar; } 
							
					    global $bcontainer_class;
						echo "<div class='".$bcontainer_class." cp-page-float-left'>";
			
		     			         echo "<div class='".$container_class. " page-item'>";
						         
								        if ( have_posts() ){ while (have_posts()){ the_post();

											 echo '<article class="b-post">';
											 
											   echo '<div class="b-post-img">';
												// Inside Thumbnail
												if( $sidebar == "left-sidebar" || $sidebar == "right-sidebar" ){
													$item_size = "850x250";
												}else if( $sidebar == "both-sidebar" ){
													$item_size = "560x200";
												}else{
													$item_size = "1170x350";
												} 
												
												$inside_thumbnail_type = get_post_meta($post->ID, 'post-option-inside-thumbnail-types', true);
												
												switch($inside_thumbnail_type){
												
													case "Image" : 
													
														$thumbnail_id = get_post_meta($post->ID,'post-option-inside-thumbnial-image', true);
														$thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size );
														$thumbnail_full = wp_get_attachment_image_src( $thumbnail_id , 'full' );
														$alt_text = get_post_meta($thumbnail_id , '_wp_attachment_image_alt', true);
														
														if( !empty($thumbnail) ){
															echo '<div class="blog-thumbnail-image">';
																echo '<a href="' . $thumbnail_full[0] . '" data-rel="prettyPhoto" title="' . get_the_title() . '" ><img src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/></a>';
															echo '</div>';
														}
														break;
														
													case "Video" : 
													
														$video_link = get_post_meta($post->ID,'post-option-inside-thumbnail-video', true);
														echo '<div class="blog-thumbnail-video">';
															echo get_video($video_link, cp_get_width($item_size), '400');
															echo '<div class="blog-thumbnail-date">';
														echo '</div>';	
echo '</div>';			
														break;
														
													case "Slider" : 
													
														$slider_xml = get_post_meta( $post->ID, 'post-option-inside-thumbnail-xml', true); 
														$slider_xml_dom = new DOMDocument();
														$slider_xml_dom->loadXML($slider_xml);
														
														echo '<div class="blog-thumbnail-slider">';
															echo print_flex_slider($slider_xml_dom->documentElement, $item_size);
														echo '</div>';					
														break;
														
												}
												
												
			                                  	echo '</div>';
 												
			                                    echo '<h3 class="blog-thumbnail-title post-title-color cp-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
              
												echo '<div class="blog-thumbnail-content">';
												echo the_content();
												wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'cp_front_end' ) . '</span>', 'after' => '</div>' ) );
												echo '</div>';	
											
												echo '<div class="b-post-bottom">';
												echo '<ul class="post-nav">';
												echo '<li class="blog-thumbnail-author"> ' . __('Posted by','cp_front_end') . ' ' . get_the_author_link() . '</li>';	
												echo '<li>on ';
													 the_date();
													 echo '</li>';
													echo '<li>'. comments_popup_link( __('0 Comment','cp_front_end'),
														  __('1 Comment','cp_front_end'),
														  __('% Comments','cp_front_end'), '',
														  __('Comments are off','cp_front_end') );
													echo '</li>';
														the_tags('<li>', ', ', '</li>');
														echo '<li>';
														foreach((get_the_category()) as $category) {
														echo '<a href="'.get_category_link(get_cat_id($category->cat_name)).'">' . sprintf(__('%s','crunchpress'),$category->cat_name).' , </a>';
														} 
														echo '</li>';
									
												echo '</ul>';
											  echo '<a class="more-btn" href="' . get_permalink() . '">' . __('Read More','cp_front_end') . '</a>';	
											echo '</div>';
										echo '</article>';
									
										 echo '<div class="comment-wrapper">';
											comments_template(); 
										 echo '</div>';
										
									}
								}
							?>
					  </div> <!-- cp-page-item-end -->
					  
						   <?php 	
								get_sidebar('left');	
									echo "</div>  <!--cp-page-float-left-end-->";
								get_sidebar('right');
							?>
						
					</div>
	
         </section>  
     </section>  
<?php get_footer(); ?>