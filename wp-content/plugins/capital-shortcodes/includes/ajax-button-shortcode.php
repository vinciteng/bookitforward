<div id="popup_container buttons-shortcode">
		<br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>insert Buttons shortcode</h3>
	<label class="shortcode-labels" for="button-text">Button Text:</label>
	<input class="shortcode-text-inputs" type="text" id="button-text" name="button-text" placeholder="button text" />

	<label class="shortcode-labels" for="button-url">Button URL:</label>
	<input class="shortcode-text-inputs" type="text" id="button-url" name="button-url" placeholder="button url" />

    <label class="shortcode-labels" for="select-button-size">Select Button Size:</label>
  	<select id="select-button-size">
	  <option value="medium" selected="selected">Medium</option>
	  <option value="large">Large</option>
	  <option value="small">Small</option>
	</select>

	<label class="shortcode-labels" for="select-button-color">Select Button Color:</label>
  	<select id="select-button-color">
		<option value="violet" selected="selected">Violet</option>
		<option value="black">Black</option>
		<option value="salmon">Salmon</option>
		<option value="yellow">Yellow</option>
		<option value="green">Green</option>
		<option value="blue">Blue</option>
		<option value="crimson">Crimson</option>
		<option value="dark-blue">Dark blue</option>
		<option value="brown">Brown</option>
		<option value="white">White</option>
		<option value="transparent">transparent</option>
		<option value="orange-gradient">Orange (gradient)</option>
	</select>

	<br />

	<label class="shortcode-labels" for="select-button-type">Select Button Type:</label>
  	<select id="select-button-type">
		<option value="rounded" selected="selected">Rounded</option>
		<option value="square">Square</option>
	</select>

	<br />

	<label class="shortcode-labels" for="select-button-target">Select Button Target:</label>
  	<select id="select-button-target">
		<option value="_blank">Open in a new window/tab</option>
		<option value="_self" selected="selected">Open in the same window</option>
	</select>

	<br />

<br />
<a id="" href="" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {
	// store button text in a variable
	$('#button-text').on("keyup change", function() {
		button_text = $("#button-text").val();
	});
		if (button_text === undefined) {
			var button_text = "Button Text";
	}

	// store button URL in a variable
	$('#button-url').on("keyup change", function() {
		button_url = $("#button-url").val();
	});
		if (button_url === undefined) {
			var button_url = "#";
	}

	// stores button size oprions into a variable
	$("#select-button-size").change(function () {
			select_button_size = $("#select-button-size option:selected").val()
	   $(this).each(function () {
            select_button_size = $(this).val();
	   });
	   })
	.change();

	// stores button color oprions into a variable
	$("#select-button-color").change(function () {
			select_button_color = $("#select-button-color option:selected").val()
	   $(this).each(function () {
            select_button_color = $(this).val();
	   });
	   })
	.change();

	// stores button type oprions into a variable
	$("#select-button-type").change(function () {
			select_button_type = $("#select-button-type option:selected").val()
	   $(this).each(function () {
            select_button_type = $(this).val();
	   });
	   })
	.change();

	// stores button target oprions into a variable
	$("#select-button-target").change(function () {
			select_button_target = $("#select-button-target option:selected").val()
	   $(this).each(function () {
            select_button_target = $(this).val();
	   });
	   })
	.change();

// insert accordion shortcode
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[capital_button url="'+button_url+'" target="'+select_button_target+'" color="'+select_button_color+'" size="'+select_button_size+'" type="'+select_button_type+'"] '+button_text+' [/capital_button]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>