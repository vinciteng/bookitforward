<div id="popup_container">
    <br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>insert secure email address</h3>
<label class="shortcode-labels" for="secure-email">Your Email:</label>
<input class="shortcode-text-inputs" type="text" id="secure-email" name="secure-email-address" placeholder="youremail@domain.com" />
<br />
<a href="#" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {
// saves input value into a variable
   $('#secure-email').on("keyup change", function() {
      secure_email = $("#secure-email").val();
   });
   if (secure_email === undefined) {
		var secure_email = "youremail@domain.com";
   }

// insert contact form
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[secure-email]'+secure_email+'[/secure-email]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>