<div id="popup_container tabs-shortcode">
      <br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>insert tabs shortcode</h3>
   <label class="shortcode-labels" for="tab1-title">Tab1 Title:</label>
   <input class="shortcode-text-inputs" type="text" id="tab1-title" name="tab1-title" placeholder="tab1 title" />

   <label class="shortcode-labels" for="tab1-content">Tab1 Content:</label>
   <textarea class="shortcode-text-textarea" id="tab1-content" name="tab1-content" cols="58" rows="10" placeholder="tab1 content"></textarea>

   <label class="shortcode-labels" for="tab2-title">Tab2 Title:</label>
   <input class="shortcode-text-inputs" type="text" id="tab2-title" name="tab2-title" placeholder="tab2 title" />

   <label class="shortcode-labels" for="tab2-content">Tab2 Content:</label>
   <textarea class="shortcode-text-textarea" id="tab2-content" name="tab2-content" cols="58" rows="10" placeholder="tab2 content"></textarea>
<br />
<a id="" href="" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {
   // stores tab1 title values into a variable
   $('#tab1-title').on("keyup change", function() {
      tab1_content = $("#tab1-title").val();
   });
      if (tab1_title === undefined) {
         var tab1_title = "Tab1 Title";
   }

   // store tab1 content in a variable
   $('#tab1-content').on("keyup change", function() {
      tab1_content = $("#tab1-content").val();
   });
      if (tab1_content === undefined) {
         var tab1_content = "Tab1 content";
   }

   // stores tab2 title values into a variable
   $('#tab2-title').on("keyup change", function() {
      tab2_title = $("#tab2-title").val();
   });
      if (tab2_title === undefined) {
         var tab2_title = "Tab2 Title";
   }

   // store tab2 content in a variable
   $('#tab2-content').on("keyup change", function() {
      tab2_content = $("#tab2-content").val();
   });
      if (tab2_content === undefined) {
         var tab2_content = "Tab2 content";
   }

// insert tabs shortcode
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[capital_tabs] <br> [capital_tab title="'+tab1_title+'"] '+tab1_content+' [/capital_tab] <br> [capital_tab title="'+tab2_title+'"] '+tab2_content+' [/capital_tab] <br> [/capital_tabs]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>