<?php
/**
 * The template for displaying posts in the Video post format
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="row">
		<div class="large-3 columns post-data-column">
			<div class="hide-for-small">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 140 ); ?>
			</div>

			<span class="post-type-icon-wrapper"></span>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta hide-for-small">
				<?php une_boutique_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</div>
		<div class="large-9 columns post-content-column">
			<?php if ( is_search() ) : // Only display Excerpts for Search ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
				<?php else : ?>
				<div class="entry-content">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'une_boutique' ) ); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'une_boutique' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->
			<?php endif; ?>

			<footer class="entry-meta">
				<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
					<?php
						/* translators: used between list items, there is a space after the comma */
						$categories_list = get_the_category_list( __( ', ', 'une_boutique' ) );
						if ( $categories_list && une_boutique_categorized_blog() ) :
					?>
					<span class="cat-links">
						<?php printf( __( 'Posted in %1$s', 'une_boutique' ), $categories_list ); ?>
					</span>
					<?php endif; // End if categories ?>

					<?php
						/* translators: used between list items, there is a space after the comma */
						$tags_list = get_the_tag_list( '', __( ', ', 'une_boutique' ) );
						if ( $tags_list ) :
					?>
					<span class="tags-links">
						<?php printf( __( 'Tagged %1$s', 'une_boutique' ), $tags_list ); ?>
					</span>
					<?php endif; // End if $tags_list ?>
				<?php endif; // End if 'post' == get_post_type() ?>

				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<strong class="comments-link"> | <?php comments_popup_link( __( 'Leave a comment', 'une_boutique' ), __( '1 Comment', 'une_boutique' ), __( '% Comments', 'une_boutique' ) ); ?></strong>
				<?php endif; ?>
				<div class="clean"></div><br>
				<?php edit_post_link( __( 'Edit', 'une_boutique' ), '<footer class="entry-meta"><span class="edit-link"><span aria-hidden="true" data-icon="&#xe049;"></span> ', '</span></footer>' ); ?>
			</footer><!-- .entry-meta -->
		</div>
	</div>
</article><!-- #post -->
