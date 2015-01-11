<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Une Boutique
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'une_boutique' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<div class="row"><div class="columns small-12">
	<?php edit_post_link( __( 'Edit', 'une_boutique' ), '<footer class="entry-meta"><span class="edit-link"><span class="ub-icon-edit"></span> ', '</span></footer>' ); ?>
	</div></div>
</article><!-- #post-## -->
