<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Une Boutique
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
	<div id="main" class="content-area row">
		<main id="primary" class="site-main small-12 large-9 columns has-sidebar" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
<?php get_sidebar(); ?>
	</div><!-- #primary -->
<?php get_footer(); ?>
