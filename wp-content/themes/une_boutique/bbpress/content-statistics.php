<?php

/**
 * Statistics Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

// Get the statistics
$stats = bbp_get_statistics(); ?>

<ul>

	<?php do_action( 'bbp_before_statistics' ); ?>

	<li><?php _e( 'Registered Users', 'bbpress' ); ?>
		<span class="stat-count"><?php echo esc_html( $stats['user_count'] ); ?></span>
	</li>

	<li><?php _e( 'Forums', 'bbpress' ); ?>
		<span class="stat-count"><?php echo esc_html( $stats['forum_count'] ); ?></span>
	</li>

	<li><?php _e( 'Topics', 'bbpress' ); ?>
		<span class="stat-count"><?php echo esc_html( $stats['topic_count'] ); ?></span>
	</li>

	<li><?php _e( 'Replies', 'bbpress' ); ?>
		<span class="stat-count"><?php echo esc_html( $stats['reply_count'] ); ?></span>
	</li>

	<li><?php _e( 'Topic Tags', 'bbpress' ); ?>
		<span class="stat-count"><?php echo esc_html( $stats['topic_tag_count'] ); ?></span>
	</li>

	<?php if ( !empty( $stats['empty_topic_tag_count'] ) ) : ?>

		<li><?php _e( 'Empty Topic Tags', 'bbpress' ); ?>
			<span class="stat-count"><?php echo esc_html( $stats['empty_topic_tag_count'] ); ?></span>
		</li>

	<?php endif; ?>

	<?php if ( !empty( $stats['topic_count_hidden'] ) ) : ?>

		<li><?php _e( 'Hidden Topics', 'bbpress' ); ?>
			<span class="stat-count">
				<abbr title="<?php echo esc_attr( $stats['hidden_topic_title'] ); ?>"><?php echo esc_html( $stats['topic_count_hidden'] ); ?></abbr>
			</span>
		</li>

	<?php endif; ?>

	<?php if ( !empty( $stats['reply_count_hidden'] ) ) : ?>

		<li><?php _e( 'Hidden Replies', 'bbpress' ); ?>
			<span class="stat-count">
				<abbr title="<?php echo esc_attr( $stats['hidden_reply_title'] ); ?>"><?php echo esc_html( $stats['reply_count_hidden'] ); ?></abbr>
			</span>
		</li>

	<?php endif; ?>

	<?php do_action( 'bbp_after_statistics' ); ?>

</ul>

<?php unset( $stats );