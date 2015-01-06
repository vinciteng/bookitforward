<?php
/*
 * This file is used to generate WordPress standard archive/category pages.
 */
get_header ();
?>
								<?php
                                $sidebar = get_option ( THEME_NAME_S . '_search_archive_sidebar', 'no-sidebar' );
                                $left_sidebar = "Search/Archive Left Sidebar";
                                $right_sidebar = "Search/Archive Right Sidebar";
                                 get_option( 'date_format' );
								       
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
							
							  $bcontainer_class = '';
							   echo '<section id="content-holder" class="container-fluid">';
							    echo '<section class="container">';
		    					   echo '<div class="row-fluid '.$sidebar_class.'">';
		       	 					  echo "<div class='".$bcontainer_class." cp-page-float-left'>";
		     								echo "<div class='".$container_class. " page-item'>";
						
						
								$item_type = get_option ( THEME_NAME_S . '_search_archive_item_size', '1/1 Full Thumbnail' );
								$num_excerpt = get_option ( THEME_NAME_S . '_search_archive_num_excerpt', 200 );
								$full_content = get_option ( THEME_NAME_S . '_search_archive_full_blog_content', 'No' );
								
								global $blog_div_size_num_class;
								$item_class = $blog_div_size_num_class [$item_type] ['class'];
								$item_index = $blog_div_size_num_class [$item_type] ['index'];
								if ($sidebar == "no-sidebar") {
									$item_size = $blog_div_size_num_class [$item_type] ['size'];
								} else if ($sidebar == "left-sidebar" || $sidebar == "right-sidebar") {
									$item_size = $blog_div_size_num_class [$item_type] ['size2'];
								} else {
									$item_size = $blog_div_size_num_class [$item_type] ['size3'];
								}
								
								 ?>
                                  <div class="heading-bar">
                                        <h2>
                                        <?php if (is_category()) { ?>
                                            <?php _e('Categories', 'crunchpress'); ?> : <?php echo single_cat_title(); ?>  
                                            <?php } elseif (is_day()) { ?>
                                            <?php _e('Archive for', 'crunchpress'); ?> <?php the_time('F jS, Y'); ?>
                                            <?php } elseif (is_month()) { ?>
                                            <?php _e('Archive for', 'crunchpress'); ?> <?php the_time('F, Y'); ?>
                                            <?php } elseif (is_year()) { ?>
                                            <?php _e('Archive for', 'crunchpress'); ?> <?php the_time('Y'); ?>
                                            <?php } elseif (is_author()) { ?>
                                            <?php _e('Archive by Author', 'crunchpress'); ?></span>
                                            <?php } elseif (is_search()) { ?>
                                            <?php _e('Search results for', 'crunchpress'); ?><?php get_search_query() ?></span>
                                            <?php } elseif (is_tag()) { ?>
                                            <?php _e('Tag Archives', 'crunchpress'); ?> : <?php echo single_tag_title('', true); ?>
                                        <?php } ?>
                                        </h2>
                                      <span class="h-line"></span>
                                  </div>
                                    
                                    <?php
											echo '<div id="blog-item-holder" class="blog-item-holder">';
														if ($item_type == '1/1 Full Thumbnail') {
															print_blog_full ( $item_class, $item_size, $item_index, $num_excerpt, $full_content );
														} else if ($item_type == '1/1 Medium Thumbnail') {
															print_blog_medium ( $item_class, $item_size, $item_index, $num_excerpt );
														}
											echo '</div>'; // blog-item-holder
										
											echo '<div class="clear"></div>';
												 pagination (); // get page navigation
								    echo "</div>"; // cp-page-item
												 get_sidebar ( 'left' );
								echo "</div>"; // cp-page-float-left
							              	    get_sidebar ( 'right' );
								?>
						</div><!--content-wrapper-->
                  </section> 		
             </section>			
<?php get_footer(); ?>