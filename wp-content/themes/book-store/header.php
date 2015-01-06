<!DOCTYPE HTML>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>>

<!--<![endif]-->

<head>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

            
            <!--[if gte IE 9]>
              <style type="text/css">
                .gradient {
                   filter: none;
                }
              </style>
            <![endif]-->
            <!-- Basic Page Requirements
            
  ================================================== -->

<meta charset="utf-8" />

<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>


<!-- CSS -->


<?php global $cp_is_responsive ?>
<?php if( $cp_is_responsive ){ ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php } ?>

<!--[if lt IE 9]>
	
	<![endif]-->
<!--[if IE 7]>
		
	<![endif]-->
<!-- Favicon -->


<?php 

		if(get_option( THEME_NAME_S.'_enable_favicon','disable') == "enable"){
			$cp_favicon = get_option(THEME_NAME_S.'_favicon_image');
			    if( $cp_favicon ){
				   $cp_favicon = wp_get_attachment_image_src($cp_favicon, 'full');
				echo '<link rel="shortcut icon" href="' . $cp_favicon[0] . '" type="image/x-icon" />';
			}
		 } 
		 
?>

<!-- FB Thumbnail -->

<?php

	if( is_single() ){
		$thumbnail_id = get_post_meta($post->ID,'post-option-inside-thumbnial-image', true);
		if( !empty($thumbnail_id) ){
			      $thumbnail = wp_get_attachment_image_src( $thumbnail_id , '150x150' );
			echo '<link rel="image_src" href="' . $thumbnail[0] . '" />';
		  }

	} else {
		$thumbnail_id = get_post_thumbnail_id();
	    if( !empty($thumbnail_id) ){
			      $thumbnail = wp_get_attachment_image_src( $thumbnail_id , '150x150' );
	      	echo '<link rel="image_src" href="' . $thumbnail[0] . '" />';		
		  }
	}
	
	
?>


<!-- Start WP_HEAD -->

<?php wp_head(); ?>

</head>      
         
 <body <?php echo body_class(); ?>>
<!-- Start Main Wrapper -->
<div class="wrapper">
  <!-- Start Main Header -->
  <!-- Start Top Nav Bar -->
  <section class="top-nav-bar">
    <section class="container-fluid container">
      <section class="row-fluid">
        <section class="span6">
          <div class="top-nav">
            <?php  wp_nav_menu( array( 'theme_location' => 'header_menu' ) );?>
          </div>
        </section>
         
        
        
        <section class="span6 e-commerce-list">
        
		<?php if(cp_woocommerce_enabled()) {  echo  cp_shop_nav_top(); ?>
           <div class="c-btn">  <?php  global $woocommerce;  if(cp_woocommerce_enabled()) {  echo cp_woocommerce_cart_dropdown();}?></div>
        <?php } ?>
        </section>
      </section>
    </section>
  </section>
  <!-- End Top Nav Bar -->
  <header id="main-header">
    <section class="container-fluid container">
      <section class="row-fluid">
        <section class="span4">
          <h1 id="logo"> <?php
		            echo '<a href="' . home_url( '/' ) . '">';
                    $logo_id = get_option(THEME_NAME_S.'_logo');
                    $logo_attachment = wp_get_attachment_image_src($logo_id, 'full');
                    $alt_text = get_post_meta($logo_id , '_wp_attachment_image_alt', true);
                    if( !empty($logo_attachment) ){
                       $logo_attachment = $logo_attachment[0];
                    }else{
                        $logo_attachment = CP_PATH_URL . '/images/default-logo.png';
                        $alt_text = 'default logo';
                    } 

                    echo '<img src="' . $logo_attachment . '" alt="' . $alt_text . '"/>';
                    echo '</a>';?>
                     </h1>
        </section>
        <section class="span8">
        
            <?php  if(cp_woocommerce_enabled()) { echo cp_shop_nav(); }  ?>
            
          <div class="clear"></div>
          
          <div class="search-bar">
             
            <?php 
			$search_type = get_option(THEME_NAME_S.'_header_search','Product');
			if ($search_type !== "Product" ) {?>
            <form method="get" id="searchform" action="<?php echo home_url(); ?>/">
                <input type="text" size="18" value="<?php the_search_query(); ?>" name="s" id="s" />
                <input type="submit" id="searchsubmit" value="<?php _e('Search','crunchpress')?>" class="btn" />
             </form>
             <?php } else { ?>
             <form id="searchform" action="<?php echo home_url(); ?>/" method="get" role="search">
			 <input id="s" type="text" placeholder="<?php _e('Search for products','crunchpress')?>" name="s" value="<?php the_search_query(); ?>">
			 <input id="searchsubmit" type="submit" value="<?php _e('Search','crunchpress')?>">
			 <input type="hidden" value="product" name="post_type">
			 </form>
             <?php } ?>
          </div>
          
        </section>
      </section>
    </section>
    <!-- Start Main Nav Bar -->
    <nav id="nav">
      <div class="navbar navbar-inverse">
        <div class="navbar-inner">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <div class="nav-collapse collapse">
              <?php 	global $mega_menu_options,$mega_menu_theme_optionss;
								$menu_name = 'main_menu';
							
								$mega_menu = get_option( 'mega_menu_options', $mega_menu_options );
							        $prev = $mega_menu['menu_name'];
													 if ($prev !== 'Mega Menu') {
								if($mega_menu['enable_mega'] ==1 ) {
								echo cp_display_menu($mega_menu['menu_name']);	
								}
							        }
								if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) && $locations[ $menu_name ]!=0) {
							
							    //print_r($locations);
                                dropdown_menu( array('dropdown_title' => '-- Main Menu --', 'indent_string' => '- ', 'indent_after' => '','container' => 'div', 'container_class' =>  
                                                        'responsive-menu-wrapper', 'theme_location'=>'main_menu') );
								
								if($mega_menu['enable_mega']!=1) {
							        wp_nav_menu( array('container' => 'div', 'menu_class'=> 'sf-menu nav',  'theme_location' => 'main_menu',) );
								}  
							  }?>
          </div>
          <!--/.nav-collapse -->
        </div>
        <!-- /.navbar-inner -->
      </div>
      <!-- /.navbar -->
    </nav>
    <!-- End Main Nav Bar -->
  </header>
  <!-- End Main Header -->    
     <?php global $cp_top_slider_type, $cp_top_slider_xml;
					if( $cp_top_slider_type == 'Layer Slider' ){ ?>
					<style >#content-holder { margin: 0px 0 60px; }</style>
                    <?php }else{ ?>
                    <style >#content-holder { margin: 60px 0; }</style>
                   <?php } ?>              