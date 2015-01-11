<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="large-3 columns post-data-column">
			<span class="post-type-icon-wrapper"></span>
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta hide-for-small">
				<?php une_boutique_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</div>
		<div class="large-9 columns post-content-column">
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'une_boutique' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'une_boutique' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
			</div><!-- .entry-content -->

			<footer class="entry-meta">
				<div class="clean"></div><br>
				<?php edit_post_link( __( 'Edit', 'une_boutique' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->
		</div>
	</div>

</article><!-- #post -->
