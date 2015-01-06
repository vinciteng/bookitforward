<?php
/**
 * Template Name: Full-width Pages, No Sidebar
 *
 * Description: a template for pages that have no sidebars at all.
 *
 * @package WordPress
 * @subpackage Une_Boutique
 * @since Une Boutique 1.0
 */

get_header(); ?>
<div class="page-info-wrapper">
	<div class="row">
		<div class="small-6 column">
			<h3 class="page-title alignleft"><?php the_title(); ?></h3>
		</div>
		<div class="small-6 column text-right">
			<div id="breadcrumbs">
				<?php if(function_exists('bcn_display')) {
						bcn_display();
					}
				?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div id="primary" class="content-area small-12 column">
		<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->


</div> <!-- end of grid container -->

<?php if ( ot_get_option('bottom_sidebars_state') == "all-pages" ) { ?>

<!-- Bottom Widgets -->
<?php get_sidebar('bottom'); ?>

<?php } ?>


<?php get_footer(); ?>
