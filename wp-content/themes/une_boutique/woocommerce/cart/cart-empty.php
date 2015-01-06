<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wc_print_notices();

?>

<div class="custom-cart-empty">
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cart-empty.png" alt="<?php _e( 'No products in the cart.', 'woocommerce' ); ?>" class="mini-cart-empty aligncenter" /><br>
	<p class="empty-cart"><?php _e( 'Your cart is currently empty', 'une_boutique' ) ?></p>
	<p class="back-to-shop"><a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>"><?php _e( 'Return To Shop', 'woocommerce' ) ?></a></p>
</div>

<?php do_action('woocommerce_cart_is_empty'); ?>