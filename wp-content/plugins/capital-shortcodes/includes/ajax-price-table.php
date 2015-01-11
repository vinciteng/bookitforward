<div id="popup_container price-table-shortcode">
		<br>
<a href='../wp-content/plugins/capital-shortcodes/ajax-shortcodes.php?' title="Capital Shortcodes" class='button thickbox'>← Go Back</a>
  <h3>Insert Price Table shortcode</h3>
	<form id="inputs" accept-charset="utf-8">

		<label class="shortcode-labels" for="plan-columns">Price Plan Columns:</label>
			<select id="plan-columns">
			<option value="two">2 Columns</option>
			<option value="three">3 Columns</option>
			<option value="four" selected="selected">4 Columns</option>
			<option value="five">5 Columns</option>
		</select>

		<label class="shortcode-labels" for="table-title">Table Title:</label>
		<input class="shortcode-text-inputs" type="text" id="table-title" name="table-title" placeholder="Table Title" />

		<label class="shortcode-labels" for="table-state">Select Table State:</label>
			<select id="table-state">
			<option value="" selected="selected">Simple</option>
			<option value="featured">Featured</option>
		</select>

		<br />

		<label class="shortcode-labels" for="table-price">Table Price:</label>
		<input class="shortcode-text-inputs" type="text" id="table-price" name="table-price" placeholder="Table Price" />

		<label class="shortcode-labels" for="button-title">Button Title:</label>
		<input class="shortcode-text-inputs" type="text" id="button-title" name="button-title" placeholder="Button Title" />

		<label class="shortcode-labels" for="button-link">Button Link:</label>
		<input class="shortcode-text-inputs" type="text" id="button-link" name="button-link" placeholder="Button Link" />

		<label class="shortcode-labels" for="plan-feature">Plan Feature:</label>
		<input class="shortcode-text-inputs" type="text" id="plan-feature" name="plan-feature" placeholder="Plan Feature" />

	</form>
<br />
<a id="" href="" class="insert-shortcode button button-primary button-large" >insert shortcode</a>
</div>

<script>
(function ($) {

	// stores table state
	$("#plan-columns").change(function () {
			plan_columns = $("#plan-columns option:selected").val()
		$(this).each(function () {
			plan_columns = $(this).val();
		});
		})
	.change();

	// store table title
	$('#table-title').on("keyup change", function() {
		table_title = $("#table-title").val();
	});
		if (table_title === undefined) {
			var table_title = "BASIC";
	}

	// stores table state
	$("#table-state").change(function () {
			table_state = $("#table-state option:selected").val()
		$(this).each(function () {
			table_state = $(this).val();
		});
		})
	.change();

	// store table price
	$('#table-price').on("keyup change", function() {
		table_price = $("#table-price").val();
	});
		if (table_price === undefined) {
			var table_price = "$00";
	}

	// store button title
	$('#button-title').on("keyup change", function() {
		button_title = $("#button-title").val();
	});
		if (button_title === undefined) {
			var button_title = "BUY NOW";
	}

	// store button link
	$('#button-link').on("keyup change", function() {
		button_link = $("#button-link").val();
	});
		if (button_link === undefined) {
			var button_link = "#";
	}

	// store plan feture
	$('#plan-feature').on("keyup change", function() {
		plan_feature = $("#plan-feature").val();
	});
		if (plan_feature === undefined) {
			var plan_feature = "insert plan feature here";
	}

// insert accordion shortcode
$('.insert-shortcode').click (function() {
	tinymce.activeEditor.execCommand('mceInsertContent',false,'[pricing-plans columns="'+plan_columns+'"] <br> [price-table title="'+table_title+'" state="'+table_state+'" price="'+table_price+'" button_title="'+button_title+'" button_link="'+button_link+'"] <br> [plan-feature] '+plan_feature+' [/plan-feature] <br> [/price-table] <br> [/pricing-plans]');
	tb_remove(); // remove the thickbox after inserting the shortcode
	return false;
});
})(jQuery);
</script>