<?php $__env->startSection('title', 'Address Details'); ?>
<?php $__env->startSection('style'); ?>
<style>
   /* Add your CSS styles here */
   .booking-info-container {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
   }

   .booking-info {
      width: 48%;
      /* Adjust width as needed */
   }

   .booking-info label {
      font-weight: bold;
   }

   .booking-info div {
      margin-top: 5px;
   }

   .checkbox-container {
      margin-top: 20px;
   }

   .payment-gateway-select {
      margin-top: 20px;
   }

   /**** CSS START BY (PY) ****/
   .booking_wrap label,
   .booking_wrap div {
      font-size: 16px;
      color: #212529;
      font-weight: 700;
   }

   .booking_wrap div {
      font-weight: 400;
      margin: 0px 0px 0px 10px !important;
      color: #605858;
   }

   .booking_wrap {
      display: flex;
      align-items: center;
      margin-bottom: 12px;
   }

   .booking-info h2 {
      font-size: 26px;
      font-weight: bold;
      color: #212529;
      margin-bottom: 15px;
   }

   .cancel_btn,
   .generate_btn {
      width: max-content;
      padding: 10px 30px;
   }

   .generate_btn {
      padding: 10px 10px;
   }

   .checkbox-container label,
   .payment-gateway-select label {
      font-size: 14px;
      color: #333;
      font-weight: 600;
   }

   .payment-gateway-select select {
      padding: 5px 10px;
   }

   @media  screen and (min-width:320px) and (max-width:991px) {
      .booking_main {
         display: flex;
         flex-direction: column;
      }

      .booking_main .booking_wrap label {
         width: 55%;
      }

      .booking-info h2 {
         font-size: 24px;
      }

      .booking_main .booking-info {
         margin-bottom: 20px;
         width: 100%;
      }
   }

   @media  screen and (min-width:576px) and (max-width:767px) {
      .booking-info h2 {
         font-size: 20px;
      }

      .booking_wrap label,
      .booking_wrap div {
         font-size: 14px;
      }

      .booking_wrap {
         margin-bottom: 11px;
      }
   }

   @media  screen and (max-width:575px) {
      .booking-info h2 {
         font-size: 20px;
      }

      .booking_wrap label,
      .booking_wrap div {
         font-size: 14px;
      }

      .booking_wrap {
         margin-bottom: 11px;
      }

      .booking_main .booking_wrap label {
         width: 65%;
      }

      .top_wrap {
         display: flex;
         flex-direction: column;
      }
   }

   /**** CSS END BY (PY) ****/
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main id="main" class="main">

   <?php if(session('success')): ?>
   <div class="alert alert-success">
      <?php echo e(session('success')); ?>

   </div>
   <?php endif; ?>

   <section class="section dashboard">

      <div class="booking-info-container top_wrap">
         <div class="booking_wrap">
            <label for="description">Goods Description:</label>
            <div><?php echo e($bookingtemp->description); ?></div>
         </div>
         <div class="booking_wrap">
            <label for="email">Email:</label>
            <div><?php echo e($bookingtemp->email); ?></div>
         </div>
         
         <!-- <button id="editBtn" type="button" class="btn btn-primary text-white col-lg-3 col-sm-10 ">
         <a href="<?php echo e(route('quote.editBookingView', [
            'shipt_to_collection_date' => $date,
            'shipt_to_collection_time' => $time,
            'preset_id' => $presetId,
            'courier' => $courierName,
            'courier_price' => $courierPrice,
            'id' => $bookingtemp->id
         ])); ?>">
         Edit</a>
      </button> -->
         

      </div>
      <div class="booking-info-container booking_main">

         <div class="booking-info">
            <h2>Origin Information</h2>
            <div class="booking_wrap">
               <label for="origin_name">Name:</label>
               <div><?php echo e($bookingtemp->origin_name); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="origin_address_1">Address 1:</label>
               <div><?php echo e($bookingtemp->origin_address_1); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="origin_address_2">Address 2:</label>
               <div><?php echo e($bookingtemp->origin_address_2); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="origin_city">City:</label>
               <div><?php echo e($bookingtemp->origin_city); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="origin_postal">Postal Code:</label>
               <div><?php echo e($bookingtemp->origin_postal); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="origin_country">Country:</label>
               <div><?php echo e($bookingtemp->origin_country); ?></div>

            </div>
            <div class="booking_wrap">
               <label for="origin_phone">Origin Phone:</label>
               <div><?php echo e($bookingtemp->origin_phone); ?></div>

            </div>
            <div class="booking_wrap">
               <label for="origin_email">Origin Email:</label>
               <div><?php echo e($bookingtemp->origin_email); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="origin_contact_name">Origin Contact Name:</label>
               <div><?php echo e($bookingtemp->origin_contact_name); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="collection_note">Collection Note:</label>
               <div><?php echo e($bookingtemp->collection_note); ?></div>
            </div>

            <!-- Add more origin fields here -->

         </div>

         <div class="booking-info">
            <h2>Destination Information</h2>
            <div class="booking_wrap">
               <label for="destination_name">Name:</label>
               <div><?php echo e($bookingtemp->destination_name); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="destination_address_1">Address 1:</label>
               <div><?php echo e($bookingtemp->destination_address_1); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="destination_address_2">Address 2:</label>
               <div><?php echo e($bookingtemp->destination_address_2); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="destination_city">City:</label>
               <div><?php echo e($bookingtemp->destination_city); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="destination_postal">Postal Code:</label>
               <div><?php echo e($bookingtemp->destination_postal); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="destination_country">Country:</label>
               <div><?php echo e($bookingtemp->destination_country); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="destination_phone">Destination Phone:</label>
               <div><?php echo e($bookingtemp->destination_phone); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="destination_email">Destination Email:</label>
               <div><?php echo e($bookingtemp->destination_email); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="destination_contact_name">Destination Contact Name:</label>
               <div><?php echo e($bookingtemp->destination_contact_name); ?></div>
            </div>
            <div class="booking_wrap">
               <label for="delivery_instructions">Delivery Instructions:</label>
               <div><?php echo e($bookingtemp->delivery_instructions); ?></div>
            </div>

            <!-- Add more destination fields here -->

         </div>
      </div>

      <form id="quoteForm" class="">
         <?php echo csrf_field(); ?>
         <input type="text" value="<?php echo e($date); ?>" name="shipt_to_collection_date" hidden>
         <input type="text" value="<?php echo e($time); ?>" name="shipt_to_collection_time" hidden>
         <input type="text" value="<?php echo e($presetId); ?>" name="preset_id" hidden>
         <input type="text" value="<?php echo e($courierName); ?>" name="courier" hidden>
         <input type="text" value="<?php echo e($courierPrice); ?>" name="courier_price" hidden>

         <input type="hidden" name="id" value="<?php echo e($bookingtemp->id); ?>">
         <input type="hidden" name="description" value="<?php echo e($bookingtemp->description); ?>">
         <input type="hidden" name="email" value="<?php echo e($bookingtemp->email); ?>">
         <input type="hidden" name="origin_contact_phone" value="<?php echo e($bookingtemp->origin_phone); ?>">
         <input type="hidden" name="origin_contact_email" value="<?php echo e($bookingtemp->origin_email); ?>">
         <input type="hidden" name="origin_contact_name" value="<?php echo e($bookingtemp->origin_contact_name); ?>">
         <input type="hidden" name="origin_name" value="<?php echo e($bookingtemp->origin_name); ?>">
         <input type="hidden" name="origin_address_1" value="<?php echo e($bookingtemp->origin_address_1); ?>">
         <input type="hidden" name="origin_address_2" value="<?php echo e($bookingtemp->origin_address_2); ?>">
         <input type="hidden" name="origin_city" value="<?php echo e($bookingtemp->origin_city); ?>">
         <input type="hidden" name="origin_postal" value="<?php echo e($bookingtemp->origin_postal); ?>">
         <input type="hidden" name="origin_country" value="<?php echo e($bookingtemp->origin_country); ?>">
         <input type="hidden" name="ship_to_phone" value="<?php echo e($bookingtemp->destination_phone); ?>">
         <input type="hidden" name="ship_to_email" value="<?php echo e($bookingtemp->destination_email); ?>">
         <input type="hidden" name="ship_to_reference" value="<?php echo e($bookingtemp->destination_contact_name); ?>">
         <input type="hidden" name="ship_to_name" value="<?php echo e($bookingtemp->destination_name); ?>">
         <input type="hidden" name="ship_to_address_1" value="<?php echo e($bookingtemp->destination_address_1); ?>">
         <input type="hidden" name="ship_to_address_2" value="<?php echo e($bookingtemp->destination_address_2); ?>">
         <input type="hidden" name="ship_to_city" value="<?php echo e($bookingtemp->destination_city); ?>">
         <input type="hidden" name="postal" value="<?php echo e($bookingtemp->destination_postal); ?>">
         <input type="hidden" name="country" value="<?php echo e($bookingtemp->destination_country); ?>">
         <input type="hidden" name="collection_note" value="<?php echo e($bookingtemp->collection_note); ?>">
         <input type="hidden" name="delivery_instructions" value="<?php echo e($bookingtemp->delivery_instructions); ?>">


         <!-- Checkbox for terms and policy -->
         <div class="checkbox-container">
            <label>
               <input type="checkbox" name="terms">
               Tick to agree to our terms and conditions.
            </label>
         </div>

         <!-- Select box for payment gateway selection -->
         <div class="payment-gateway-select">
            <label for="payment_gateway">Select Payment Gateway:</label>
            <select name="payment_gateway" id="payment_gateway">
               <option value="cash">Cash</option>
               <option value="card">Card Machine</option>
               <option value="stripe">Stripe</option>
               <!-- Add more options as needed -->
            </select>
         </div>

         <div class="col-12 d-flex justify-content-between mt-5">
            <a href="<?php echo e(url()->previous()); ?>" class="cancel_btn btn btn-secondary text-white col-lg-3 col-sm-10 ">Cancel</a>

            <button id="generate_label" type="button" class="generate_btn btn btn-primary text-white col-lg-3 col-sm-10 ">Generate Label</button>
         </div>

         <!-- Generated Label -->
         <div id="generatedLabel" className="mt-5" style="display: none;">
            <div class="card card-primary card-outline">
               <div class="card-header">
                  <h3 class="card-title">Generated Label</h3>
               </div>
               <div class="card-body table-responsive">
                  <a href="#" target="_blank" class="btn btn-outline-primary view-label"> View Label | <i class="fas fa-download"></i></a>
               </div>
            </div>
         </div>
      </form>
   </section>
</main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
   $('#generate_label').click(function(e) {
      var formData = new FormData($('#quoteForm')[0]);
      var $button = $(this);

      // Check if the terms and policy checkbox is checked
      if (!$('[name="terms"]').is(':checked')) {
         toastr.error('Please agree to the terms and conditions.');
         return;
      }

      // Check if a payment gateway is selected
      var paymentGateway = $('#payment_gateway').val();
      if (!paymentGateway) {
         toastr.error('Please select a payment gateway.');
         return;
      }
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

            console.log(response)
            if (response) {
               if (response.status === 400) {
                  var errorMessage = response.responseJSON.message;
                  // Display the error message using toastr or any other method
                  toastr.error(errorMessage);
                  console.log(response.responseJSON.message)
                  return;
               }
               toastr.success("Lable Generated.")
               $('.view-label').attr('href', response.uri);
               $('#generatedLabel').show();
               $('html, body').animate({
                  scrollTop: $('#generatedLabel').offset().top
               }, 200);
            }
         },
         error: function(response) {
            console.log(response);

            removeErrors();

            if (response.status === 422) {
               var errors = response.responseJSON.error;
               showErrors(errors);
            } else {
               // Extract the error message from the JSON response or responseText
               var errorMessage = response.responseJSON.error;

               // Display the error message using toastr or any other method
               toastr.error(errorMessage);
               console.log(response.responseJSON.error)
            }
         }



      });
   });


   function showErrors(errors) {
      removeErrors();

      for (var field in errors) {
         var errorMessage = errors[field][0];
         var fieldName = field;
         if (fieldName === 'country' || fieldName === 'postal' || fieldName.startsWith('ship_to_') || fieldName.startsWith('origin_')) {
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


   document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('quoteForm');
      const editBtn = document.getElementById('editBtn');

      editBtn.addEventListener('click', function() {
         
      });
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\newgcl\gcl\resources\views/quotes/generate-label.blade.php ENDPATH**/ ?>