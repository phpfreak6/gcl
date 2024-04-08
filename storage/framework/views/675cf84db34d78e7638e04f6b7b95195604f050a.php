

<script>
    $('#customized-quantity').on('input', function() {
      var value=  parseInt($('#customized-quantity').val());
      if(value>0){
        $('.custom-pallet').prop('required', true);
    }
    else{
          $('.custom-pallet').prop('required', false);
      }
    })
    $('#customized-quantity').on('change', function() {
      var value=  parseInt($('#customized-quantity').val());
      if(value>0){
        $('.custom-pallet').prop('required', true);
    }
    else{
          $('.custom-pallet').prop('required', false);
      }
    })
// Attach event listeners to input fields
$('#micro-quantity, #medium-quantity, #large-quantity, #customized-quantity').on('input', function() {
    // Calculate total sum of quantities
    var microQuantity = parseInt($('#micro-quantity').val()) || 0;
    var mediumQuantity = parseInt($('#medium-quantity').val()) || 0;
    var largeQuantity = parseInt($('#large-quantity').val()) || 0;
    var customizedQuantity = parseInt($('#customized-quantity').val()) || 0;

    var totalQuantity = microQuantity + mediumQuantity + largeQuantity + customizedQuantity;
    if(parseInt(totalQuantity)<=0){
// $('#invalid-quantity').show();
}
else{
$('#invalid-quantity').hide();
}
$('#quantity-input').val(totalQuantity);
});
$('#micro-quantity, #medium-quantity, #large-quantity, #customized-quantity').on('change', function() {
    // Calculate total sum of quantities
    var microQuantity = parseInt($('#micro-quantity').val()) || 0;
    var mediumQuantity = parseInt($('#medium-quantity').val()) || 0;
    var largeQuantity = parseInt($('#large-quantity').val()) || 0;
    var customizedQuantity = parseInt($('#customized-quantity').val()) || 0;

    var totalQuantity = microQuantity + mediumQuantity + largeQuantity + customizedQuantity;
if(parseInt(totalQuantity)<=0){
// $('#invalid-quantity').show();
}
else{
$('#invalid-quantity').hide();
}
    $('#quantity-input').val(totalQuantity);
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const quoteForm = document.getElementById('quoteForm');

    quoteForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        if (!quoteForm.checkValidity()) {
            // Form has validation errors, stop the event propagation
            event.stopPropagation();
            toastr.error("Validation error. Please enter all required inputs.");
            quoteForm.classList.add('was-validated'); // Add 'was-validated' class to enable Bootstrap's styles
            return;
        }

        var quantity = parseFloat($('#quantity-input').val());
        if (quantity <= 0) {
            $('#invalid-quantity').show();
            return; // Stop further execution if quantity is not valid
        } else {
            $('#invalid-quantity').hide();
        }

        var element = $("#parcel-wrapper");

        if (element.hasClass("d-none")) {
            var weight = parseFloat($('#weight-input').val());
            if (weight <= 0) {
                $('#invalid-weight').show();
                return; // Stop further execution if weight is not valid
            } else {
                $('#invalid-weight').hide();
            }
        }

        // Get form data
        var formData = new FormData(quoteForm);

        // Submit the form using Ajax
        $.ajax({
            url: '<?php echo e(route('quote.get')); ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                   // Show loading state
                   $('#submitBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
                   $('#submitBtn').prop('disabled', true);
               },
               complete: function() {
                   // Restore the button state

               },
            success: function (response) {
                $('#submitBtn').html('GET A QUOTE');
                $('#submitBtn').prop('disabled', false);

                if (response.errors) {
                    toastr.error("Validation error. Please enter all required inputs.");
                } else if (response.error) {
                    toastr.error("Error: " + response.error);
                } else if (response.success.length > 0) {
                    $('#submitBtn').html('Redirecting...');
                $('#submitBtn').prop('disabled', true);
                    // Handle success, for example, redirect to a new page
                    window.location.href = '<?php echo e(route("quote.result")); ?>';

                    console.log(response.error);
                } else {

                    toastr.error("No quotes were found for the provided data. We apologize for the inconvenience.")
                }
            },
            error: function (xhr, status, error) {
                $('#submitBtn').html('GET A QUOTE');
                $('#submitBtn').prop('disabled', false);
                toastr.error("Ajax request error. Please try again.");
                console.error(xhr.responseText);
            }
        });
    });
});


</script>
<script>
$(document).ready(function() {
 // Initially, disable the quantity and weight fields and their increment/decrement buttons
 $('#quantity-input, #weight-input').prop('disabled', true);
   $('#quantity-minus, #quantity-plus, #weight-minus, #weight-plus').prop('disabled', true);

   // Check the delivery option on change and enable/disable fields and buttons accordingly
   $('#delivery-option').change(function() {

//         if ( $('#quantity-input').val()>0) {
//             if (!confirm("Are you sure you want to change delivery Type? Changes in current delivery type will not be saved.")) {
//                 return;
//             }
// }

    var selectedOption = $(this).val();

       if (selectedOption === 'Parcel') {
        $('#pallet-wrapper input').prop('required', false);
        $('#parrcel-wrapper input').prop('required', true);
        $('#package_type').val('parcel');

        var parcelQuantityCount = $('.parcel-quantity').length;
        $('#quantity-input').val(parcelQuantityCount);
        $('#quantity-plus').show();
        $('#quantity-minus').show();
        if(parseInt($('#quantity-input').val())<=0){
// $('#invalid-quantity').show();
}
else{


$('#invalid-quantity').hide();
}
$('#invalid-weight').hide();

           $('#quantity-input').prop('disabled', false);
           $('#quantity-minus, #quantity-plus').prop('disabled', false);
           $('#weight-input').prop('disabled', true);
           $('#pallet-wrapper').addClass('d-none');
           $('#parrcel-wrapper').removeClass('d-none');
           $('#carriers-wrapperr').removeClass('d-none');

           $('#weight-minus, #weight-plus').prop('disabled', true);
       } else if (selectedOption === 'Pallet') {
        $('#package_type').val('pallet');

        $('#parrcel-wrapper input').prop('required', false);
        var customx=$('#customized-quantity').val();
        if(parseInt(customx)>0){

            $('#pallet-wrapper input').prop('required', true);
        }
        if(parseInt($('#quantity-input').val())<=0){
// $('#invalid-quantity').show();
}
else{
$('#invalid-quantity').hide();
}
if(parseInt($('#weight-input').val())<=0){
// $('#invalid-weight').show();
}
else{
$('#invalid-weight').hide();
}
        $('#quantity-plus').hide();
        $('#quantity-minus').hide();
        var microQuantity = parseInt($('#micro-quantity').val()) || 0;
    var mediumQuantity = parseInt($('#medium-quantity').val()) || 0;
    var largeQuantity = parseInt($('#large-quantity').val()) || 0;
    var customizedQuantity = parseInt($('#customized-quantity').val()) || 0;

    var totalQuantity = microQuantity + mediumQuantity + largeQuantity + customizedQuantity;

    $('#quantity-input').val(totalQuantity);
    $('#invalid-quantity').hide();
           $('#carriers-wrapperr').removeClass('d-none');
           $('#quantity-input').prop('disabled', true);
           $('#quantity-minus, #quantity-plus').prop('disabled', true);

           $('#weight-input').prop('disabled', false);
           $('#weight-minus, #weight-plus').prop('disabled', false);
           $('#pallet-wrapper').removeClass('d-none');
           $('#parrcel-wrapper').addClass('d-none');
       } else {
           // Handle other options if necessary
       }
   });

// Update increment and decrement buttons when input fields change
$('#quantity-input, #weight-input').change(function() {
var quantityValue = $('#quantity-input').val();
var weightValue = $('#weight-input').val();

if (quantityValue <= 0) {
    $('#quantity-minus').prop('disabled', true);
    // $('#invalid-quantity').show(); // Show invalid quantity message
} else {
    $('#invalid-quantity').hide(); // Hide invalid quantity message
    $('#quantity-minus').prop('disabled', false);
}

if (weightValue <= 0) {
    $('#weight-minus').prop('disabled', true);
    // $('#invalid-weight').show(); // Show invalid weight message
} else {
    $('#invalid-weight').hide(); // Hide invalid weight message
    $('#weight-minus').prop('disabled', false);
}
});

});


// Initially hide the parcel-quantity div
$('#parrcel-wrapper').addClass('d-none');

// Keep track of the previous quantity
var previousQuantity = 1;

$('#quantity-input').change(function() {
var quantity = parseInt($(this).val());

// Check if the quantity is greater than 0
if (quantity > 0) {
    $('#parrcel-wrapper').removeClass('d-none');

    // Determine if the quantity increased or decreased
    if (quantity > previousQuantity) {
        // Quantity increased, add new parcel-quantity divs
        var parcelQuantityDivs = '';
        for (var i = previousQuantity + 1; i <= quantity; i++) {
            parcelQuantityDivs += `
            <div class="col-12 parcel-quantity  my-5 justify-content-between d-flex justify-items-center">

                <button class='radius-circle btn text-dark'>Parcel Details</button>
<div class="row col-10">
<input type="text" hidden name="dim_unit[]"  value="cm">
<!-- Length -->
                  <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-2">
                     <b class="w-100">Length</b>
                     <div class="d-flex mt-2 py-2 px-1  align-items-center justify-content-start bg-white rounded shadow">
                        <input required type="number" name="dim_length[]" min="1" placeholder="cm" class="text-center form-control shadow-none border-0">
                     </div>
                  </div>
                  <!-- Width -->
                  <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-2">
                     <b class="w-100">Width</b>
                     <div class="d-flex mt-2 py-2 px-1  align-items-center justify-content-start bg-white rounded shadow">
                        <input required min="1" type="number" name="dim_width[]" placeholder="cm" class="text-center form-control shadow-none border-0">
                     </div>
                  </div>
                  <!-- Height -->
                  <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-2">
                     <b class="w-100">Height</b>
                     <div class="d-flex mt-2 py-2 px-1  align-items-center justify-content-start bg-white rounded shadow">
                        <input required min="1"  type="number" name="dim_height[]"   placeholder="cm" class="text-center form-control shadow-none border-0">
                       </div>
                  </div>
                  <!-- Weight -->
                  <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-2">
                     <b class="w-100">Weight</b>
                     <div class="d-flex mt-2 py-2 px-1  align-items-center justify-content-start bg-white rounded shadow">
                        <input required min="1" type="number" name="unit_weight[]"  placeholder="weight" class="text-center form-control shadow-none border-0">

                       </div>
                  </div>
                  <!-- Unit -->
                  <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-2">
                     <b class="w-100">Unit</b>
                     <div class="d-flex mt-2 py-2 px-1  align-items-center justify-content-start bg-white rounded shadow">
                        <input required value="kg" name="weight_unit[]" type="text" class="text-center form-control shadow-none border-0">
                       </div>
                  </div>
</div>
<iconify-icon class="remove-parcel text-danger mt-auto mb-3" role="button" width="35px" height="35px" icon="zondicons:minus-solid"></iconify-icon>
</div>

            `;
        }
        $('#parcel-rows').append(parcelQuantityDivs);
    } else if (quantity < previousQuantity) {
        // Quantity decreased, remove excess parcel-quantity divs
        $('#parcel-rows .parcel-quantity:gt(' + (quantity - 1) + ')').remove();
    }

    previousQuantity = quantity;
} else {
    // If quantity is 0 or negative, hide the parcel-quantity div
    $('#parrcel-wrapper').addClass('d-none');
    $('#parcel-rows').empty();
    previousQuantity = 0;
}
});


$('#parcel-rows').on('click', '.remove-parcel', function() {
// Decrease the quantity
var currentValue = $('#quantity-input').val();
var intValue = parseInt(currentValue, 10);
if (intValue > 0) {
    intValue--;
}

// Set the decremented value back to the input
$('#quantity-input').val(intValue);

// Remove the parent .parcel-quantity row
$(this).closest('.parcel-quantity').remove();
});

  $('.btn-number').click(function(e){
      e.preventDefault();

      fieldName = $(this).attr('data-field');
      type      = $(this).attr('data-type');
      var input = $(this).closest('.d-flex').find("input[name='" + fieldName + "']");
      var currentVal = parseInt(input.val());

      if (!isNaN(currentVal)) {
          if (type == 'minus') {
              if (currentVal > input.attr('min')) {
                  input.val(currentVal - 1).change();
              }
              if (parseInt(input.val()) == input.attr('min')) {
                  $(this).attr('disabled', true);
              }
          } else if (type == 'plus') {
              if (currentVal < input.attr('max')) {
                  input.val(currentVal + 1).change();
              }
              if (parseInt(input.val()) == input.attr('max')) {
                  $(this).attr('disabled', true);
              }
          }
      } else {
          input.val(0);
      }
  });

  $('.input-number').focusin(function(){
     $(this).data('oldValue', $(this).val());
  });

  $('.input-number').change(function() {

      minValue =  parseInt($(this).attr('min'));
      maxValue =  parseInt($(this).attr('max'));
      valueCurrent = parseInt($(this).val());

      name = $(this).attr('name');
      if(valueCurrent >= minValue) {
          $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
      } else {
        //   alert('Sorry, the minimum value was reached');
          $(this).val($(this).data('oldValue'));
      }
      if(valueCurrent <= maxValue) {
          $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
      } else {
         // alert('Sorry, the maximum value was reached');
          $(this).val($(this).data('oldValue'));
      }

  });

  $(".input-number").keydown(function (e) {
      // Allow: backspace, delete, tab, escape, enter, ".", and "-"
      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190, 109]) !== -1 ||
           // Allow: Ctrl+A
          (e.keyCode == 65 && e.ctrlKey === true) ||
           // Allow: home, end, left, right
          (e.keyCode >= 35 && e.keyCode <= 39)) {
               // let it happen, don't do anything
               return;
      }
      // Ensure that it is a number and stop the keypress
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
      }
  });
</script><?php /**PATH D:\Admin Panels\gcl\resources\views/quotes/quote-script.blade.php ENDPATH**/ ?>