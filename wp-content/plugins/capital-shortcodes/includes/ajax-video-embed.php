<div id="popup_container tabs-shortcode">
    <br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>insert video embed shortcode</h3>

   <label class="shortcode-labels" for="video-source">Video Source Site:</label>
   <select id="video-source">
     <option value="youtube" selected="selected">Youtube</option>
     <option value="vimeo">vimeo</option>
     <option value="dailymotion">dailymotion</option>
     <option value="yahoo">yahoo</option>
     <option value="bliptv">bliptv</option>
     <option value="veoh">veoh</option>
     <option value="viddler">viddler</option>
   </select>


   <label class="shortcode-labels" for="video-id">Video ID:</label>
   <input class="shortcode-text-inputs" type="text" id="video-id" name="video-id" placeholder="your video id" />

   <label class="shortcode-labels" for="video-width">Video Width:</label>
   <input class="shortcode-text-inputs" type="text" id="video-width" name="video-width" placeholder="insert video width" />

   <label class="shortcode-labels" for="video-height">Video Height:</label>
   <input class="shortcode-text-inputs" type="text" id="video-height" name="video-height" placeholder="insert video height" />

<br />
<a id="" href="" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {

    // stores video source into a variable
   $("#video-source").change(function () {
         video_source = $("#video-source option:selected").val()
      $(this).each(function () {
            video_source = $(this).val();
      });
      })
   .change();

   // stores video id values into a variable
   $('#video-id').on("keyup change", function() {
      video_id = $("#video-id").val();
   });
      if (video_id === undefined) {
         var video_id = "";
   }

   // stores video url width into a variable
   $('#video-width').on("keyup change", function() {
      video_width = $("#video-width").val();
   });
      if (video_width === undefined) {
         var video_width = "";
   }

   // stores video height into a variable
   $('#video-height').on("keyup change", function() {
      video_height = $("#video-height").val();
   });
      if (video_height === undefined) {
         var video_height = "";
   }

// insert video shortcode
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[video site="'+video_source+'" id="'+video_id+'" w="'+video_width+'" h="'+video_height+'"]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>