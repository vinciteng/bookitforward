<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Une Boutique
 */
?>

	</section><!-- #content -->

	<?php if ( is_active_sidebar( 'footer-light' ) ) { ?>

	<footer id="footer-light">
		<div class="row">
			<?php dynamic_sidebar( 'footer-light' ); ?>
		</div>
	</footer>

	<?php } ?>

	<?php if ( is_active_sidebar( 'footer-dark' ) ) { ?>

	<footer id="footer-dark">
		<div class="row">
			<div class="small-12 columns">
				<?php dynamic_sidebar( 'footer-dark' ); ?>
			</div>
		</div>
	</footer>

	<?php } ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row">

			<?php if ( is_active_sidebar( 'colophone-l' ) || is_active_sidebar( 'colophone-r' ) ) { ?>

			<div class="small-12 large-5 columns colophon-l">
				<?php dynamic_sidebar( 'colophone-l' ); ?>
			</div>

			<div class="small-12 large-7 columns colophon-r hide-for-small">
				<?php dynamic_sidebar( 'colophone-r' ); ?>
			</div>

			<?php } else { ?>
			<div class="site-info">
				<?php do_action( 'une_boutique_credits' ); ?>
				<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'une_boutique' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'une_boutique' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s', 'une_boutique' ), 'Une Boutique', '<a href="http://capitalh.ir/" rel="designer">CapitalH.ir</a>' ); ?>
			</div><!-- .site-info -->
			<?php } ?>

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php if ( ot_get_option('default_layout') == 'boxed' ) {
    // if boxed layout is selected
    echo '</div>';
} ?>


<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	require get_template_directory() . '/inc/modals.php';
} ?>
<p id="back-top"><a href="#top"><span class="ub-icon-arrow-up7"></span></a></p>

<?php if ( !current_user_can( 'manage_options' ) ) {
    echo ot_get_option('google_analytics_code');
} ?>

<?php wp_footer(); ?>
</body>
</html>