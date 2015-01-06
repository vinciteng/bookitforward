<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to une_boutique_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package Une Boutique
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

	<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) { ?>
		<h3 class="comments-title">
			<?php
				printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'une_boutique' ),
					number_format_i18n( get_comments_number() ) );
			?>
		</h3>
	<?php }

	// customizes the comment form fields
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$comments_args = array(
		'id_form'           => 'commentform',
		'id_submit'         => 'hidden_field',
		'title_reply'       => __( '' ),
		'title_reply_to'    => __( '' ),
		'cancel_reply_link' => __( 'Cancel Reply' ),
		'label_submit'      => __( 'Post Comment' ),

		'must_log_in' => '<p class="must-log-in">' .
		sprintf(
		__( 'You must be <a href="%s">logged in</a> to post a comment.' ),
		wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
		) . '</p>',

		
		'comment_field' =>  is_user_logged_in() ? '<textarea class="no-margin-bottom" required placeholder="' . _x( 'Leave a comment...', 'une_boutique' ) .
		'" id="comment" name="comment" cols="45" rows="3" aria-required="true">' .
		'</textarea><div class="comment-form-submit"><input class="alignright" name="submit" type="submit" id="submit" value="Post Comment"></div>' : '',

		'logged_in_as' => '<p class="logged-in-as">' .
		sprintf(
		__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
		admin_url( 'profile.php' ),
		$user_identity,
		wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
		) . '</p>',

		'comment_notes_before' => '',

		'comment_notes_after' => '',

		'fields' => apply_filters( 'comment_form_default_fields', array(

		'comment_field' =>  '<textarea class="no-margin-bottom" required placeholder="' . _x( 'Leave a comment...', 'une_boutique' ) .
		'" id="comment" name="comment" cols="45" rows="3" aria-required="true">' .
		'</textarea>',

		'submit' => '<div class="comment-form-submit"><input class="alignright" name="submit" type="submit" id="submit" value="Post Comment"></div>',

		'author' =>
		'<p class="no-margin-bottom comment-form-author"><input required placeholder="' . __( 'Name', 'une_boutique' ) . ' *" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30"' . $aria_req . ' /></p>',

		'email' =>
		'<p class="no-margin-bottom comment-form-email"><input required placeholder="' . __( 'Email', 'une_boutique' ) . ' *" id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		'" size="30"' . $aria_req . ' /></p>',

		'url' =>
		'<p class="no-margin-bottom comment-form-url"><input placeholder="' .
		__( 'Website', 'une_boutique' ) . '" id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" /></p>'
		)
		),
	);

comment_form( $comments_args );

?>

	<?php if ( have_comments() ) : ?>
		<div class="wpb_separator wpb_content_element relative"></div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'une_boutique' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'une_boutique' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'une_boutique' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ul class="comment-list unstyled no-bullet">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use une_boutique_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define une_boutique_comment() and that will be used instead.
				 * See une_boutique_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'une_boutique_comment' ) );
			?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'une_boutique' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'une_boutique' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'une_boutique' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'une_boutique' ); ?></p>
	<?php endif; ?>

</div><!-- #comments -->
