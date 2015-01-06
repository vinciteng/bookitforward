<?php
/**
 * Order tracking form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $post;
?>

<form action="<?php echo esc_url( get_permalink($post->ID) ); ?>" method="post" class="track_order">
<div class="col2-set" id="tracking">
	<div class="col-1 tracking-form">
		<p class="form-row form-row-first"><label for="orderid"><?php _e( 'Order ID', 'woocommerce' ); ?> <span class="required">*</span></label> <input class="input-text" type="text" name="orderid" id="orderid" placeholder="<?php _e( 'Found in your order confirmation email.', 'woocommerce' ); ?>" required autofocus /></p>
		<p class="form-row form-row-last"><label for="order_email"><?php _e( 'Billing Email', 'woocommerce' ); ?> <span class="required">*</span></label> <input class="input-text" type="email" name="order_email" id="order_email" placeholder="<?php _e( 'Email you used during checkout.', 'woocommerce' ); ?>" required /></p>
		<div class="clear"></div>
		<p class="form-row"><input type="submit" class="button round" name="track" value="<?php _e( 'Track', 'woocommerce' ); ?>" /></p>
		<?php wp_nonce_field( 'woocommerce-order_tracking' ); ?>
	</div>
	
	<div class="col-2 form-notes tracking-note">
		<span class="arrow-shape-left"></span>
		<p><?php _e( 'To track your order please enter your Order ID in the box on the left and press the  track button. The ID was given to you on your receipt and in the confirmation email you should have received.', 'une_boutique' ); ?></p>
	</div>
	
</div>
</form>