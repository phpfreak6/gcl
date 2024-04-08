<?php $__env->startSection('title', 'Address Details'); ?>
<?php $__env->startSection('style'); ?>
<style>
.error{
   border: 1px solid red;
}
</style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main id="main" class="main">

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

   <section class="section dashboard">
      <form action="<?php echo e(route('quote.editBooking')); ?>" id="quoteForm" method="POST">
         <?php echo csrf_field(); ?>
         <input type="text" value="<?php echo e($date); ?>" name="shipt_to_collection_date" hidden>
         <input type="text" value="<?php echo e($time); ?>" name="shipt_to_collection_time" hidden>
         <input type="text" value="<?php echo e($presetId); ?>" name="preset_id" hidden>
         <input type="text" value="<?php echo e($courierName); ?>" name="courier" hidden>
         <input type="text" value="<?php echo e($courierPrice); ?>" name="courier_price" hidden>
         <input type="text" value="<?php echo e($bookingtemp->id); ?>" name="booking_id" hidden>
         <div id="addressFields" class=" my-4 py-5 px-4  form bg-white shadow " style="position: relative; z-index: 1; border-left: 6px solid #309cdc; border-top: 2px solid #309cdc;">
            <div class="panel-body custom-forms splitter checkout_form">
               <div class="row">
                  <div class="col-md-6 col-xs-12 collection_side">
                     <h3>Goods Description</h3>
                     <div class="row form-pad">
                        <div class="form-group clearfix">
                           <div class="col-xs-12 col-sm-12">
                              <textarea name="description" id="collection_notes" placeholder="Please let us know what you are sending..." required="required" class="form-control my-2 py-2 my-2 input_error"><?php echo e($bookingtemp->description); ?></textarea>
                              <!---->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xs-12 collection_side_r">
                     <h3>Email Address</h3>
                     <div class="row form-pad">
                        <div class="form-group">
                           <div class="col-xs-12 col-sm-12 bill_email">
                              <input value="<?php echo e($bookingtemp->email); ?>" name="email" type="email" placeholder="Email Address" id="billing_email_address" autocomplete="nopee" class="form-control my-2 py-2 my-2 input_error">
                              <div class="xnote">Email address used for invoices and labels.</div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="clr"></div>
                  <div class="col-md-6 col-xs-12 collection_side">
                     <div class="row form-pad">
                        <div class="collection_address">
                           <div style="height: 20px;">
                              <!---->
                           </div>
                           <div class="form-group clearfix">
                              <label for="collection_address1" class="control-label col-sm-12 col-xs-12 is-error-field">
                                 <b> Collect From:</b>
                                 <div class="emnote">Enter company name if commercial.</div>
                              </label>
                              <div class="col-xs-12 col-sm-12">
                                 <input name="origin_name" value="<?php echo e($bookingtemp->origin_name); ?>" type="text" placeholder="Company Name" id="collection_address1" autocomplete="organization" maxlength="100" required="required" class="form-control my-2 py-2 input_error">
                              </div>
                           </div>
                           <div class="form-group clearfix">
                              <div class="col-xs-12 col-sm-12">
                                 <input name="origin_address_1" value="<?php echo e($bookingtemp->origin_address_1); ?>" type="text" placeholder="Address Line 2" autocomplete="address-line1" maxlength="100" required="required" class="form-control my-2 py-2 my-2 form-control my-2 py-2 my-2 input_error">
                              </div>
                           </div>

                           <div class="form-group clearfix">
                              <div class="col-xs-12 col-sm-12">
                                 <input name="origin_address_2" id="origin_address_2" value="<?php echo e($bookingtemp->origin_address_2); ?>" type="text" autocomplete="address-line2" placeholder="Address Line 3" maxlength="40" class="form-control my-2 py-2 my-2">
                              </div>
                           </div>

                           <div class="form-group clearfix">
                              <div class="col-xs-12 col-sm-12">
                                 <input name="origin_city" id="origin_city" type="text" value="<?php echo e($bookingtemp->origin_city); ?>" autocomplete="address-level2" placeholder="City / Town" maxlength="40" class="form-control my-2 py-2 my-2">
                              </div>
                           </div>

                           <div class="form-group clearfix">
                              <label for="collection_postcode" class="control-label col-sm-12 col-xs-12"> Country: </label>
                              <div class="col-xs-12 col-sm-12">
                                 <input disabled value="<?php echo e(!empty(Session::get('quote_input')['origin_country']) ? Session::get('quote_input')['origin_country'] : ""); ?>" autocomplete="address-level3" type="text" placeholder="County" maxlength="40" class="form-control my-2 py-2 my-2">
                                 <input hidden name="origin_country" value="<?php echo e($bookingtemp->origin_country); ?>" autocomplete="address-level3" type="text" placeholder="County" maxlength="40" class="form-control my-2 py-2 my-2">
                              </div>
                           </div>
                           <div class="form-group clearfix">
                              <label for="collection_postcode" class="control-label col-sm-12 col-xs-12"> Postcode: </label>
                              <div class="col-xs-12 col-sm-12">
                                 <input value="<?php echo e(!empty(Session::get('quote_input')['origin_postal']) ? Session::get('quote_input')['origin_postal'] : ""); ?>" type="text" name="origin_postal" autocomplete="off" id="collection_postcode" placeholder="Collection postcode" maxlength="10" required="required" hidden class="form-control my-2 py-2 my-2 pcinput trim_input">
                                 <input value="<?php echo e(!empty(Session::get('quote_input')['origin_postal']) ? Session::get('quote_input')['origin_postal'] : ""); ?>" type="text" disabled autocomplete="off" id="collection_postcode" placeholder="Collection postcode" maxlength="10" required="required" class="form-control my-2 py-2 my-2 pcinput trim_input">
                                 <input type="button" value="Search" id="btnOriginPostcode" onclick="getPostCode('origin')" />
                              </div>
                           </div>
                           <br> <!----> <br>
                           <h3>Collection Information</h3>
                           <div class="form-group clearfix">
                              <label for="collection_onsite_telephone" class="control-label col-sm-12 col-xs-12 is-error-field"> Onsite Telephone: </label>
                              <div class="col-xs-12 col-sm-12"><input name="origin_contact_phone" value="<?php echo e($bookingtemp->origin_contact_phone); ?>" type="number" id="collection_onsite_telephone" placeholder="Onsite Contact Telephone" autocomplete="nope" required="required" maxlength="20" pattern="" class="form-control my-2 py-2 my-2 input_error"></div>
                           </div>
                           <div class="form-group clearfix">
                              <label for="collection_onsite_contact" class="control-label col-sm-12 col-xs-12 is-error-field"> Contact Name: </label>
                              <div class="col-xs-12 col-sm-12"><input name="origin_contact_name" type="text" value="<?php echo e($bookingtemp->origin_contact_name); ?>" id="collection_onsite_contact" placeholder="Onsite Contact Name" autocomplete="nope" required="required" maxlength="40" class="form-control my-2 py-2 my-2 input_error"></div>
                           </div>
                           <div class="form-group clearfix">
                              <label for="collection_onsite_contact" class="control-label col-sm-12 col-xs-12 is-error-field"> Contact Email: </label>
                              <div class="col-xs-12 col-sm-12"><input name="origin_contact_email" type="text" value="<?php echo e(Auth::User()->contact_email); ?>" id="collection_onsite_contact" placeholder="Onsite Contact Name" autocomplete="nope" required="required" maxlength="40" class="form-control my-2 py-2 my-2 input_error"></div>
                           </div>
                           <div class="form-group clearfix">
                              <label for="collection_notes2" class="control-label col-xs-12"> Collection Driver Notes:<span class="emnote">Avoid timed requests.</span></label>
                              <div class="col-xs-12 col-sm-12">
                                 <textarea name ="collection_note" id="collection_notes2" placeholder="Notes are for driver only, not monitored by support. Include access restrictions; no time-sensitive requests. For small vehicle, tick below." class="form-control my-2 py-2 my-2"></textarea>
                                 <div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-xs-12 collection_side_r">
                     <div class="row form-pad">
                        <div class="delivery_address">
                           <div>
                           </div>
                           <div style="height: 20px;">
                              <!---->
                           </div>
                           <div class="form-group clearfix">
                              <label for="delivery_address1" class="control-label col-sm-12 col-xs-12 is-error-field">
                                 <b> Deliver To:</b>
                                 <div class="emnote">Enter company name if commercial.</div>
                              </label>
                              <div class="col-xs-12 col-sm-12"><input type="text" autocomplete="901038447off" id="delivery_address1" name="ship_to_name" placeholder="Company Name" maxlength="100" required="required" class="form-control my-2 py-2 my-2 input_error"></div>
                           </div>
                           <div class="form-group clearfix">
                              <div class="col-xs-12 col-sm-12"><input type="text" autocomplete="597576816off" id="delivery_address1" name="ship_to_address_1" placeholder="Address Line 2" maxlength="100" required="required" class="form-control my-2 py-2 my-2 form-control my-2 py-2 my-2 input_error"></div>
                           </div>
                           <div class="form-group clearfix">
                              <div class="col-xs-12 col-sm-12"><input type="text" autocomplete="228112186off" placeholder="Address Line 3" name="ship_to_address_2" id="ship_to_address_2" maxlength="40" class="form-control my-2 py-2 my-2"></div>
                           </div>
                           <div class="form-group clearfix">
                              <div class="col-xs-12 col-sm-12"><input type="text" autocomplete="381641588off" placeholder="City / Town" name="ship_to_city" id="ship_to_city" maxlength="40" class="form-control my-2 py-2 my-2"></div>
                           </div>
                           <div class="form-group clearfix">
                              <label for="collection_postcode" class="control-label col-sm-12 col-xs-12"> Country: </label>
                              <div class="col-xs-12 col-sm-12">
                                 <input disabled value="<?php echo e(!empty(Session::get('quote_input')['country']) ? Session::get('quote_input')['country'] : ""); ?>" autocomplete="612638273off" type="text" placeholder="County" maxlength="40" class="form-control my-2 py-2 my-2 ">
                                 <input hidden name="country" value="<?php echo e(!empty(Session::get('quote_input')['country']) ? Session::get('quote_input')['country'] : ""); ?>" autocomplete="612638273off" type="text" placeholder="County" maxlength="40" class="form-control my-2 py-2 my-2 ">
                              </div>
                           </div>
                           <div class="form-group clearfix">
                              <label for="delivery_postcode" class="control-label col-sm-12 col-xs-12"> Postcode: </label>
                              <div class="col-xs-12 col-sm-12  delivery_postcode">
                                 <input hidden name="postal" value="<?php echo e(!empty(Session::get('quote_input')['postal']) ? Session::get('quote_input')['postal'] : ""); ?>" type="text" autocomplete="7off" placeholder="Delivery postcode" id="delivery_postcode" maxlength="10" required="required" class="form-control my-2 py-2 my-2 pcinput trim_input">
                                 <input disabled value="<?php echo e(!empty(Session::get('quote_input')['postal']) ? Session::get('quote_input')['postal'] : ""); ?>" type="text" autocomplete="7off" placeholder="Delivery postcode" id="delivery_postcode" maxlength="10" required="required" class="form-control my-2 py-2 my-2 pcinput trim_input">
                                 <input type="button" value="Search" id="btnDestinationPostcode" onclick="getPostCode('destination')" />

                              </div>
                           </div>
                           <br> <!----> <br>
                           <h3>Delivery Information</h3>
                           <div class="form-group clearfix">
                              <label for="delivery_onsite_telephone" class="control-label col-sm-12 col-xs-12 is-error-field"> Onsite Telephone: </label>
                              <div class="col-xs-12 col-sm-12"><input type="number" id="delivery_onsite_telephone" placeholder="Onsite Contact Telephone" name="ship_to_phone" maxlength="20" autocomplete="11off" required="required" class="form-control my-2 py-2 my-2 input_error"></div>
                           </div>
                           <div class="form-group clearfix">
                              <label for="delivery_onsite_contact" class="control-label col-sm-12 col-xs-12 is-error-field"> Contact Name: </label>
                              <div class="col-xs-12 col-sm-12"><input type="text" id="delivery_onsite_contact" placeholder="Onsite Contact Name" name="ship_to_reference" maxlength="40" autocomplete="10off" required="required" class="form-control my-2 py-2 my-2 input_error"></div>
                           </div>
                           <div class="form-group clearfix">
                              <label for="delivery_onsite_contact" class="control-label col-sm-12 col-xs-12 is-error-field"> Contact Email: </label>
                              <div class="col-xs-12 col-sm-12"><input type="text" id="delivery_onsite_contact" placeholder="Onsite Contact Name" name="ship_to_email" maxlength="40" autocomplete="10off" required="required" class="form-control my-2 py-2 my-2 input_error"></div>
                           </div>
                           <div class="form-group clearfix">
                              <label for="delivery_notes" class="control-label col-xs-12"> Delivery Driver Notes:<span class="emnote">Avoid timed requests.</span></label>
                              <div class="col-xs-12 col-sm-12">
                                 <textarea name="delivery_instructions" id="delivery_notes" placeholder="Notes are for driver only, not monitored by support. Include access restrictions; no time-sensitive requests. For small vehicle, tick below." class="form-control my-2 py-2 my-2"></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-12 d-flex justify-content-between mt-5">
                  <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary text-white col-lg-3 col-sm-10 ">Cancel</a>
                  <!-- <button id="generate_label" type="button" class="btn btn-primary text-white col-lg-3 col-sm-10 " style="display:none">Generate Label</button> -->
                  <button id="saveBtn" type="submit" class="btn btn-primary text-white col-lg-3 col-sm-10 ">Save</button>
                  <!-- <button id="editBtn" type="button" class="btn btn-primary text-white col-lg-3 col-sm-10 " style="display:none">Edit</button> -->

               </div>
            

            </div>
         </div>
      </form>
   </section>
</main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
   function getPostCode(btn) {

      if (btn == 'origin') {
         var input = $("#collection_postcode").val();
      } else {
         var input = $("#delivery_postcode").val();
      }

      var url = "/quotes/postcode/" + input;
      $.ajax({
         url: url,
         success: function(postcode) {
            console.log('success call -> ', postcode);
            displayData(postcode, btn);
         },
         error: function(xhr, textStatus, errorThrown) {
            console.log("Error: " + errorThrown);
         }
      });
   }


   //display results on page
   function displayData(postcode, btn) {
      console.log('postcode', postcode);
      for (var index in postcode["result"]) {

         if (btn == 'origin') {
            $("#origin_address_2").val(postcode["result"]["pfa"]);
            $("#origin_city").val(postcode["result"]["admin_district"]);
         } else {
            $("#ship_to_address_2").val(postcode["result"]["pfa"]);
            $("#ship_to_city").val(postcode["result"]["admin_district"]);
         }

      }

   }

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\newgcl\gcl\resources\views/quotes/edit-address.blade.php ENDPATH**/ ?>