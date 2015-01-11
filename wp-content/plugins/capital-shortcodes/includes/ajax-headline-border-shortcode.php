<div id="popup_container headline-border-shortcode">
		<br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>Headline Border Shortcode</h3>
	<form id="inputs" accept-charset="utf-8">

		<label class="shortcode-labels" for="headline-border-color">Color:</label>
			<select id="headline-border-color">
			<option value="dark" selected="selected">Dark</option>
			<option value="white">Light</option>
		</select>

		<label class="shortcode-labels" for="headline-border-position">Position:</label>
			<select id="headline-border-position">
			<option value="center" selected="selected">Center</option>
			<option value="left">Left</option>
			<option value="right">Right</option>
		</select>

	</form>
<br />
<a id="" href="" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {

	// Store Headling Color
	$("#headline-border-color").change(function () {
			headline_border_color = $("#headline-border-color option:selected").val()
		$(this).each(function () {
			headline_border_color = $(this).val();
		});
		})
	.change();

	// store Headling Position
	$('#headline-border-position').on("keyup change", function() {
		headline_border_position = $("#headline-border-position").val();
	});
		if (headline_border_position === undefined) {
			var headline_border_position = "center";
	}

// insert accordion shortcode
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[headline-border class="'+headline_border_color+' '+headline_border_position+'"]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>