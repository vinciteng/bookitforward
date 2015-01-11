<?php
/**
 * Template Name: Pages with Left Sidebar
 *
 * Description: use this page template for general pages with default sidebars on the left.
 *
 * @package Une Boutique
 * @since Une Boutique 1.0
 */

get_header(); ?>
<div class="page-info-wrapper">
	<div class="row">
		<div class="small-3 column">
			<h3 class="page-title alignleft"><?php the_title(); ?></h3>
		</div>
		<div class="small-9 column text-right">
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
	<?php get_sidebar(); ?>
	<div id="primary" class="content-area columns small-9">
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

</div> <!-- end of row -->

<?php if ( ot_get_option('bottom_sidebars_state') == "all-pages" ) { ?>

<!-- Bottom Widgets -->
<?php get_sidebar('bottom'); ?>

<?php } ?>

<?php get_footer(); ?>
