<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce-tabs">
		<ul class="tabs small-block-grid-5">
			<div class="row"><div class="column small-12">
				<?php foreach ( $tabs as $key => $tab ) : ?>

					<li class="<?php echo $key ?>_tab">
						<a href="#tab-<?php echo $key ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a>
					</li>

				<?php endforeach; ?>
			</div></div>
		</ul>
		<?php foreach ( $tabs as $key => $tab ) : ?>

			<div class="panel entry-content" id="tab-<?php echo $key ?>">
				<div class="row"><div class="column small-12">
					<?php call_user_func( $tab['callback'], $key, $tab ) ?>
				</div></div>
			</div>

		<?php endforeach; ?>
	</div>

<?php endif; ?>