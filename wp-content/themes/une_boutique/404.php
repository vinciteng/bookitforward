<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Une Boutique
 * @since Une Boutique 1.0
 */

get_header(); ?>
<div class="page-info-wrapper">
	<div class="row">
		<div class="large-5 small-12 column">
			<h3 class="page-title alignleft"><?php _e('404 Page Not Found - THEME SHARED ON WPLOCKER.COM', 'une_boutique') ?></h3>
		</div>
		<div class="large-7 small-12 column text-right">
			<div id="breadcrumbs">
				<?php if(function_exists('bcn_display')) {
						bcn_display();
					}
				?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="small-12 column">
		<!-- <h1 class="text-center no-margin-top"><?php //_e('Oooops, You’re Lost!!!', 'une_boutique') ?></h1> -->
		<div class="links">
			<span class="back-home alignleft"><span class="ub-icon-arrow-left4"></span> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Back To Home', 'une_boutique') ?></a></span>
			<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
			<span class="go-shopping alignright"><a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>"><?php _e('Go Shopping', 'une_boutique') ?></a> <span class="ub-icon-arrow-right4"></span></span>
			<?php } // end if ( in_array( 'woocommerce/woocommerce.php'... ?>
		</div>
		<img class="aligncenter" src="<?php echo get_template_directory_uri(); ?>/images/404.png" alt="<?php _e('error-404', 'une_boutique') ?>">
	</div> <!-- end of grid-100 -->
</div> <!-- end of grid container -->
<?php get_footer(); ?>