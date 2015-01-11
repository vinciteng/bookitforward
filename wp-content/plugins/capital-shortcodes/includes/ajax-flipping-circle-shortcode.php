<div id="popup_container flipping-circle-shortcode">
		<br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>Flipping Circle Shortcode</h3>
	<form id="inputs" accept-charset="utf-8">

		<label class="shortcode-labels" for="background-image-uri">Background Image URI:</label>
		<input class="shortcode-text-inputs" type="text" id="background-image-uri" name="background-image-uri" placeholder="Paste in background image URI" />

		<label class="shortcode-labels" for="title">Title:</label>
		<input class="shortcode-text-inputs" type="text" id="title" name="title" placeholder="Insert Circle Title" />

		<label class="shortcode-labels" for="description-text">Description Text:</label>
		<input class="shortcode-text-inputs" type="text" id="description-text" name="description-text" placeholder="Insert Description Text" />

		<label class="shortcode-labels" for="link-text">Link Text:</label>
		<input class="shortcode-text-inputs" type="text" id="link-text" name="link-text" placeholder="Insert link text" />

		<label class="shortcode-labels" for="link-url">Link URL:</label>
		<input class="shortcode-text-inputs" type="text" id="link-url" name="link-url" placeholder="Insert link URL" />

	</form>
<br />
<a id="" href="" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {

	// store background image uri
	$('#background-image-uri').on("keyup change", function() {
		background_image_uri = $("#background-image-uri").val();
	});
		if (background_image_uri === undefined) {
			var background_image_uri = "";
	}

	// store title
	$('#title').on("keyup change", function() {
		title = $("#title").val();
	});
		if (title === undefined) {
			var title = "Title Here";
	}

	// store description text
	$('#description-text').on("keyup change", function() {
		description_text = $("#description-text").val();
	});
		if (description_text === undefined) {
			var description_text = "description here";
	}

	// store link text
	$('#link-text').on("keyup change", function() {
		link_text = $("#link-text").val();
	});
		if (link_text === undefined) {
			var link_text = "View More";
	}

	// store link url
	$('#link-url').on("keyup change", function() {
		link_url = $("#link-url").val();
	});
		if (link_url === undefined) {
			var link_url = "#";
	}

// insert accordion shortcode
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[flipping-circle link_text="'+link_text+'" link_url="'+link_url+'" description="'+description_text+'" title="'+title+'" image_url="'+background_image_uri+'"]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>