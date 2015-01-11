<?php
/**
 * External product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<?php do_action('woocommerce_before_add_to_cart_button'); ?>

<p class="cart">
	<a href="<?php echo esc_url( $product_url ); ?>" rel="nofollow" class="single_add_to_cart_button button alt"><?php echo $button_text; ?></a>
</p>

<?php
if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ) { ?>

<div class="wish-list-button">
	<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
</div>
<?php } ?>

<?php do_action('woocommerce_after_add_to_cart_button'); ?>