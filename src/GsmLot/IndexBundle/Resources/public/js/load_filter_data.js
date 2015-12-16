/**
 * Brand change event
 */
$(document).ready(function() {

	$('#offer_filter_brand').change(function() {

		var brand_id = $('#offer_filter_brand').val();

		if (brand_id == '') {

			$('#offer_filter_model').html('<option value></option>');
		}

		else {
			$.get(Routing.generate('brand_load_model', {
				'brand_id' : brand_id
			})).done(function(data) {

				$('#offer_filter_model').html(data);

			});
		}
	});
	
	$('#offer_filter_country').change(function() {

		var country_id = $('#offer_filter_country').val();

		if (country_id == '') {

			$('#offer_filter_city').html('<option value></option>');
		}

		else {
			$.get(Routing.generate('country_load_city', {
				'country_id' : country_id
			})).done(function(data) {

				$('#offer_filter_city').html(data);

			});
		}
	});
	
});