<div id="popup_container">
    <br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>google docs viewer</h3>
<label class="shortcode-labels" for="document-url">Document URL:</label>
<input class="shortcode-text-inputs" type="text" id="document-url" name="document-url" placeholder="http://domain.com/path-to-document.pdf" />

<label class="shortcode-labels" for="link-text">Link Text:</label>
<input class="shortcode-text-inputs" type="text" id="link-text" name="link-text" placeholder="your link text" />


<br />
<a href="#" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {
    // saves url input value into a variable
   $('#document-url').on("keyup change", function() {
      document_url = $("#document-url").val();
   });
   if (document_url === undefined) {
		var document_url = "http://domain.com/path-to-document.pdf";
   }

   // saves link text input value into a variable
   $('#link-text').on("keyup change", function() {
      link_text = $("#link-text").val();
   });
   if (link_text === undefined) {
    var link_text = "Link Text";
   }

// insert contact form
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[pdf='+document_url+']'+link_text+'[/pdf]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>