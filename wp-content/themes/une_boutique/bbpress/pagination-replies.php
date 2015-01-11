<?php

/**
 * Pagination for pages of replies (when viewing a topic)
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_pagination_loop' ); ?>

<div class="bbp-pagination">
	<div class="bbp-pagination-links">

		<?php bbp_topic_pagination_links(); ?>

	</div>
	
	<div class="bbp-pagination-count">
		<div class="forum-topic-info">
			<i data-tooltip class="has-tip tip-top" title="<?php bbp_topic_pagination_count(); ?>">i</i>
		</div>
	</div>

	<ul class="unstyled topic-tags-list">
		<li class="parent"><div class="tags-icon"><i class="ub-icon-tags"></i></div>
			<ul class="unstyled">
				<li>
					<?php bbp_topic_tag_list(); ?>
				</li>
			</ul>
		</li>
	</ul>
</div>
<div class="clear"></div>

<?php do_action( 'bbp_template_after_pagination_loop' ); ?>
