<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Une Boutique
 */

get_header();

$blog_layout = ot_get_option('blog_layout'); ?>

<div class="page-info-wrapper">
	<div class="row">
		<div class="small-6 column">
			<h3 class="page-title alignleft"><?php _e( 'Blog', 'une_boutique' ) ?></h3>
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
	<?php if ( $blog_layout == 'left-sidebar' ) {
			get_sidebar();
	} ?>
	<main id="primary" class="site-main small-12 <?php if($blog_layout=='full-width'){ ?>large-10 large-centered<?php
} else { ?> large-9<?php } ?> columns" role="main">

	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );
			?>

		<?php endwhile; ?>

		<span class="clear"></span>
		<nav class="blog-pages">
			<div class="nav-previous alignleft"><?php next_posts_link( '<span class="ub-icon-arrow-left7"></span> Older posts' ); ?></div>
		<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts <span class="ub-icon-arrow-right7"></span>' ); ?></div>
		</nav>
		<span class="clear"></span>
	<?php else : ?>

		<?php get_template_part( 'no-results', 'index' ); ?>

	<?php endif; ?>

	</main><!-- #main -->
<?php if ( $blog_layout == 'right-sidebar' ) {
	get_sidebar();
} ?>
	</div><!-- #primary (row) -->
<?php get_footer(); ?>