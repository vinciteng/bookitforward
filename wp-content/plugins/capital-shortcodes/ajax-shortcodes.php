<div id="popup_container">

<ul class="shortcodes-list">
<li><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-contact-form.php?" title="insert your email" class="thickbox insert-contact-form" ><img src="../wp-content/plugins/capital-shortcodes/images/contact-form.jpg" title="insert contact form" alt="insert contact form" /></a></li>

<li><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-google-maps.php?" title="insert google maps data" class="thickbox insert-google-maps" ><img src="../wp-content/plugins/capital-shortcodes/images/google-maps.jpg" title="insert google maps" alt="insert google maps"  /></a></li>

<li><a href="#" class="insert-posts-tagcloud" ><img src="../wp-content/plugins/capital-shortcodes/images/cloud-tags.jpg" title="insert posts tag cloud" alt="insert posts tag cloud"  /></a></li>

<li><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-tabs-shortcode.php?" title="insert tabs shortcode" class="thickbox insert-tabs-shortcode" ><img src="../wp-content/plugins/capital-shortcodes/images/tabs-shortcode.jpg" title="insert tabs shortcode" alt="insert tabs shortcode" /></a></li>

<li><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-accordion-shortcode.php?" title="insert accordion shortcode" class="thickbox insert-accordion-shortcode" ><img src="../wp-content/plugins/capital-shortcodes/images/accordion-shortcode.jpg" title="insert accordion shortcode" alt="insert accordion shortcode" /></a></li>

<li class="last"><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-button-shortcode.php?" title="insert button shortcode" class="thickbox insert-button-shortcode" ><img src="../wp-content/plugins/capital-shortcodes/images/buttons-shortcode.jpg" title="insert button shortcode" alt="insert button shortcode" /></a></li>

<li><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-columns-shortcode.php?" title="insert columns shortcode" class="thickbox insert-columns-shortcode" ><img src="../wp-content/plugins/capital-shortcodes/images/columns-shortcode.jpg" title="insert columns shortcode" alt="insert columns shortcode" /></a></li>

<li><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-secure-email-shortcode.php?" title="insert secure email shortcode" class="thickbox insert-secure-email-shortcode" ><img src="../wp-content/plugins/capital-shortcodes/images/secure-email-shortcode.jpg" title="insert secure email shortcode" alt="insert secure email shortcode" /></a></li>

<li><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-google-docs-viewer.php?" title="google docs viewer shortcode" class="thickbox google-docs-viewer" ><img src="../wp-content/plugins/capital-shortcodes/images/google-docs-viewer.jpg" title="google docs viewer shortcode" alt="google docs viewer shortcode" /></a></li>

<li><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-related-posts.php?" title="related posts shortcode" class="thickbox related-posts" ><img src="../wp-content/plugins/capital-shortcodes/images/related-posts.jpg" title="related posts shortcode" alt="related posts shortcode" /></a></li>

<li><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-flickr-badge.php?" title="Flickr Badge Shortcode" class="thickbox flickr-badge-shortcode" ><img src="../wp-content/plugins/capital-shortcodes/images/flickr-badge.jpg" title="Flickr Badge Shortcode" alt="Flickr Badge Shortcode" /></a></li>

<li class="last"><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-video-embed.php?" title="Video Embed Shortcode" class="thickbox video-embed-shortcode" ><img src="../wp-content/plugins/capital-shortcodes/images/embed-video.jpg" title="Video Embed Shortcode" alt="Video Embed Shortcode" /></a></li>

<li><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-price-table.php?" title="Price Table Shortcode" class="thickbox price-table-shortcode" ><img src="../wp-content/plugins/capital-shortcodes/images/price-table.jpg" title="Price Table Shortcode" alt="Price Table Shortcode" /></a></li>

<li><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-lead-text-shortcode.php?" title="Lead Text Shortcode" class="thickbox lead-text-shortcode" ><img src="../wp-content/plugins/capital-shortcodes/images/lead-text-shortcode.jpg" title="Leade Text Shortcode" alt="Lead Text Shortcode" /></a></li>

<li><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-headline-border-shortcode.php?" title="Headline Border Shortcode" class="thickbox gealine-border-shortcode" ><img src="../wp-content/plugins/capital-shortcodes/images/headline-border-shortcode.jpg" title="Headline Border Shortcode" alt="Headline Border Shortcode" /></a></li>

<li><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-border-line-shortcode.php?" title="Border Line Shortcode" class="thickbox border-line-shortcode" ><img src="../wp-content/plugins/capital-shortcodes/images/border-line-shortcode.jpg" title="Border Line Shortcode" alt="Border Line Shortcode" /></a></li>

<li><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-action-box-shortcode.php?" title="Action Box Shortcode" class="thickbox action-box-shortcode" ><img src="../wp-content/plugins/capital-shortcodes/images/action-box-shortcode.jpg" title="Action Box Shortcode" alt="Action Box Shortcode" /></a></li>

<li class="last"><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-featured-box-shortcode.php?" title="Featured Box Shortcode" class="thickbox featured-box-shortcode" ><img src="../wp-content/plugins/capital-shortcodes/images/featured-box-shortcode.jpg" title="Featured Box Shortcode" alt="Featured Box Shortcode" /></a></li>

<li><a href="../wp-content/plugins/capital-shortcodes/includes/ajax-flipping-circle-shortcode.php?" title="Flipping Circle Shortcode" class="thickbox flipping-circle-shortcode" ><img src="../wp-content/plugins/capital-shortcodes/images/flipping-circle-shortcode.jpg" title="Flipping Circle Shortcode" alt="Flipping Circle Shortcode" /></a></li>

</ul>
</div>

<script>
	// insert tagcloud
	(function ($) {
		"use strict";
	$('.insert-posts-tagcloud').click (function() {
		tinymce.activeEditor.execCommand('mceInsertContent',false,'[tagcloud]');
		tb_remove(); // remove the thickbox after inserting the shortcode
		return false;
	});
	})(jQuery);
</script>