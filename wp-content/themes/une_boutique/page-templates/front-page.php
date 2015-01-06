<?php
/**
 * Template Name: Front Page Template
 *
 * Description: This is where you can start, as a home page, with revolution slider built right in.
 *
 * @package WordPress
 * @subpackage Une_Boutique
 * @since Une Boutique 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content-home', 'page' ); ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->
</div><!-- #primary -->

<!-- Bottom Widgets -->

<?php get_footer(); ?>