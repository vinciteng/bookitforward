<?php
/**
 * Change password form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<?php $woocommerce->show_messages(); ?>
<div class="large-7 small-12">
	<form action="<?php echo esc_url( get_permalink(woocommerce_get_page_id('change_password')) ); ?>" method="post">

		<p class="form-row form-row-first">
			<input required placeholder="<?php _e( 'New password', 'woocommerce' ); ?> *" type="password" class="input-text" name="password_1" id="password_1" required autofocus />
		</p>
		<p class="form-row form-row-last">
			<input required placeholder="<?php _e( 'Re-enter new password', 'woocommerce' ); ?> *" type="password" class="input-text" name="password_2" id="password_2" required />
		</p>
		<div class="clear"></div>

		<p><input type="submit" class="button round" name="change_password" value="<?php _e( 'Save', 'woocommerce' ); ?>" /></p>

		<?php $woocommerce->nonce_field('change_password')?>
		<input type="hidden" name="action" value="change_password" />
	</form>
</div>