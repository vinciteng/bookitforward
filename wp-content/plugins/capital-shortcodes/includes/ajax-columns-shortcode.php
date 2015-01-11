<div id="popup_container columns-shortcode">
	<br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>insert Columns shortcode</h3>

    <label class="shortcode-labels" for="select-column-size">Select Column Size:</label>
  	<select id="select-column-size">
	  <option value="one-third" selected="selected">One Third</option>
	  <option value="one-third-last-column">One Third Last</option>
	  <option value="two-third">Two Third</option>
	  <option value="two-third-last-column">Two Third Last</option>
	  <option value="one-half">One Half</option>
	  <option value="one-half-last-column">One Half Last</option>
	  <option value="one-forth">One Forth</option>
	  <option value="one-forth-last-column">One Forth Last</option>
	  <option value="three-forth">Three Forth</option>
	  <option value="three-forth-last-column">Three Forth Last</option>
	  <option value="one-fifth">One Fifth</option>
	  <option value="one-fifth-last-column">One Fifth Last</option>
	  <option value="two-fifth">Two Fifth</option>
	  <option value="two-fifth-last-column">Two Fifth Last</option>
	  <option value="three-fifth">Three Fifth</option>
	  <option value="three-fifth-last-column">Three Fifth Last</option>
	  <option value="four-fifth">Four Fifth</option>
	  <option value="four-fifth-last-column">Four Fifth Last</option>
	  <option value="one-sixth">One Sixth</option>
	  <option value="one-sixth-last-column">One Sixth Last</option>
	  <option value="five-sixth">Five Sixth</option>
	  <option value="five-sixth-last-column">Five Sixth Last</option>
	</select>

	<label class="shortcode-labels" for="column-content">Column Content:</label>
	<textarea class="shortcode-text-textarea" id="column-content" name="column-content" cols="58" rows="10" placeholder="column content"></textarea>

<br />
<a id="" href="" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {

	// stores button size oprions into a variable
	$("#select-column-size").change(function () {
			select_column_size = $("#select-column-size option:selected").val()
	   $(this).each(function () {
            select_column_size = $(this).val();
	   });
	   })
	.change();

	// store accordion content in a variable
	$('#column-content').on("keyup change", function() {
		column_content = $("#column-content").val();
	});
		if (column_content === undefined) {
			var column_content = "Column Content";
	}

// insert accordion shortcode
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[capital_columns column_type="'+select_column_size+'"] '+column_content+' [/capital_columns]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>