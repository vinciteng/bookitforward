<div id="popup_container featured-box-shortcode">
		<br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>Featured Box Shortcode</h3>
	<form id="inputs" accept-charset="utf-8">

		<label class="shortcode-labels" for="text-align">Text Align:</label>
			<select id="text-align">
			<option value="">Left</option>
			<option value="text-right">Right</option>
			<option value="text-center" selected="selected">Center</option>
		</select>

		<label class="shortcode-labels" for="featured-box-title">Featured Box Title:</label>
		<input class="shortcode-text-inputs" type="text" id="featured-box-title" name="featured-box-title" placeholder="Insert Featired Box Title" />

		<label class="shortcode-labels" for="background-image-uri">Background Image URI:</label>
		<input class="shortcode-text-inputs" type="text" id="background-image-uri" name="background-image-uri" placeholder="Pate in background image URI" />

		<label class="shortcode-labels" for="featured-box-text">Featured Box Text:</label>
		<textarea class="featured-box-text" id="featured-box-text" name="featured-box-text" cols="95" rows="10" placeholder="enter the featured box text, or leave blank here and insert a shortode later instead..."></textarea>

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

	// store featured box title
	$('#featured-box-title').on("keyup change", function() {
		featured_box_title = $("#featured-box-title").val();
	});
		if (featured_box_title === undefined) {
			var featured_box_title = "Featured Box Title";
	}

	// store background image uri
	$('#background-image-uri').on("keyup change", function() {
		background_image_uri = $("#background-image-uri").val();
	});
		if (background_image_uri === undefined) {
			var background_image_uri = "";
	}

	// store featured box text
	$('#featured-box-text').on("keyup change", function() {
		featured_box_text = $("#featured-box-text").val();
	});
		if (featured_box_text === undefined) {
			var featured_box_text = "";
	}


// insert accordion shortcode
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[featured-box title="'+featured_box_title+'" class="'+text_align+'"  image_url="'+background_image_uri+'"]'+featured_box_text+'[/featured-box]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>