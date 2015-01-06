<?php

/**
 * Pagination for pages of search results 
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_pagination_loop' ); ?>

<div class="bbp-pagination">

	<div class="bbp-pagination-links">

		<?php bbp_search_pagination_links(); ?>

	</div>

	<div class="bbp-pagination-count">
		<div class="forum-topic-info">
			<i data-tooltip class="has-tip tip-top" title="<?php bbp_search_pagination_count(); ?>">i</i>
		</div>
	</div>

</div>

<?php do_action( 'bbp_template_after_pagination_loop' ); ?>
