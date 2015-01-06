<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Une Boutique
 */

get_header();

$blog_layout = ot_get_option('blog_layout'); ?>

<div class="page-info-wrapper">
	<div class="row">
		<div class="small-3 column">
			<h3 class="page-title alignleft">
				<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							printf( __( 'Author: %s', 'une_boutique' ), '<span class="vcard">' . get_the_author() . '</span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'une_boutique' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'une_boutique' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'une_boutique' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'une_boutique' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'une_boutique');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'une_boutique' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'une_boutique' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'une_boutique' );

						else :
							_e( 'Archives', 'une_boutique' );

						endif;
					?>

			</h3>
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

<section class="content-area row">
	<?php if ( $blog_layout == 'left-sidebar' ) {
			get_sidebar();
	} ?>
	<main id="primary" class="site-main small-12 <?php if($blog_layout=='full-width'){ ?>large-9 large-centered<?php
} else { ?> large-9<?php } ?> columns" role="main">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
				// Show an optional term description.
				$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( '<div class="taxonomy-description">%s</div>', $term_description );
				endif;
			?>
		</header><!-- .page-header -->

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

		<?php get_template_part( 'no-results', 'archive' ); ?>

	<?php endif; ?>

	</main><!-- #main -->
	<?php if ( $blog_layout == 'right-sidebar' ) {
		get_sidebar();
	} ?>
</section><!-- #primary -->


<?php get_footer(); ?>
