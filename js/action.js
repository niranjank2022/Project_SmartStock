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
        error: function(xhr, status, error) {
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
