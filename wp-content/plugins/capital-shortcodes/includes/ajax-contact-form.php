<div id="popup_container contact-form">
    <br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>insert contact form</h3>
<label class="shortcode-labels" for="contact-email">Your Email:</label>
<input class="shortcode-text-inputs" type="text" id="contact-email" name="email-address" placeholder="youremail@domain.com" />
<br />
<a href="#" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {
// saves input value into a variable
   $('#contact-email').on("keyup change", function() {
      contact_email = $("#contact-email").val();
   });
   if (contact_email === undefined) {
		var contact_email = "youremail@domain.com";
   }

// insert contact form
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[capital-contact email="'+contact_email+'"]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>