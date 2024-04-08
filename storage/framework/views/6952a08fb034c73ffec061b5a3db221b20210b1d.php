
<?php $__env->startSection('title', 'Quote Summary'); ?>
<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main id="main" class="main">
   <?php if(!empty($selectedQuote)): ?>
   <section class="section dashboard">
    <form method="post" action="<?php echo e(route('quote.getAddress')); ?>">
     <?php echo csrf_field(); ?>

     <input type="text" value="<?php echo e($selectedQuote['service_code']); ?>" name="preset_id" hidden>
     <input type="text" value="<?php echo e($selectedQuote['courier']); ?>" name="courier" hidden>
     <input type="text" value="<?php echo e($selectedQuote['price']['total']); ?>" name="courier_price" hidden>

        <div class=" my-4 py-5 px-4 form bg-white shadow " style="position: relative; z-index: 1; border-left: 6px solid #309cdc; border-top: 2px solid #309cdc;">
         <div class="row d-flex flex-wrap justify-content-between">
            <div class="col-lg-3 col-md-6 text-center col-12">
               <img src="<?php echo e(getImage($selectedQuote['courier'])['logo']); ?>"  class="w-50 mb-3" alt="">
               <h3><?php echo e($selectedQuote['courier']); ?></h3>
               <p><?php echo e($selectedQuote['service_name']); ?></p>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
               <h3>When do you want to ship ?</h3>
               <div class="form-group  mt-3 ms-3">
                  <label for="datepicker" class="py-2"> Date and Time:</label>
                  <div class="input-group">
                    <input required placeholder="Choose your shipping date" type="datetime-local" id="datepicker" name="datepicker" class="form-control custom-blue-bg" oninput="validateDate()">

                  </div>
               </div>
               <div class=" col-12 mt-4 ms-auto me-4">
                  
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
               <div class="col-md-12 d-flex flex-wrap ">
                  <div class="col-3">
                     <button class="text-white btn btn-primary rounded-pill">Day 1</button>
                  </div>
                  <div class="col-9 px-4">
                     <h4>Deliverd By</h4>
                     <p>12:00 PM</p>
                     <p><?php echo e($selectedQuote['courier']); ?></p>
                  </div>
               </div>
               <div class="col-md-12 mt-5 d-flex flex-wrap ">
                  <div class="col-3">
                     <button class="text-white btn btn-primary rounded-pill">Day 2</button>
                  </div>
                  <div class="col-9 px-4">
                     <h4>Arrived By</h4>
                     <p>12:00 PM</p>
                     <p><?php echo e($selectedQuote['courier']); ?></p>
                  </div>
               </div>
            </div>
         </div>
         <hr>
         <div class="row d-flex flex-wrap">
            <div class="col-md-6 col-12">
               <h3 class="my-3">Shipping Summary - £<?php echo e($selectedQuote['price']['total']); ?></h3>
               <div class="col-12 d-flex justify-content-between mb-2">
                  <div class="col-6 text-start text-muted">Chargeable Weights</div>
                  <div class="col-6 text-end font-bold"><?php echo e($totalWeight); ?>kg</div>
               </div>
               <div class="col-12 d-flex justify-content-between mb-2">
                  <div class="col-6 text-start text-muted">Shipping Charges</div>
                  <div class="col-6 text-end font-bold">£<?php echo e($selectedQuote['price']['total']); ?></div>
               </div>
               <div class="col-12 d-flex justify-content-between mb-2">
                  <div class="col-6 text-start text-muted">VAT</div>
                  <div class="col-6 text-end font-bold">£<?php echo e($vat = $selectedQuote['price']['total'] * 0.20); ?></div>
               </div>
               <hr class="my-2">
               <div class="col-12 d-flex justify-content-between mb-2">
                  <div class="col-6 text-start text-muted" style="font-size: '25px'">Total</div>
                  <div class="col-6 text-end font-bold">£<?php echo e($selectedQuote['price']['total'] + $vat); ?> inc VAT</div>
               </div>
               

               </div>

            </div>
            <div class="col-md-6 d-flex align-items-end justify-content-end"></div>
         </div>
         <div class="col-12 d-flex justify-content-between mt-5">
            <div class="col-sm-4">
               <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary text-white  ">Cancel</a>
            </div>
            <div class="col-sm-8 text-end">
               <button type="submit" class="btn btn-primary ms-start mt-auto text-white">Continue</button>
            </div>
         </div>
      </div>
    </form>
   </section>
   <?php endif; ?>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script>
function validateDate() {
    var currentDate = new Date();
    var selectedDate = new Date(document.getElementById('datepicker').value);
   //  selectedDate.setHours(currentDate.getHours() + 1);
    currentDate.setHours(0,0,0,0);

    // Check if the selected date is a weekend (Saturday or Sunday)
    if (selectedDate.getDay() === 0 || selectedDate.getDay() === 6) {
      toastr.error("Please select a date that is not a weekend (Saturday or Sunday).");
        document.getElementById('datepicker').value = ''; // Clear the input value
        return;
    }

    // Calculate the date 10 days from now
    var maxDate = new Date();
    maxDate.setDate(currentDate.getDate() + 10);

      console.log(currentDate,'currentDate');
      console.log(maxDate,'maxDate');
      console.log(selectedDate,'selectedDate');
    // Compare the selected date with the current date and the maximum allowed date
    if (selectedDate < currentDate || selectedDate > maxDate) {
      toastr.error("Please select a date within the next 10 days.");
        document.getElementById('datepicker').value = ''; // Clear the input value
    }
}


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/coukshipflow/public_html/devapp.shipflow.co.uk/resources/views/quotes/summary.blade.php ENDPATH**/ ?>