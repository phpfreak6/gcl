<div id="parrcel-wrapper" class="d-none mt-5" style="position: relative; " >
    <div class=" form bg-white shadow " style="position: relative; z-index: 1; border-left: 6px solid #309cdc; border-top: 2px solid #309cdc;">
       <div class="row py-5">
          <div class="col-lg-8 mx-auto col-md-10  col-12">
             <h3>Enter Dimension</h3>
               </div>
          <div  class="col-lg-8 mx-auto col-md-10 col-12 bg-light-primary radius-4 my-4 rounded-5 p-4 py-2">
             <div class="row " id="parcel-rows">
                <div class="col-12 parcel-quantity  my-5 justify-content-between d-flex justify-items-center">
                  <button class='radius-circle btn text-dark'>Parcel Details</button>
                  <input type="text" hidden name="dim_unit[]"  value="cm">

                  <div class="row col-10">
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
                   <span  style="width:45px;height:45px"></span>
                </div>
             </div>

            </div>
       </div>
       </div>
       </div>
<?php /**PATH D:\xampp\htdocs\gcl\resources\views/quotes/Component/parcel.blade.php ENDPATH**/ ?>