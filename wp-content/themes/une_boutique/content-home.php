<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Une Boutique
 * @since Une Boutique 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content page">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'une_boutique' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<!-- <br>
	<div class="row">
		<div class="column small-12">
			<br>
			<?php //edit_post_link( __( 'Edit', 'une_boutique' ), '<footer class="entry-meta"><span class="edit-link"><span aria-hidden="true" data-icon="&#xe049;"></span> ', '</span></footer>' ); ?>
		</div>
	</div> -->

</article><!-- #post-## -->
