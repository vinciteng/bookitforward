<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Une Boutique
 */

get_header();

$blog_layout = ot_get_option('blog_layout'); ?>

<div class="page-info-wrapper">
	<div class="row">
		<div class="small-6 column">
			<h3 class="page-title alignleft"><?php printf( __( 'Search Results for: %s', 'une_boutique' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
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
<section id="main" class="content-area row">
	<?php if ( $blog_layout == 'left-sidebar' ) {
			get_sidebar();
	} ?>
	<main id="primary" class="site-main small-12 <?php if($blog_layout=='full-width'){ ?>large-9 large-centered<?php
} else { ?> large-9<?php } ?> columns" role="main">

	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'search' ); ?>

		<?php endwhile; ?>

		
		<span class="clear"></span>
		<nav class="blog-pages">
		<div class="nav-previous alignleft"><?php next_posts_link( '<span class="ub-icon-arrow-left7"></span> Older posts' ); ?></div>
		<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts <span class="ub-icon-arrow-right7"></span>' ); ?></div>
		</nav>
		<span class="clear"></span>

	<?php else : ?>

		<?php get_template_part( 'no-results', 'search' ); ?>

	<?php endif; ?>

	</main><!-- #main -->
<?php if ( $blog_layout == 'right-sidebar' ) {
	get_sidebar();
} ?>
</section><!-- #primary -->

<?php get_footer(); ?>