<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop, $wp_query, $post, $woocommerce;

// the declaration of the loop is moved to loop/loopstart.php in order to add column numbers to ul

// Ensure visibility
if ( ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first clearfix';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last clearfix';
if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' || !$product->get_rating_html() )
	$classes[] .= 'no-rating';
?>
<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<?php woocommerce_show_product_loop_sale_flash(); //sales flash ?>

		<div class="shop_items_thumbnail_holder">
			<a href="<?php the_permalink(); ?>" class="thumbnail">
				<span class="view-hover"><span class="ub-icon-link"></span></span>
				<?php woocommerce_template_loop_product_thumbnail(); //product thumbnail image ?>
			</a>
			
				<?php if ( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) ){ echo do_shortcode('[yith_wcwl_add_to_wishlist]'); } ?>
				<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

			<?php if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {
				if ( $rating_html = $product->get_rating_html() ) { ?>
				<div class="stars-rating-wrapper">
						<?php echo $rating_html; ?>
				</div>
			<?php } } ?>
		</div>

	<div class="shop_items_text_holder">
	<a href="<?php the_permalink(); ?>">
		<h3><?php the_title(); ?></h3>
	</a>

	<div class="stars-and-price clearfix">
		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
	</div>
	</div>

</li>