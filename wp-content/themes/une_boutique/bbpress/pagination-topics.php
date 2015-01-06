<?php

/**
 * Pagination for pages of topics (when viewing a forum)
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_pagination_loop' ); ?>

<div class="bbp-pagination">

	<div class="bbp-pagination-links">
		<?php bbp_forum_pagination_links(); ?>
	</div>


	<div class="bbp-pagination-count">
		<div class="forum-topic-info">
			<i data-tooltip class="has-tip tip-top" title="<?php bbp_forum_pagination_count(); ?>">i</i>
		</div>
	</div>

	<?php bbp_topic_tag_list(); ?>
</div>
<div class="clear"></div>

<?php do_action( 'bbp_template_after_pagination_loop' ); ?>
