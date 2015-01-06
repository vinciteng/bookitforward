<?php 
	/*

	 * This file is used to generate footer section of theme.

	 */	
?>
		<?php 
          $cp_show_footer = get_option(THEME_NAME_S.'_show_footer','enable');
		  $cp_top_footer = get_option(THEME_NAME_S.'_top_footer','enable');
		  $cp_social_footer = get_option(THEME_NAME_S.'_top_footer','enable');
          $cp_show_copyright = get_option(THEME_NAME_S.'_show_copyright','enable');
          $footer_text = do_shortcode( __(get_option(THEME_NAME_S.'_copyright_left_area'), 'cp_front_end') );
         ?>
      </div>
       <footer> 
        <?php if( $cp_show_footer == 'enable' ){
			
			  if( $cp_top_footer == 'enable' ){
			 ?>  
		 
                <!-- Start Footer Top 1 -->
              <section class="container-fluid footer-top1">
                <section class="container">
                  <section class="row-fluid">
                    <article class="span3">
                    <?php dynamic_sidebar( 'Footer Top 1' );  ?>
                    </article>
                    <article class="span3">
                    <?php dynamic_sidebar( 'Footer Top 2' );  ?>
                    </article>
                    <article class="span3">
                    <?php dynamic_sidebar( 'Footer Top 3' );  ?>
                    </article>
                    <article class="span3">
                    <?php dynamic_sidebar( 'Footer Top 4' );  ?>
                    </article>
                  </section>
                </section>
              </section>
              
              <?php } ?>
              <!-- End Footer Top 1 -->
            
              <!-- Start Footer Top 2 -->
              <section class="container-fluid footer-top2">
               <?php  if( $cp_social_footer == 'enable' ){ ?>
               <script type="text/javascript">
                							  /* <![CDATA[ */
											  jQuery(document).ready(function() {
											  jQuery('.social_active').hoverdir( {} );
											})
											/* ]]> */
        		       				   </script> 
                <section class="social-ico-bar">
                  <section class="container">
                    <section class="row-fluid">
                    <?php $cp_show_social_icons = get_option(THEME_NAME_S.'show_social_icons','disable');  if( $cp_show_social_icons == 'enable' ){ echo  '<div id="socialicons" class="hidden-phone">'; social_media_footer(); echo '</div>'; } ?>
                      <div class="footer2-link">
                      <?php wp_nav_menu( array( 'theme_location' => 'footer_menu' ) );  ?>
                      </div>
                    </section>
                  </section>
                </section>
              <?php } ?>
              
                <section class="container">
                  <section class="row-fluid footer">
                  
                     <?php
									$cp_footer_class = array(
									'footer-style1'=>array('1'=>'span3', '2'=>'span3', '3'=>'span3', '4'=>'span3'),
									'footer-style4'=>array('1'=>'span4', '2'=>'span4', '3'=>'span4', '4'=>'display-none'),
									);

                                                $cp_footer_style = get_option(THEME_NAME_S.'_footer_style', 'footer-style7');
                                                for( $i=1 ; $i<=4; $i++ ){
                                                    echo '<figure class="' . $cp_footer_class[$cp_footer_style][$i] . ' ">';
                                                    dynamic_sidebar('Footer '. $i);
                                                    echo '</figure>';
                                                ?>
                                              
                                        

                                <?php } ?>
                    
                   
                  </section>
                </section>
              </section>
           <?php } ?>
              <!-- End Footer Top 2 -->
              <!-- Start Main Footer -->
           
                <section class="social-ico-bar">
                  <section class="container">
                    <section class="row-fluid">
                      <article class="span6 copy-left">
                        <?php if ($footer_text != '' ){
                                echo sprintf(__('%s','crunchpress'), $footer_text);
                                }else {
                                echo __('<p>Copyright &copy; 2012.','crunchpress'). __('Share by  <a href="http://buzztheme.net">BuzzTheme</a></p>','crunchpress');
                                }
                                ?>
                      </article>
                      <article class="span6 copy-right">
                        <p></p>
                      </article>
                    </section>
                  </section>
                </section>
             
              <!-- End Main Footer -->
          
           </footer>
           
  
 									 <script type="text/javascript">
                                       <?php get_template_part( 'cufon', 'replace' ); ?>
								    </script> 
  <?php wp_footer(); ?>
</body>
</html>       
           
    