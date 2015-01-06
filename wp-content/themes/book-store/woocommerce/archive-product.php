<?php 
	/*
	 * This file is used to generate WordPress standard archive/category pages.
	  * @author     CrunchPress
      * @package 	WooCommerce/Templates
      * @version     2.0.0
 */	

get_header(); ?>
<?php
	    global $paged, $sidebar, $left_sidebar, $right_sidebar;
		$left_sidebar = "Shop Left Sidebar";
		$right_sidebar = "Shop Right Sidebar";
			
		$sidebar = get_option ( THEME_NAME_S . '_products_page_sidebar', 'no-sidebar' );
        $sidebar = str_replace('product-', '', $sidebar) ; 
		    $bcontainer_class = '';
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
		}
		
	?>
            
		
  <?php
							
			echo '<section id="content-holder" class="container-fluid product-archive">';
			 echo '<section class="container">';
		       echo '<div class="row-fluid '.$sidebar_class.'">';
		       	   echo "<div class='".$bcontainer_class." cp-page-float-left'>";
		     			echo "<div class='".$container_class. " page-item columns'> ";
                          echo '<section class="span12 columns page-heading-wrapper">';
						   ?>
                            <div class="heading-bar">
        	                         <h2>
          
		                            <?php if ( is_search() ) : printf( __( 'Search Results: &ldquo;%s&rdquo;', 'woocommerce' ), get_search_query() );
                                          if ( get_query_var( 'paged' ) ) printf( __( '&nbsp;&ndash; Page %s', 'woocommerce' ), get_query_var( 'paged' ) );
                                        ?>
                                    <?php elseif ( is_tax() ) : 
                                          echo single_term_title( "", false ); 
                                          else :
                                          $shop_page = get_post( woocommerce_get_page_id( 'shop' ) );
                                          echo apply_filters( 'the_title', ( $shop_page_title = get_option( 'woocommerce_shop_page_title' ) ) ? $shop_page_title : $shop_page->post_title );
                                          endif; 
                                     ?>
                                     </h2>
                                   
                                     <div class="product-shorting">
                                     <?php
									  do_action('woocommerce_before_shop_loop'); 
									  ?>
                                      </div>
                                     <span class="h-line"></span>
                                     </div>
                                     
                                 </section>
                                <?php do_action( 'woocommerce_archive_description' ); ?>
                        
                                <?php if ( is_tax() ) : ?>
                                    <?php do_action( 'woocommerce_taxonomy_archive_description' ); ?>
                                <?php elseif ( ! empty( $shop_page ) && is_object( $shop_page ) ) : ?>
                                    <?php do_action( 'woocommerce_product_archive_description', $shop_page ); ?>
                                <?php endif; ?>

                    		<?php 
						// start fetching database
						global $post, $wp_query;
							
						$port_size ="element1-4" ;
					
							
						$num_fetch = get_option(THEME_NAME_S.'_products_page_item');
						$item_size = get_option(THEME_NAME_S.'_products_page_thumb_size', '250x250');		
						$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
					   	echo ' <section class="grid-holder features-books">';
							
						
						
						if( $sidebar == "product-no-sidebar"){
						/*woocommerce_catalog_ordering();*/
						}
								
							// get the category for filter
							$item_categories = get_the_terms( $post->ID, 'product_cat' );
							$category_slug = " ";
							if( !empty($item_categories) ){
								foreach( $item_categories as $item_category ){
									$category_slug = $category_slug . $item_category->slug . ' ';
								}
							}
							
							$counter_product = 0;
							while( have_posts() ){
							global $post;
							the_post();	
							
							if($counter_product % 4 == 0 ){
								
								echo '<div class="span3 slide columns">';
							 
								 $thumbnail_types = "Image";
								 
												if( $thumbnail_types == "Image" ){
													
													$image_type = "Lightbox to Current Thumbnail";
													$image_type = empty($image_type)? "Link to Current Post": $image_type; 
													$thumbnail_id = get_post_thumbnail_id();
													$thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size );
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
												
												echo '<div class="product-thumb">';
												$item_size_arr= explode('x',$item_size); $item_size_new_h=$item_size_arr[1]; $item_size_new_w=$item_size_arr[0];
												if (! empty($thumbnail)) {
															 echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
															 echo '<img style="width:'.$item_size_new_w.'px; height:'.$item_size_new_h.'px; " src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/>';
															 echo '</a>';
															}else {
															 echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
																	$item_size_arr= explode('x',$item_size); $item_size_new_h=$item_size_arr[1]; $item_size_new_w=$item_size_arr[0];
																	  echo '<img style="width:'.$item_size_new_w.'px; height:'.$item_size_new_h.'px; " width="'. $item_size_new_w .'px"  height="'. $item_size_new_h .'px" " src="' .CP_PATH_URL.'/images/no-image.jpg" alt="no image"/>';
															 echo '</a>'; 
												 }
												echo '</div>';
												echo '<div class="clearfix"></div>';
												echo '<div class="title-holder title"><a href="' . get_permalink() . '">' . $short_title. '</a></div>';
												echo '<div class="product-meta">';
												echo '<div class="cart-btn2">';
												do_action( 'woocommerce_after_shop_loop_item' );
												echo '<span class="price">'.do_action( 'woocommerce_after_shop_loop_item_title' ).'</span>';
												echo '</div>';
												echo '</div>';
												
								echo '</div>';
					
							}else{
								
								echo '<div class="span3 slide columns">';
							 
								 $thumbnail_types = "Image";
												if( $thumbnail_types == "Image" ){
													
													$image_type = "Lightbox to Current Thumbnail";
													$image_type = empty($image_type)? "Link to Current Post": $image_type; 
													$thumbnail_id = get_post_thumbnail_id();
													$thumbnail = wp_get_attachment_image_src( $thumbnail_id , $item_size );
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
												echo '<div class="product-thumb">';
												$item_size_arr= explode('x',$item_size); $item_size_new_h=$item_size_arr[1]; $item_size_new_w=$item_size_arr[0];
												if (! empty($thumbnail)) {
															 echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
															 echo '<img style="width:'.$item_size_new_w.'px; height:'.$item_size_new_h.'px; " src="' . $thumbnail[0] .'" alt="'. $alt_text .'"/>';
															 echo '</a>';
															}else {
															 echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
																	  echo '<img style="width:'.$item_size_new_w.'px; height:'.$item_size_new_h.'px; " width="'. $item_size_new_w .'px"  height="'. $item_size_new_h .'px" " src="' .CP_PATH_URL.'/images/no-image.jpg" alt="no image"/>';
															 echo '</a>'; 
												 }
												echo '</div>';
												echo '<div class="clearfix"></div>';
												echo '<div class="title-holder title"><a href="' . get_permalink() . '">' . $short_title. '</a></div>';
												echo '<div class="product-meta">';
												echo '<div class="cart-btn2">';
												do_action( 'woocommerce_after_shop_loop_item' );
												echo '<span class="price">'.do_action( 'woocommerce_after_shop_loop_item_title' ).'</span>';
												echo '</div>';
												echo '</div>';
												
								echo '</div>';
							 
							 }
							 if($counter_product % 4 == 0 ){'<div class="clear"></div>';}
							$counter_product++;
					    	}
						    echo '</section>';
							echo '<div class="clear"></div>';
						    $product_nav = get_option(THEME_NAME_S.'_products_navi','Yes');
						    if ('Yes' == $product_nav ){
							   	   
									pagination();
							}
							?>
						    <?php /*do_action('woocommerce_after_shop_loop');*/ ?>
						    
							
							<?php	
							echo "</div>"; // end of cp-page-item
		            	    get_sidebar ( 'left' );
							echo "</div>"; // cp-page-float-left
		                	get_sidebar ( 'right' );
		 	
			?>
        
    
   			 </div>
             
       </section>
       </section>
<!--content-separator-->
<?php get_footer(); ?>
