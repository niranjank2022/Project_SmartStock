$(function () {

	$(document).on('click', '#editRecordButton', function (e) {
		e.preventDefault();
		var item_id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'action.php',
			dataType: 'JSON',
			data: {
				item_id: item_id,
				editItem: ''
			},
			success: function (response) {
				if (response.done == true) {
					$('#display-edit-item-name').html(response.item_name);
					$('#edit-item-id').val(response.item_id);
					$('#edit-item-name').val(response.item_name);
					$('#edit-item-description').val(response.description);
					$('#edit-purchase-year').val(response.year);
					$('#edit-purchase-value').val(response.price);
					$('#edit-depr-rate').val(response.depr_rate);
					$('#edit-no-of-items').val(response.no_of_items);
					$('#edit-location').val(response.location);
					$('#edit-condition').val(response.condition);
				} else {
					$('.edit_response').html('<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' + response.result + '</div>');
				}
			},
			error: function (xhr, status, error) {
				let errorMessage = 'An error occurred while processing your request. Please try again later.';
				if (xhr.status === 0) {
					errorMessage = 'Cannot connect to the server. Please check your internet connection.';
				} else if (xhr.status >= 400 && xhr.status < 500) {
					errorMessage = 'Client error: ' + xhr.status + ' ' + xhr.statusText;
				} else if (xhr.status >= 500 && xhr.status < 600) {
					errorMessage = 'Server error: ' + xhr.status + ' ' + xhr.statusText;
				}

				$('.edit_response').html('<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' + errorMessage + '</div>');
				console.error('AJAX error:', status, error);
			}
		});
	})

	$(document).on('click', '#deleteRecordButton', function (e) {
		e.preventDefault();
		var item_id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'action.php',
			dataType: 'JSON',
			data: {
				item_id: item_id,
				deleteItem: ''
			},
			success: function (response) {
				if (response.done == true) {
					$('#display-delete-item-name').html(response.item_name);
					$('#delete-item-id').val(response.item_id);
					$('#delete-item-name').val(response.item_name);
				} else {
					$('.edit_response').html('<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' + response.result + '</div>');
				}
			},
			error: function (xhr, status, error) {
				let errorMessage = 'An error occurred while processing your request. Please try again later.';
				if (xhr.status === 0) {
					errorMessage = 'Cannot connect to the server. Please check your internet connection.';
				} else if (xhr.status >= 400 && xhr.status < 500) {
					errorMessage = 'Client error: ' + xhr.status + ' ' + xhr.statusText;
				} else if (xhr.status >= 500 && xhr.status < 600) {
					errorMessage = 'Server error: ' + xhr.status + ' ' + xhr.statusText;
				}

				$('.edit_response').html('<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' + errorMessage + '</div>');
				console.error('AJAX error:', status, error);
			}
		});
	})

	$(document).on('change', '#item-id', function () {
		var selectedOption = $(this).val();
		console.log("Hello", selectedOption);
		$('#new-item-content').empty(); // Clear the container

		if (selectedOption == '-1') {
			$('#new-item-content').append('<label for="item-name">Item Name: </label><input name="item-name" type="text" class="form-control">');
			$('#new-item-content').append('<div class="form-group"><label for="item-description">Item Description: </label><input name="item-description" type="text" class="form-control"></div>');
			$('#new-item-content').append('<div class="form-group"><label for="purchase-year">Purchase Year: </label><input name="purchase-year" type="text" class="form-control"></div>');
			$('#new-item-content').append('<div class="form-group"><label for="purchase-value">Purchase Value: </label><input name="purchase-value" type="text" class="form-control"></div>');
			$('#new-item-content').append('<div class="form-group"><label for="depr-rate">Depreciation Rate: </label><input name="depr-rate" type="text" class="form-control"></div>');
		} else if (selectedOption === '') {

		}
		
	})
});