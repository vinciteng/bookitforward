<?php

/**
 * User Profile
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

	<?php do_action( 'bbp_template_before_user_profile' ); ?>

	<div id="bbp-user-profile" class="bbp-user-profile">
		<h2 class="entry-title"><?php _e( 'Profile', 'bbpress' ); ?></h2>
		<div class="bbp-user-section">

			<?php if ( bbp_get_displayed_user_field( 'description' ) ) : ?>

				<div class="bbp-user-description">
					<i class="arrow-shape-up"></i>
					<p><?php bbp_displayed_user_field( 'description' ); ?></p>
				</div>

			<?php endif; ?>

			<p class="bbp-user-forum-role"><i class="icon-mini-user"></i> <?php  printf( __( 'Forum Role: <strong>%s</strong>',      'bbpress' ), bbp_get_user_display_role()    ); ?></p>
			<p class="bbp-user-topic-count"><i class="icon-mini-file"></i> <?php printf( __( 'Topics Started: <strong>%s</strong>',  'bbpress' ), bbp_get_user_topic_count_raw() ); ?></p>
			<p class="bbp-user-reply-count"><i class="icon-mini-share-alt"></i> <?php printf( __( 'Replies Created: <strong>%s</strong>', 'bbpress' ), bbp_get_user_reply_count_raw() ); ?></p>
		</div>
	</div><!-- #bbp-author-topics-started -->

	<?php do_action( 'bbp_template_after_user_profile' ); ?>
