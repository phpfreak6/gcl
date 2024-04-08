<?php $__env->startSection('title', 'Select Courier'); ?>
<?php $__env->startSection('style'); ?>
<style>
.tooltip {
    position: relative;
    display: inline-block;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 100%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

   </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main id="main" class="main">
   <section class="section dashboard">
      <div id="carriers-wrapperr" class=" mt-4   form bg-white shadow " style="position: relative; z-index: 1; border-left: 6px solid #309cdc; border-top: 2px solid #309cdc;">

        <?php if(!empty($responseData)): ?>

        <div class="row py-5">
            <div class="p-4 ">
               <h3>Select Carriers</h3>
            </div>
            <div class="row justify-content-start aligin-items-center mt-4 d-flex flex-wrap">
                <?php $__currentLoopData = $responseData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=> $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-lg-3 my-3  col-md-6 d-flex justify-content-center text-center ">
                  <div class="col-11 border pb-4">
                    <?php if($index==0): ?>
                     <div class="bg-warning">Recommended</div>
                     <?php else: ?>
                     <div class="bg-secondary">Standard</div>
                     <?php endif; ?>
                     <div class="flex-coloumn mt-4 text-center">
                        <?php
                        $courierData = getImage($data['courier']);
                    ?>

                    <img src="<?php echo e(asset($courierData['logo'])); ?>" style="height:115px;width:auto" class="mb-2 w-75 mx-auto" alt="">
                    <h3>
                     <?php echo e($data['courier']); ?>

                  </h3>


                        <p><?php echo e($data['service_name']); ?>                      <i class="fas fa-info-circle" data-bs-toggle="popover" data-bs-content="<?php echo e($courierData['long_description']); ?>"></i>
                        </p>
                        
                        <div class="specifyColor d-flex justify-content-center align-items-center text-center">
                           <h5 class="my-3 font-bold">£<?php echo e($data['price']['total']); ?></h5>
                        </div>

                        <form method="post" action="<?php echo e(route('quote.summary')); ?>">
                        <?php echo csrf_field(); ?>
                        
                        <input type="text" hidden value="<?php echo e($data['courier']); ?>" name="courier">
                        <input type="text" hidden value="<?php echo e($data['service_code']); ?>" name="service_code">

                           <button type="submit" class="btn btn-primary col-10 mx-auto py-2 text-white">Book Now</button>
                        </form>
                     </div>
                  </div>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <div class="col-12 px-5 d-flex justify-content-between mt-5">
                  <div class="col-sm-4">

                    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary text-white">Cancel</a>
                </div>
                  <div class="col-sm-8 text-end">

                     
                  </div>
                         </div>
            </div>

         </div>

         <?php else: ?>
         <div style="height:70vh" class="row ">
            <div class="align-items-center  text-center col-11 d-flex flex-wrap justify-content-center w-100" >

                <div class=" col-md-8  alert alert-danger" role="alert">
                    Oops! Apologies, we couldn't find any quotes matching your request.
                </div>
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary text-white">Back</a>
                <div class="my-3 w-100">
                </div>
            </div>
            </div>

                <?php endif; ?>

      </div>
   </section>
</main>
<script>
   document.addEventListener("DOMContentLoaded", function(){
       var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
       var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
         return new bootstrap.Popover(popoverTriggerEl, {
           trigger: 'hover',
           placement: 'top'
         })
       });
   });
   </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Admin Panels\gcl\resources\views/quotes/qoute-result.blade.php ENDPATH**/ ?>