<?php
/**
 * Show messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! $messages ) return;
?>

<?php foreach ( $messages as $message ) : ?>
	<div class="woocommerce-message">
		<div class="row"><div class="column small-12">
			<?php echo wp_kses_post( $message ); ?>
		</div></div>
	</div>
<?php endforeach; ?>
