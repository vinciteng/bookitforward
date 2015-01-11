<div id="popup_container">
    <br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>Related Posts</h3>
<label class="shortcode-labels" for="related-posts-title">Related Posts Title:</label>
<input class="shortcode-text-inputs" type="text" id="related-posts-title" name="document-url" placeholder="Related Posts Title" />

<label class="shortcode-labels" for="related-posts-limit">Number of related posts to show:</label>
<input class="shortcode-text-inputs" type="text" id="related-posts-limit" name="related-posts-limit" placeholder="Number of related posts to show" />

<br />
<a href="#" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {
    // saves related posts title input value into a variable
   $('#related-posts-title').on("keyup change", function() {
      related_posts_title = $("#related-posts-title").val();
   });
   if (related_posts_title === undefined) {
		var related_posts_title = "Related Posts";
   }

   // saves related posts limit input value into a variable
   $('#related-posts-limit').on("keyup change", function() {
      related_posts_limit = $("#related-posts-limit").val();
   });
   if (related_posts_limit === undefined) {
    var related_posts_limit = "5";
   }

// insert contact form
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[related_posts related_posts_title="'+related_posts_title+'" limit="'+related_posts_limit+'"]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>