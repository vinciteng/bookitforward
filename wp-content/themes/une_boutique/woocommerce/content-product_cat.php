<?php
/**
 * The template for displaying product category thumbnails within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce_loop, $wp_query, $post, $woocommerce;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );

// Increase loop count
$woocommerce_loop['loop']++;
?>
<li class="product-category category<?php
    if ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 || $woocommerce_loop['columns'] == 1)
        echo ' first';
	if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 )
		echo ' last';
	?>">
	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>

<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">

	<?php
		/**
		 * woocommerce_before_subcategory_title hook
		 *
		 * @hooked woocommerce_subcategory_thumbnail - 10
		 */
		do_action( 'woocommerce_before_subcategory_title', $category );
	?>

	<?php
		/**
		 * woocommerce_after_subcategory_title hook
		 */
		do_action( 'woocommerce_after_subcategory_title', $category );
	?>
	<span class="view-hover"><span class="ub-icon-link"></span></span>
</a>

<div class="collection-wrapper">

	<h3>
		<?php echo $category->name;	?>
	</h3>

	<?php
	if ( ot_get_option('product_categories_product_count') ) {

		if ( $category->count > 1 ) {
					$smart_title = __('porducts in this category' , 'une_boutique');
				} else { $smart_title = __('porduct in this category' , 'une_boutique'); }

		if ( $category->count > 0 )
			echo apply_filters( 'woocommerce_subcategory_count_html', ' <span data-tooltip="left" data-width="auto" title=" ' . $smart_title . ' " class="count has-tip tip-left">' . $category->count . '</span>', $category );
	}
	?>	
	<div class="term-description">
		<p><?php echo $category->description; //displays categories description on category loop shortcode ?></p>
	</div>

	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>
</div> <!-- end of collection wrapper -->
</li>
