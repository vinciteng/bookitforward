<div id="popup_container lead-text-shortcode">
		<br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>Lead Text Shortcode</h3>

	<label class="shortcode-labels" for="lead-text">Lead Text:</label>
	<textarea class="shortcode-text-textarea" id="lead-text" name="lead-text" cols="58" rows="10" placeholder="Lead Text Content"></textarea>

	<label class="shortcode-labels" for="optional-class">Optional Class:</label>
	<input class="shortcode-text-inputs" type="text" id="optional-class" name="optional-class" placeholder="Optional Class" />

<br />
<a id="" href="" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {

	// store lead text content
	$('#lead-text').on("keyup change", function() {
		lead_text = $("#lead-text").val();
	});
		if (lead_text === undefined) {
			var lead_text = "Insert Your Lead Text Content Here";
	}

	// store optional class
	$('#optional-class').on("keyup change", function() {
		optional_class = $("#optional-class").val();
	});
		if (optional_class === undefined) {
			var optional_class = "";
	}

// insert accordion shortcode
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[lead-text class="'+optional_class+'"] '+lead_text+' [/lead-text]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>