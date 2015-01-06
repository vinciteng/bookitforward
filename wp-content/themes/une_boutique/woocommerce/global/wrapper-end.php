<?php
/**
 * Content wrappers
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
?>
</div>

<?php
	if ( !is_product() ) { //only show sidebars if it is not a single product page.
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		$shop_layout = ot_get_option('shop_layout');
		if ( !($shop_layout == 'full-width') && !($shop_layout == '') ) {
			if ( ot_get_option('sidebars_state') !== 'unified-sidebars' ) {
				do_action('woocommerce_sidebar');
			} else {
				get_sidebar();
			}
		}
	}
?>

</div><!-- end of shop grid-container -->

<?php if ( ot_get_option('bottom_sidebars_state') == "home-and-product" || ot_get_option('bottom_sidebars_state') == "all-pages" ) { ?>

<!-- Bottom Widgets -->
<?php get_sidebar('bottom'); ?>

<?php } ?>