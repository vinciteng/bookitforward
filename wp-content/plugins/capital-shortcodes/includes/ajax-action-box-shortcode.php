<div id="popup_container action-box-shortcode">
		<br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>Call to Action Box Shortcode</h3>
	<form id="inputs" accept-charset="utf-8">

		<label class="shortcode-labels" for="text-align">Text Align:</label>
			<select id="text-align">
			<option value="" selected="selected">Left</option>
			<option value="text-right">Right</option>
			<option value="text-center">Center</option>
		</select>

		<label class="shortcode-labels" for="box-type">Box Type:</label>
			<select id="box-type">
			<option value="" selected="selected">Normal</option>
			<option value="alert-box">Alert</option>
			<option value="info-box">Info</option>
			<option value="error-box">Error</option>
		</select>

		<label class="shortcode-labels" for="action-box-text">Action Box Text:</label>
		<textarea class="action-box-text" id="action-box-text" name="action-box-text" cols="95" rows="10" placeholder="enter the action box text, or leave blank here and insert a shortode later instead..."></textarea>

	</form>
<br />
<a id="" href="" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {

	// stores text align
	$("#text-align").change(function () {
			text_align = $("#text-align option:selected").val()
		$(this).each(function () {
			text_align = $(this).val();
		});
		})
	.change();

	// stores box type
	$("#box-type").change(function () {
			box_type = $("#box-type option:selected").val()
		$(this).each(function () {
			box_type = $(this).val();
		});
		})
	.change();

	// store action box text
	$('#action-box-text').on("keyup change", function() {
		action_box_text = $("#action-box-text").val();
	});
		if (action_box_text === undefined) {
			var action_box_text = "";
	}


// insert accordion shortcode
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[action-box class="'+text_align+' '+box_type+'"]'+action_box_text+'[/action-box]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>