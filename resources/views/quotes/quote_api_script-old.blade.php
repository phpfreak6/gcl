<script>
    $(function(){
        $('#getQuote').click(function() {
            var formData = new FormData($('#quoteForm')[0]);
            var $button = $(this);

            $.ajax({
                url: '/quotes/get-quote',
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: function() {
                    // Show loading state
                    $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
                    $button.prop('disabled', true);
                },
                complete: function() {
                    // Restore the button state
                    $button.html('Get Quote');
                    $button.prop('disabled', false);
                },
                success: function(response) {
                    removeErrors();

                    var quotes = response; // Assuming response is an array of quotes

                    // Clear previous rows
                    $('#quoteTableBody').empty();

                    // Loop through quotes and generate rows
                    quotes.forEach(function(quote) {
                        var row = '<tr>' +
                            '<td>' + quote.courier + '</td>' +
                            '<td>' + quote.service_name + '</td>' +
                            '<td>' + quote.price.total + '</td>' +
                            '<td><button class="btn btn-primary selectQuote" data-id="'+quote.service_code+'" data-courier="'+quote.courier+'">Select</button></td>' +
                            '</tr>';

                        $('#quoteTableBody').append(row);
                    });

                    // Show the table
                    $('#quoteTable').show();

                    // Scroll to the table
                    $('html, body').animate({
                        scrollTop: $('#quoteTable').offset().top
                    }, 200);
                },
                error: function(response) {
                    if (response.status === 422) {
                        var errors = response.responseJSON.errors;
                        showErrors(errors);
                    }
                }
            });
        });
        $(document).on('click', '.selectQuote', function(e) {
            e.preventDefault();

            $('#addressFields').show();

            // set courier, id
            $('[name="preset_id"]').val($(this).data('id'));
            $('[name="courier"]').val($(this).data('courier'));

            $('html, body').animate({
                scrollTop: $('#addressFields').offset().top
            }, 200);
        });
        $('#generate_label').click(function(e) {
            var formData = new FormData($('#quoteForm')[0]);
            var $button = $(this);

            $.ajax({
                url: '/quotes/quote/generate-label',
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: function() {
                    // Show loading state
                    $button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
                    $button.prop('disabled', true);
                },
                complete: function() {
                    // Restore the button state
                    $button.html('Generate Label');
                    $button.prop('disabled', false);
                },
                success: function(response) {
                    removeErrors();

                    if(response){
                        $('.view-label').attr('href',response.uri);
                        $('#generatedLabel').show();
                        $('html, body').animate({
                            scrollTop: $('#generatedLabel').offset().top
                        }, 200);
                    }
                },
                error: function(response) {
                    removeErrors();

                    if (response.status === 422) {
                        var errors = response.responseJSON.errors;
                        showErrors(errors);
                    }else{
                        $('#addressFields').prepend(`
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Something went wrong, please try again later.</strong>
                        </div>`);
                    }
                }
            });
        });
    });
    function showErrors(errors) {
        removeErrors();

        for (var field in errors) {
            var errorMessage = errors[field][0];
            var fieldName = field;
            if (fieldName === 'country' || fieldName === 'postal' || fieldName.startsWith('ship_to_')) {
                $('[name="' + fieldName + '"]').addClass('is-invalid');
                $('[name="' + fieldName + '"]').after('<div class="invalid-feedback">' + errorMessage + '</div>');
            } else {
                if (Array.isArray(errors[field])) {
                    var fieldArray = field.split('.');
                    var fieldName = fieldArray[0] + '[]';
                    var fieldIndex = fieldArray[1];
                    $('[name="' + fieldName + '"]:eq(' + fieldIndex + ')').addClass('is-invalid');
                    $('[name="' + fieldName + '"]:eq(' + fieldIndex + ')').after('<div class="invalid-feedback">' + errorMessage + '</div>');
                } else {
                    $('[name="' + field + '"]').addClass('is-invalid');
                    $('[name="' + field + '"]').after('<div class="invalid-feedback">' + errorMessage + '</div>');
                }
            }
        }
    }
    function removeErrors() {
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').remove();
        $('#addressFields .alert').remove();
    }
</script>
