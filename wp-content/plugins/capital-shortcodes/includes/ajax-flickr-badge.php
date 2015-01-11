<div id="popup_container tabs-shortcode">
    <br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>insert flickr badge shortcode</h3>
   <label class="shortcode-labels" for="image-count">Count:</label>
   <input class="shortcode-text-inputs" type="text" id="image-count" name="image-count" placeholder="Insert number of images to display" />

   <label class="shortcode-labels" for="flickr-user">From User:</label>
   <input class="shortcode-text-inputs" type="text" id="flickr-user" name="flickr-user" placeholder="insert your flickr user ID" />

   <label class="shortcode-labels" for="flickr-tag">Tag:</label>
   <input class="shortcode-text-inputs" type="text" id="flickr-tag" name="flickr-tag" placeholder="insert your flickr photo tag" />

   <label class="shortcode-labels" for="select-soure">Source:</label>
   <select id="select-soure">
     <option value="user" selected="selected">user</option>
     <option value="user_tag">user_tag</option>
     <option value="user_set">user_set</option>
     <option value="group">group</option>
     <option value="group_tag">group_tag</option>
     <option value="all">all</option>
     <option value="all_tag">all_tag</option>
   </select>

   <label class="shortcode-labels" for="select-display">Display:</label>
   <select id="select-display">
     <option value="latest" selected="selected">latest</option>
     <option value="random">random</option>
   </select>

   <label class="shortcode-labels" for="select-size">Size:</label>
   <select id="select-size">
     <option value="s" selected="selected">square (cropped)</option>
     <option value="t">thumbnail</option>
     <option value="m">medium</option>
   </select>

<br />
<a id="" href="" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {
   // stores count values into a variable
   $('#image-count').on("keyup change", function() {
      image_count = $("#image-count").val();
   });
      if (image_count === undefined) {
         var image_count = "8";
   }

   // stores flickr user iD values into a variable
   $('#flickr-user').on("keyup change", function() {
      flickr_user = $("#flickr-user").val();
   });
      if (flickr_user === undefined) {
         var flickr_user = "";
   }

   // stores flickr photo tag values into a variable
   $('#flickr-tag').on("keyup change", function() {
      flickr_tag = $("#flickr-tag").val();
   });
      if (flickr_tag === undefined) {
         var flickr_tag = "";
   }

   // stores photo source oprions into a variable
   $("#select-soure").change(function () {
         select_soure = $("#select-soure option:selected").val()
      $(this).each(function () {
            select_soure = $(this).val();
      });
      })
   .change();

   // stores photo display oprions into a variable
   $("#select-display").change(function () {
         select_display = $("#select-display option:selected").val()
      $(this).each(function () {
            select_display = $(this).val();
      });
      })
   .change();

   // stores photo size oprions into a variable
   $("#select-size").change(function () {
         select_size = $("#select-size option:selected").val()
      $(this).each(function () {
            select_size = $(this).val();
      });
      })
   .change();

// insert tabs shortcode
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[flickrbadge count="'+image_count+'" display="'+select_display+'" size="'+select_size+'" source="'+select_soure+'" user="'+flickr_user+'" tag="'+flickr_tag+'"]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>