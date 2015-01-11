<div id="popup_container border-line-shortcode">
		<br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>Border Line Shortcode</h3>
	<form id="inputs" accept-charset="utf-8">

		<label class="shortcode-labels" for="border-line-size">Size:</label>
			<select id="border-line-size">
			<option value="large" selected="selected">Large</option>
			<option value="small">Small</option>
			<option value="full-width">Full Width</option>
		</select>

		<label class="shortcode-labels" for="border-line-style">Style:</label>
			<select id="border-line-style">
			<option value="special" selected="selected">Special</option>
			<option value="simple">Simple</option>
		</select>

	</form>
<br />
<a id="" href="" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {

	// stores border line size
	$("#border-line-size").change(function () {
			border_line_size = $("#border-line-size option:selected").val()
		$(this).each(function () {
			border_line_size = $(this).val();
		});
		})
	.change();

	// stores border line style
	$("#border-line-style").change(function () {
			border_line_style = $("#border-line-style option:selected").val()
		$(this).each(function () {
			border_line_style = $(this).val();
		});
		})
	.change();

// insert accordion shortcode
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[border-line class="'+border_line_size+' '+border_line_style+'"]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>