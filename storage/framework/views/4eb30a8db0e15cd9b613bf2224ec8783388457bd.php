<?php
   $continents = [
         'Africa' =>  array('Algeria','Angola','Benin','Botswana','Burkina Faso','Burundi','Cabo Verde','Cameroon','Central African Republic','Chad','Comoros','Democratic Republic of the Congo','Republic of the Congo','Cote d\'Ivoire','Djibouti','Egypt','Equatorial Guinea','Eritrea','Ethiopia','Gabon','Gambia','Ghana','Guinea','Guinea Bissau','Kenya','Lesotho','Liberia','Libya','Madagascar','Malawi','Mali','Mauritania','Mauritius','Morocco','Mozambique','Namibia','Niger','Nigeria','Rwanda','Sao Tome and Principe','Senegal','Seychelles','Sierra Leone','Somalia','South Africa','South Sudan','Sudan','Swaziland','Tanzania','Togo','Tunisia','Uganda','Zambia','Zimbabwe'),
         'NorthAmerica' => array('Antigua and Barbuda','Bahamas','Barbados','Belize','Canada','Costa Rica','Cuba','Dominica','Dominican Republic','El Salvador','Grenada','Guatemala','Haiti','Honduras','Jamaica','Mexico','Nicaragua','Panama','Saint Kitts and Nevis','Saint Lucia','Saint Vincent and the Grenadines','Trinidad and Tobago','United States of America'),
         'SouthAmerica' => array('Argentina', 'Bolivia','Brazil','Chile','Colombia','Ecuador','Guyana','Paraguay','Peru','Suriname','Uruguay','Venezuela'),
         'Europe' => array('Albania','Andorra','Armenia','Austria','Azerbaijan','Belarus','Belgium','Bosnia and Herzegovina','Bulgaria','Croatia','Cyprus','Czech Republic','Denmark','Estonia','Finland','France','Georgia','Germany','Greece','Iceland','Ireland','Italy','Kazakhstan','Kosovo','Latvia','Liechtenstein','Lithuania','Luxembourg','Macedonia','Malta','Moldova','Monaco','Montenegro','Netherlands','Norway','Poland','Portugal','Romania','Russia','San Marino','Serbia','Slovakia','Slovenia','Spain','Sweden','Switzerland','Turkey','Ukraine','United Kingdom','Vatican City'),
         'Asia' => array('Armenia','Azerbaijan','Bahrain','Bangladesh','Bhutan','Brunei', 'Cambodia','China','Cyprus','Georgia','India','Indonesia','Iran','Iraq','Israel', 'Japan','Jordan','Kazakhstan','Kuwait','Kyrgyzstan','Laos','Lebanon','Malaysia','Maldives','Mongolia','Myanmar','Nepal','North Korea','Oman','Pakistan','Palestine','Philippines','Qatar','Russia','Saudi Arabia','Singapore','South Korea','Sri Lanka','Syria','Taiwan','Tajikistan','Thailand','Timor Leste','Turkey','Turkmenistan','United Arab Emirates','Uzbekistan','Vietnam','Yemen')
     ];
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Signup</title>
      <link rel="stylesheet" href="<?php echo e(asset('/css/main.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('/css/style.css')); ?>">

      <style>
         /* Custom CSS for the background image and login panel */
         .container-bg {
         background: url('images/background.png') no-repeat center center fixed;
         background-size: cover;
         min-height: 100vh; /* 100% of the viewport height */
         align-items: end;
         overflow-x:hidden;
         }
         .login-panel {
         background-color: white;
         padding: 20px;
         border-radius:20px  0px 0px 20px;
         min-height:100vh;
         }
         .custom-button {
         background-color: #FFFFFF; /* Your custom color */
         color: #000000;
         border:1px solid #888888;
         }
      </style>
   </head>
   <body>
      <div class="container-fluid container-bg p-0">
         <div class="row justify-content-end align-items-center">
            <div class="col-sm-10 col-md-6 col-lg-4 col-12">
               <div class="login-panel">
                  <!-- Your login panel content here -->
                  <div class="ml-2 d-flex flex-row font-weight-bold mt-5" style="font-size:20px">
                     <img src="images/logo-1.png" alt="" width="170" >
                  </div>
                  <div class="mt-4"style="font-size:25px; margin-left:10px;">
                     <P >Your Company</P>
                  </div>
                  <form action="/organization" method="post" id="orgForm" class="px-3 needs-validation" novalidate>
                    <?php echo csrf_field(); ?>
                    <div class="form-group mt-2">
                        <label for="Company_name" class="form-label" style="font-size:12px; font-weight:bold">Company
                        Name</label>
                        <input type="text" required class="form-control py-3 <?php echo e($errors->has('company_name')?'is-invalid':''); ?>" name="company_name" value="<?php echo e(old('company_name')); ?>" placeholder="<?php echo app('translator')->get('models/users.fields.company_name'); ?>">

                        <span class="invalid-feedback">
                            <?php if($errors->has('company_name')): ?>
                            <strong><?php echo e($errors->first('company_name')); ?></strong>
                            <?php else: ?>
                            <strong>Please enter the company name.</strong>
                            <?php endif; ?>
                        </span>

                     </div>
                     <div class="mt-2 form-group">
                        <label for="Address1" class="form-label"
                           style="font-size:12px; font-weight:bold">Address 1</label>
                           <input required type="text" class="form-control py-3 <?php echo e($errors->has('address_1')?'is-invalid':''); ?>" name="address_1" value="<?php echo e(old('address_1')); ?>" placeholder="<?php echo app('translator')->get('models/users.fields.address_1'); ?>">
                           <span class="invalid-feedback">
                               <?php if($errors->has('address_1')): ?>

                               <strong><?php echo e($errors->first('address_1')); ?></strong>
                               <?php else: ?>
                               <strong>Please enter address.</strong>

                               <?php endif; ?>
                           </span>

                     </div>
                     <div class="mt-2 form-group">
                        <label for="Address2" class="form-label"
                           style="font-size:12px; font-weight:bold">Address 2</label>
                           <input type="text" class="form-control py-3 <?php echo e($errors->has('address')?'is-invalid':''); ?>" name="address_2" value="<?php echo e(old('address_2')); ?>" placeholder="<?php echo app('translator')->get('models/users.fields.address_2'); ?>">
                           <span class="invalid-feedback">
                               <?php if($errors->has('address_2')): ?>
                               <strong><?php echo e($errors->first('address_2')); ?></strong>

                               <?php endif; ?>
                           </span>
                     </div>
                     <div class="mt-2 form-group">
                        <label for="Address2" class="form-label"
                           style="font-size:12px; font-weight:bold">Registration No</label>
                           <input type="text" required class="form-control py-3 <?php echo e($errors->has('address')?'is-invalid':''); ?>" name="registration_no" value="<?php echo e(old('registration_no')); ?>" placeholder="<?php echo app('translator')->get('models/users.fields.registration_no'); ?>">
                           <span class="invalid-feedback">
                               <?php if($errors->has('registration_no')): ?>
                               <strong><?php echo e($errors->first('registration_no')); ?></strong>
                               <?php else: ?>
                               <strong>Enter a valid registratrion number</strong>
                               <?php endif; ?>
                           </span>
                     </div>
                     <div class="mt-2 d-flex form-group">
                        <div class="col-4">
                           <label for="city" class="form-label" style="font-size:12px; font-weight:bold">City</label>
                           <input type="text"  required class="form-control py-3 <?php echo e($errors->has('city')?'is-invalid':''); ?>" name="city" value="<?php echo e(old('city')); ?>" placeholder="<?php echo app('translator')->get('models/users.fields.city'); ?>">

                           <span class="invalid-feedback">
                               <?php if($errors->has('city')): ?>
                               <strong><?php echo e($errors->first('city')); ?></strong>
                               <?php else: ?>
                               <strong>Please enter city.</strong>
                               <?php endif; ?>
                           </span>


                        </div>
                        <div class="col-7 ms-auto">
                           <label for="country" class="form-label"
                              style="font-size:12px; font-weight:bold">Country</label>
                              <select required class="form-control py-3 <?php echo e($errors->has('country')?'is-invalid':''); ?>" name="country">
                                <option selected disabled>Select country</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->code); ?>"><?php echo e($country->name); ?> - <?php echo e($country->code); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="invalid-feedback">
                                <?php if($errors->has('country')): ?>
                                <strong><?php echo e($errors->first('country')); ?></strong>
                                <?php else: ?>
                                <strong>Please select a country.</strong>
                                <?php endif; ?>
                            </span>

                        </div>
                     </div>
                     <div class="mt-2 d-flex form-group">
                        <div class="col-4">
                           <label for="postal" class="form-label"
                              style="font-size:12px; font-weight:bold">Postal Code</label>
                              <input type="text" required class="form-control py-3 <?php echo e($errors->has('postal')?'is-invalid':''); ?>" name="postal" value="<?php echo e(old('postal')); ?>" placeholder="<?php echo app('translator')->get('models/users.fields.postal'); ?>">
                              <span class="invalid-feedback">
                                  <?php if($errors->has('postal')): ?>
                                  <strong>Please enter postal code.</strong>
                                  <?php else: ?>
                                  <?php endif; ?>
                              </span>


                        </div>
                        <div class="col-7 ms-auto">
                           <label for="industry_type" class="form-label"
                              style="font-size:12px; font-weight:bold">Industry Type</label>
                              <select required class="form-control py-3 <?php echo e($errors->has('industry')?'is-invalid':''); ?>" name="industry">

                                <option value="" disabled selected>Select industry type</option>
                                <option  value="Technology">Technology</option>
                                <option  value="Healthcare">Healthcare</option>
                                <option  value="Finance">Finance</option>
                                <option  value="Education">Education</option>
                                <option  value="Manufacturing">Manufacturing</option>
                                <option  value="Retail">Retail</option>
                                <option  value="Hospitality">Hospitality</option>
                                <option  value="Transportation">Transportation</option>
                                <option  value="Media">Media</option>
                                <option  value="Other">Other</option>
                           </select>
                           <span class="invalid-feedback">
                            <?php if($errors->has('industry')): ?>
                            <strong><?php echo e($errors->first('industry')); ?></strong>
                            <?php else: ?>
                            <strong>Please select a industry.</strong>
                            <?php endif; ?>
                        </span>
                        </div>
                     </div>
                     <div id="selected-countries"></div>
                     <button type="button" class="my-3 text-white w-100 btn btn-primary" data-bs-toggle="modal" data-bs-target="#countryModal">
                     Select Faviroute Shipping Countries
                     </button>
                     <button type="submit"
                        class="mt-3 p-2 btn col-12 text-white btn-primary btn-block font-weight-bold"
                        style="font-size:15px;">CONTINUE</button>

               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="countryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">                            Select Faviroute Shipping Countries
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body d-flex justify-content-between flex-wrap">
                  <?php $__currentLoopData = $continents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=> $cont): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <h5 class="my-2 w-100">   <input type="checkbox" role="button" class="form-check-input continent-checkbox" name="<?php echo e($index); ?>" id="<?php echo e($index); ?>" value="<?php echo e($index); ?>"> <?php echo e($index); ?>  </h5>
                  <?php $__currentLoopData = $cont; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="form-check col-md-3 col-sm-4 my-2">
                     <input class="form-check-input country <?php echo e($index); ?>" name="Favcountries[]" role="button" type="checkbox" value=<?php echo e($country); ?>  >
                     <label class="form-check-label" >
                     <?php echo e($country); ?>

                     </label>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <!-- Add more countries as needed -->
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      </form>
   </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>
</html>
<script>
   document.addEventListener('DOMContentLoaded', function() {
       const orgForm = document.getElementById('orgForm');

       orgForm.addEventListener('submit', function(event) {
           if (!orgForm.checkValidity()) {
               // Form has validation errors, prevent form submission
               event.preventDefault();
               event.stopPropagation();
           }

           orgForm.classList.add('was-validated'); // Add 'was-validated' class to enable Bootstrap's styles
       });
   });

</script>
<script>
   // Get all checkboxes with class 'country'
   const checkboxes = document.querySelectorAll('.country');

   // Get the div to display selected countries
   const selectedCountriesDiv = document.getElementById('selected-countries');

   // Function to update selected countries in the HTML tag
   function updateSelectedCountries() {
       const selectedCountries = Array.from(checkboxes)
           .filter(checkbox => checkbox.checked)
           .map(checkbox => checkbox.value);
   //        selectedCountriesDiv.textContent = `Selected Countries: ${selectedCountries.join(', ')}`;
   }


   // Add event listener to each checkbox
   checkboxes.forEach(checkbox => {
       checkbox.addEventListener('change', updateSelectedCountries);
   });
   // Get all continent checkboxes
   const continentCheckboxes = document.querySelectorAll('.continent-checkbox');

   // Function to handle continent checkbox change
   function handleContinentChange(event) {
   const continentName = event.target.value;
   const countryCheckboxes = document.querySelectorAll(`.country.${continentName}`);
   countryCheckboxes.forEach(checkbox => {
       checkbox.checked = event.target.checked;
       updateSelectedCountries();
   });
   }

   // Add event listener to continent checkboxes
   continentCheckboxes.forEach(checkbox => {
   checkbox.addEventListener('change', handleContinentChange);
   });
</script><?php /**PATH D:\Admin Panels\gcl\resources\views/auth/organization.blade.php ENDPATH**/ ?>