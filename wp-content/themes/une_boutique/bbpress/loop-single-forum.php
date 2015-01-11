<?php

/**
 * Forums Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

?>
<div class="single-forum-loop-wrapper">
<div class="bbp-forum-freshness">
	<p class="bbp-topic-meta">
		<?php do_action( 'bbp_theme_before_topic_author' ); ?>
		<span class="bbp-topic-freshness-author"><?php bbp_author_link( array( 'post_id' => bbp_get_forum_last_active_id(), 'size' => 60 ) ); ?></span>
		<?php do_action( 'bbp_theme_after_topic_author' ); ?>
	</p>
</div>
<ul id="bbp-forum-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>
	<span class="arrow-shape-left white"></span>
	<li class="bbp-forum-info-title clearfix">

		<?php do_action( 'bbp_theme_before_forum_title' ); ?>

		<a class="bbp-forum-title" href="<?php bbp_forum_permalink(); ?>" title="<?php bbp_forum_title(); ?>"><?php bbp_forum_title(); ?></a>

		<?php do_action( 'bbp_theme_after_forum_title' ); ?>
		<div class="bbp-forum-topic-reply alignright">
			<ul class="unstyled single-count">
			<li class="bbp-forum-topic-count-dropdown"><a href="<?php bbp_forum_permalink(); ?>"><?php _e( 'Topics', 'bbpress' ); ?>: <?php bbp_forum_topic_count(); ?></a>
			<ul class="unstyled">
				<li class="bbp-forum-reply-count-dropdown"><a href="<?php bbp_forum_permalink(); ?>"><?php bbp_show_lead_topic() ? _e( 'Replies', 'bbpress' ) : _e( 'Posts', 'bbpress' ); ?>: <?php bbp_show_lead_topic() ? bbp_forum_reply_count() : bbp_forum_post_count(); ?></a></li>
			</ul>
			</li>
			</ul>
		</div>

	</li>
	<li class="bbp-forum-info">

		<?php do_action( 'bbp_theme_before_forum_description' ); ?>

		<div class="bbp-forum-content"><?php the_content(); ?></div>

		<?php do_action( 'bbp_theme_after_forum_description' ); ?>

		<?php do_action( 'bbp_theme_before_forum_sub_forums' ); ?>

		<?php bbp_list_forums(); ?>

		<?php do_action( 'bbp_theme_after_forum_sub_forums' ); ?>

		<?php bbp_forum_row_actions(); ?>

	</li>
	<li class="bbp-forum-info-footer">
		<?php do_action( 'bbp_theme_before_forum_freshness_link' ); ?>

			<span><i class="icon-mini-loop"></i> <?php bbp_forum_freshness_link(); ?></span>

		<?php do_action( 'bbp_theme_after_forum_freshness_link' ); ?>
	</li>

</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->
</div>
