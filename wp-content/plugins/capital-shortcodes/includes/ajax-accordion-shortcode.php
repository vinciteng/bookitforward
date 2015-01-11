<div id="popup_container accordions-shortcode">
		<br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>insert accordion shortcode</h3>
	<label class="shortcode-labels" for="accordion-title">Accordion Title:</label>
	<input class="shortcode-text-inputs" type="text" id="accordion-title" name="accordion-title" placeholder="accordion title" />

	<label class="shortcode-labels" for="accordion-content">Accordion Content:</label>
	<textarea class="shortcode-text-textarea" id="accordion-content" name="accordion-content" cols="58" rows="10" placeholder="accordion content"></textarea>

	<label class="shortcode-labels" for="accordion-title-2">Accordion Title-2:</label>
	<input class="shortcode-text-inputs" type="text" id="accordion-title-2" name="accordion-title-2" placeholder="accordion title-2" />

	<label class="shortcode-labels" for="accordion-content-2">Accordion Content-2:</label>
	<textarea class="shortcode-text-textarea" id="accordion-content-2" name="accordion-content-2" cols="58" rows="10" placeholder="accordion content-2"></textarea>

<br />
<a id="" href="" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {
	// store accordion title in a variable
	$('#accordion-title').on("keyup change", function() {
		accordion_title = $("#accordion-title").val();
	});
		if (accordion_title === undefined) {
			var accordion_title = "Accordion Title";
	}

	$('#accordion-title-2').on("keyup change", function() {
		accordion_title_2 = $("#accordion-title-2").val();
	});
		if (accordion_title_2 === undefined) {
			var accordion_title_2 = "Accordion Title 2";
	}

	// store accordion content in a variable
	$('#accordion-content').on("keyup change", function() {
		accordion_content = $("#accordion-content").val();
	});
		if (accordion_content === undefined) {
			var accordion_content = "Accordion content";
	}

	// store accordion content in a variable
	$('#accordion-content-2').on("keyup change", function() {
		accordion_content_2 = $("#accordion-content-2").val();
	});
		if (accordion_content_2 === undefined) {
			var accordion_content_2 = "Accordion content 2";
	}

// insert accordion shortcode
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[capital_accordions] <br> [accordion title="'+accordion_title+'"] '+accordion_content+' [/accordion] <br> [accordion title="'+accordion_title_2+'"] '+accordion_content_2+' [/accordion] <br> [/capital_accordions]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>