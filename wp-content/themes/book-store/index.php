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
									$bcontainer_class = '';
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
							
							
							   echo '<section id="content-holder" class="container-fluid">';
							    echo '<section class="container">';
		    					   echo '<div class="row-fluid '.$sidebar_class.'">';
		       	 					  echo "<div class='".$bcontainer_class." cp-page-float-left'>";
		     								echo "<div class='".$container_class. " page-item'>";
											echo '<div class="span12 columns">';
						
						
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
                                        <?php echo __('Homepage','crunchpress') ?>
                                        </h2>
                                      <span class="h-line"></span>
                                  </div>
                                    
                                    <?php
											echo '<div id="blog-item-holder" class="blog-item-holder">';
															print_blog_full ( $item_class, $item_size, $item_index, $num_excerpt, $full_content );
											echo '</div>'; // blog-item-holder
										
											echo '<div class="clear"></div>';
												 pagination (); // get page navigation
								    echo "</div>"; // cp-page-item
									echo '</div>';
												 get_sidebar ( 'left' );
								echo "</div>"; // cp-page-float-left
							              	    get_sidebar ( 'right' );
								?>
						</div><!--content-wrapper-->
                   		
             </section>	
           </section>			
<?php get_footer(); ?>