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
   /**css start by (py) **/
   .content_wraps img {
      width: 112px;
      height:40px;
      object-fit:cover;
      border-radius:5px;
      margin-right: 15px;
   }
   .content_wraps {
      padding: 15px;
   }
   .content_wraps h3 {
      font-size: 15px;
      font-weight:800;
   }
   .img_wrap {
      border-bottom: 1px solid #baccd6;
      padding-bottom: 3px;
      margin-bottom: 15px;
   }
   .drop_wrap {
      width:48%;
   }
   .drop_wrap p{
      width:155px;
   }
   .drop_wrap p,.expected_wrap p,.price_wrap h5{
      font-size:14px;
      margin-bottom:0px !important;
      font-weight:700;
      margin-right:20px;
      color:#19547c;
   }
   .expected_wrap span{
      font-size:12px;
   }
   .expected_wrap {
      border-left: 1px solid #c5dfef;
      padding-left: 10px;
      width:32%;
   }
   .price_wrap p {
      margin: 0px !important;
      font-size:14px;
   }
   .price_wrap p span{
      font-size:10px;
   }
   .price_wrap {
      width: 15%;
   }
   .price_wrap h5{
      font-size:16px;
   }
   .form_content {
      width: 17%;
   }
   .inner_box{
      margin:0px;
      font-size: 12px;
      font-weight:400;
      line-height: 15px;
      white-space: nowrap;
      border: 1px solid rgb(186, 204, 214);
      border-radius: 8px;
      background-color: rgb(241, 246, 254);
      padding: 2px 8px;
      gap: 8px;
      text-transform: uppercase;
      color: rgb(25, 84, 124);
      width: 107px;
      height: 18px;
   }
   .inner_wrap{
      background:#fff;
   }
   .form_content button {
      font-size: 14px;
   }
    span.inner_box {
      margin-left: 10px;
   }
   @media  screen and (max-width:1199px){
      .main{
    margin-left:300px !important;
  }
  .main.active {
    margin-left:0px !important;
  }
  .sidebar.actives {
    left:-300px !important;
  }
  .sidebar{
    left:0px !important;
  }
   }
   @media  screen and (min-width:1200px) and (max-width:1500px){
      .drop_wrap {
        width: 36%;
      }
   }
   @media  screen and (min-width:320px) and (max-width:991px){
      .drop_wrap,.expected_wrap,.price_wrap,.form_content{
         width:100%;
         align-items:unset !important;
         text-align:unset !important;
         margin-bottom: 20px;
      }
         .form_main_wrap {
            flex-wrap: wrap;
         }
   }
   @media  screen and (min-width:992px) and (max-width:1199px){
      .drop_wrap,.expected_wrap,.price_wrap,.form_content{
         width:50%;
         align-items:unset !important;
         text-align:unset !important;
         margin-bottom: 20px;
      }
         .form_main_wrap {
            flex-wrap: wrap;
         }
   }
   @media  screen and (max-width:575px){
      .expected_wrap span {
      font-size: 12px;
      margin-right: 10px !important;

   }
   .content_wraps img {
      width: 100px;
   }
   .span_wrap,.drop_wrap {
      flex-direction: column;
      align-items:unset !important;
   }
   span.inner_box {
      margin-top: 10px;
      margin-left: 0px !important;
   }
}
@media  screen and (min-width:320px) and (max-width:767px){
   .main{
    margin-left:0px !important;
  }
  .main.active {
    margin-left:0px !important;
  }
  .sidebar.actives {
    left:-300px !important;
  }
  .sidebar{
    left:0px !important;
  }
}
   /**css start by (py) **/
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

               <div class="col-lg-12 my-3  col-md-12 d-flex">
                  <div class="col-lg-11 col-12 inner_wrap border pb-4">
                     <?php if($index==0): ?>
                     <div class="bg-warning text-center">Recommended</div>
                     <?php else: ?>
                     <div class="bg-secondary text-center">Standard</div>
                     <?php endif; ?>
                     <div class="d-flex flex-column mt-4 content_wraps">
                        <?php
                        $courierData = getImage($data['courier']);
                        $courierServiceData = getCourierServiceData($data['service_code']);
                        ?>
                        <div class="d-flex align-items-center img_wrap">
                           <img src="<?php echo e(asset($courierData['logo'])); ?>"  class="mb-2" alt="">
                           <h3>
                                 <?php echo e($data['courier']); ?>

                           </h3>
                        </div>
                        <div class="d-flex align-items-center form_main_wrap">
                           <div class="drop_wrap d-flex">
                              <p><?php echo e($data['service_name']); ?> <i class="fas fa-info-circle" data-bs-toggle="popover" data-bs-content="<?php echo e($courierData['long_description']); ?>"></i>
                              </p>
                              <div class="d-flex flex-column">
                              <?php if(isset($courierServiceData['dropoff']) && $courierServiceData['dropoff']=='1'): ?>
                              <p>Drop Off Today</p>
                              <?php endif; ?>
                              <?php if(isset($courierServiceData['pickup']) && $courierServiceData['pickup']=='1'): ?>
                                 <p>Pickup Today</p>
                               <?php endif; ?>
                               
                              </div>
                           </div>

                           <div class="expected_wrap">
                              <?php if(isset($courierServiceData['start_date'])): ?>
                              <p>Expected Delivery :</p>
                              <div class="span_wrap d-flex align-items-center">
                              <span><?php echo e($courierServiceData['start_date']); ?> - <?php echo e($courierServiceData['end_date']); ?></span>
                              
                              <span class="inner_box"><?php echo e($courierServiceData['exp_lead_time']); ?> Delivery</span>
                              </div>
                              <?php endif; ?>
                           </div>
                          
                           <div class="specifyColor price_wrap d-flex flex-column justify-content-center align-items-center text-center">
                              <h5 class="my-3 font-bold">£<?php echo e($data['price']['total']); ?></h5>
                              <?php $vat = $data['price']['total'] * 0.20 ?>
                              <p class="my-3 font-bold">£<?php echo e($data['price']['total'] + $vat); ?><span> inc.VAT</span></p>
                           </div>
                           <div class="form_content">
                              <form method="post" action="<?php echo e(route('quote.summary')); ?>">
                                 <?php echo csrf_field(); ?>
                                 
                                 <input type="text" hidden value="<?php echo e($data['courier']); ?>" name="courier">
                                 <input type="text" hidden value="<?php echo e($data['service_code']); ?>" name="service_code">

                                 <button type="submit" class="btn btn-primary col-10 mx-auto py-2 text-white">Book Now</button>
                              </form>
                              </div>
                           
                          
                        </div>
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
            <div class="align-items-center  text-center col-11 d-flex flex-wrap justify-content-center w-100">

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
   document.addEventListener("DOMContentLoaded", function() {
      var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
      var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
         return new bootstrap.Popover(popoverTriggerEl, {
            trigger: 'hover',
            placement: 'top'
         })
      });
   });
  
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\newgcl\gcl\resources\views/quotes/qoute-result.blade.php ENDPATH**/ ?>