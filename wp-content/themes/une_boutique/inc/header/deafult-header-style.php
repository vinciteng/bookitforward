<header id="masthead" class="site-header default-header-style" role="banner">

	<section id="toolbar">
		<div id="stripes" class="show-for-small"></div>
		<div class="row">
			<div class="small-6 columns large-uncentered toolbar-left hide-for-medium-down">
				<?php if ( is_active_sidebar( 'toolbar-left' ) ) { ?>

					<?php dynamic_sidebar( 'toolbar-left' ); ?>

				<?php } else { ?>

				<?php wp_nav_menu( array( 'theme_location' => 'toolbar_left', 'fallback_cb' => false, 'container' => 'nav', 'items_wrap' => '<ul id="%1$s" class="%2$s inline-list">%3$s</ul>', 'depth' => -1 ) ); ?>

				<?php } ?>
			</div>

			<div class="small-6 columns large-uncentered opposite text-right toolbar-right hide-for-small">
				<?php if ( is_active_sidebar( 'toolbar-right' ) ) { ?>

					<?php dynamic_sidebar( 'toolbar-right' ); ?>

				<?php } else { ?>

					<?php wp_nav_menu( array( 'theme_location' => 'toolbar_right', 'fallback_cb' => false, 'container' => 'nav', 'items_wrap' => '<ul id="%1$s" class="%2$s inline-list right">%3$s</ul>', 'depth' => -1 ) ); ?>

				<?php } ?>
			</div>
		</div>
	</section>

	<section id="site-branding">
		<div class="row">
			<?php if ( is_active_sidebar( 'master_header_left' ) ) { ?>
			<div id="masthead-left" class="<?php if(is_active_sidebar('master_header_right')) { ?>large-4<?php }else{?>large-4<?php } ?> small-12 columns">
				<?php dynamic_sidebar('master_header_left'); ?>
			</div>
			<?php } ?>
			<div class="small-12 large-4 logo-column columns <?php if(is_active_sidebar('master_header_left')) { ?>text-center<?php } ?>">
				<?php if ( !ot_get_option('main_logo') ) { ?>
				<div class="text-logo columns">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><small><?php bloginfo( 'description' ); ?></small></h2>
				</div>
				<?php } else { ?>
					<a id="logo" class="<?php if( is_active_sidebar('master_header_left') && !is_active_sidebar('master_header_right') ) { ?>alignright<?php } else{ ?>aligncenter<?php } ?>" title="<?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo ot_get_option('main_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
					<script>
						// retina logo (your retina version of your logo should be exactly twice the size of main logo and should named the same as your main logo but ending with @2x and it should be png)
						var pixelRatio = !!window.devicePixelRatio ? window.devicePixelRatio:1;	logo_image=new Image();(function($){$(window).load(function(){"use-strict";if(pixelRatio>1){$('a#logo img').each(function(){var logo_image_width=$(this).width();var logo_image_height=$(this).height();$(this).css("width",logo_image_width);<?php $main_logo_image=ot_get_option('main_logo');$logo_withoutExt=preg_replace("/\\.[^.\\s]{3,4}$/","",$main_logo_image);?>$(this).attr('src','<?php echo $logo_withoutExt;?>@2x.png');});}})})(jQuery);
					</script>
				<?php } ?>
			</div>

			<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 

				if ( !ot_get_option('catalog_mode') ) {

			?>
			
			<div class="header-dropdown-cart-wrapper alignright no-margin-left">
				<div id="header-dropdown-cart" class="relative">
					
					<?php global $woocommerce; 
					if ( sizeof( $woocommerce->cart->get_cart() ) == 0 ) { $cart_class = "empty"; } else $cart_class =""; ?>
					<div class="woo-mini-cart-container <?php echo $cart_class; ?>">
						<div class="cart-count"><?php echo $woocommerce->cart->cart_contents_count; ?></div>
							<a title="<?php _e('Your Cart', 'une_boutique');?>" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
						<i class="ub-icon-bag-short"></i></a>
						<!-- Insert cart widget placeholder - code in woocommerce.js will update this on page load -->

						<div class="cart_content_wrapper">
							<div class="widget_shopping_cart_content"></div>
						</div>
					</div>
				</div>
			</div>

			<?php } } ?>

			<?php if ( is_active_sidebar( 'master_header_right' ) ) { ?>
			<div id="masthead-right" class="<?php if(is_active_sidebar('master_header_left')) { ?>large-3<?php }else{?>large-7<?php } ?> small-12 columns">
				<?php dynamic_sidebar('master_header_right'); ?>
			</div>
			<?php } ?>
		</div>
	</section>

<nav id="site-navigation" class="<?php if (ot_get_option('sticky_navigation_bar')  == 'on'  ){echo 'sticky-nav';} ?>"> <!-- main navigation section -->
	<!-- side nav (left offcanvas) section -->
	<?php if ( !ot_get_option('hide_start_here') ) { ?>
		<?php require get_template_directory() . '/inc/header/side_nav_section.php'; ?>
	<?php } ?>

	<div class="row">
		<div class="top-bar small-4 large-8 large-centered columns" role="navigation">
			<section class="top-bar-section hide-for-print">
				<ul class="title-area show-for-medium-down">
					<li class="menu-icon"><a href="javascript:void(0)"><span class="ub-icon-list2"></span><?php _e( 'MENU', 'une_boutique' ); ?></a></li>
				</ul>
				<div class="screen-reader-text skip-link hide">
					<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'une_boutique' ); ?>"><?php _e( 'Skip to content', 'une_boutique' ); ?></a>
				</div>

				<?php wp_nav_menu( array( 'container_class' => 'menu-main-nav-container', 'theme_location' => 'primary', 'fallback_cb' => true, 'menu_class' => 'main-menu', ) ); ?>
			</section>
		</div><!-- #site-navigation -->
		<?php if ( is_active_sidebar( 'search-widget' ) ) { ?>
		<div id="collapsable-search-form" class="hide-for-medium-down">
			<div class="small-1 columns large-uncentered opposite absolute">
				<i class="search-toggle alignright no-margin ub-icon-search2"></i>
			</div> <!-- end of search widget -->
			<div class="the-search-form">
				<div class="row">
					<div class="small-12 column">
						<?php dynamic_sidebar( 'search-widget' ); ?>
					</div>
				</div>
			</div>
		</div>				
		<?php } ?>
	</div>
	<?php require get_template_directory() . '/inc/header/off-canvas-main-nav.php'; ?>
</nav> <!-- ./end of main navigation section -->
</header><!-- #masthead -->