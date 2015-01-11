<div id="popup_container google-maps">
      <br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>insert google maps data</h3>
<label class="shortcode-labels" for="map-source">Map Source Link:</label>
<input class="shortcode-text-inputs" type="text" id="map-source" name="map-source" placeholder="http://yourmapsourclink.com" />
<label class="shortcode-labels" for="map-width">Map Width:</label>
<input class="shortcode-text-inputs" type="text" id="map-width" name="map-width" placeholder="600" />
<label class="shortcode-labels" for="map-height">Map Height:</label>
<input class="shortcode-text-inputs" type="text" id="map-height" name="map-height" placeholder="300" />
<br />
<a id="" href="" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {
// stores input values into a variable
   $('#map-source').on("keyup change", function() {
      map_source = $("#map-source").val();
   });
   if (map_source === undefined) {
		var map_source = "http://yourmapsourclink.com";
   }
   
   $('#map-width').on("keyup change", function() {
      map_width = $("#map-width").val();
   });
   if (map_width === undefined) {
		var map_width = "600";
   }
   
   $('#map-height').on("keyup change", function() {
      map_height = $("#map-height").val();
   });
   if (map_height === undefined) {
		var map_height = "300";
   }

// insert Google maps
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[googlemap width="'+map_width+'" height="'+map_height+'" src="'+map_source+'"]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>