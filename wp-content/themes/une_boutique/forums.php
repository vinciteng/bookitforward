<?php
/**
 * The template for displaying Forum Pages
 *
 * This is the template that displays bbPress Related pages
 *
 * @package Une Boutique
 * @since Une Boutique 1.0
 */
$forum_layout = ot_get_option('forum_layout');
get_header(); ?>
<div class="page-info-wrapper">
	<div class="row">
		<div class="small-6 column">
			<h3 class="page-title alignleft"><?php the_title(); ?></h3>
		</div>
		<div class="small-6 column text-right">
			<div id="breadcrumbs">
				<?php bbp_breadcrumb(); ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
<?php if ( $forum_layout == 'left-sidebar' ) {
		get_sidebar('forum');
} ?>
	<div id="primary" class="content-area <?php if ( $forum_layout == 'full-width' ) { ?>full-width-forum small-12<?php } else { ?>has-sidebar small-12 large-9<?php } ?> columns">
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

<?php if ( !($forum_layout == 'left-sidebar' || $forum_layout == 'full-width') ) {
		get_sidebar('forum');
} ?>

</div> <!-- end of row -->
<?php get_footer(); ?>