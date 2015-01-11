<?php
/**
 * The Template for displaying all single posts.
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
<div class="row">
	<?php if ( $blog_layout == 'left-sidebar' ) {
			get_sidebar();
	} ?>
	<div class="columns small-12 <?php if($blog_layout=='full-width'){ ?>large-9 large-centered<?php
} else { ?> large-9<?php } ?>">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php une_boutique_content_nav( 'nav-below' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

			<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div>
	</div>
<?php if ( $blog_layout == 'right-sidebar' ) {
	get_sidebar();
} ?>
</div><!-- #primary (row) -->

<?php get_footer(); ?>