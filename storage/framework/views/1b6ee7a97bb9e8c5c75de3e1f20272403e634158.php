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
            height:100vh;


         }
        .specifyColor {
            accent-color: #90EE90;
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
                        <P >Contact Details</P>
                     </div>

                    <form  class="px-3 needs-validation" action="<?php echo e(route('save_contact')); ?>" method="post" id="contactForm" novalidate>
                        <?php echo csrf_field(); ?>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" role="button" class="specifyColor custom-control-input" id="sameAsPersonalDetails">
                            <label class="custom-control-label" for="sameAsPersonalDetails">Same as personal deatils</label>
                        </div>
                          <div class="form-group">
                              <label for="firstname" style="font-size:12px; font-weight:bold">First Name</label>
                              <input type="text" class="form-control py-3" id="contact_first_name" required name="contact_first_name" placeholder="<?php echo app('translator')->get('auth.first_name'); ?>">

                              <span class="invalid-feedback">
                                  <?php if($errors->has('contact_first_name')): ?>
                                  <strong><?php echo e($errors->first('contact_first_name')); ?></strong>
                                  <?php else: ?>
                                  <strong>Please provide a valid first name.</strong>
                                  <?php endif; ?>
                              </span>

                          </div>
                          <div class="form-group">
                              <label for="lastname" style="font-size:12px; font-weight:bold">Last Name</label>
                              <input type="text" class="form-control py-3" id="contact_last_name" required name="contact_last_name" placeholder="<?php echo app('translator')->get('auth.last_name'); ?>">
                              <span class="invalid-feedback">
                                  <?php if($errors->has('contact_last_name')): ?>
                                  <strong><?php echo e($errors->first('contact_last_name')); ?></strong>
                                  <?php else: ?>
                                  <strong>Please provide a valid last name.</strong>
                                  <?php endif; ?>
                              </span>

                          </div>
                          <div class="form-group">
                              <label for="phonenumber" style="font-size:12px; font-weight:bold">Phone Number</label>
                              <input type="text" class="form-control py-3" id="contact_phone_no" required name="contact_phone_no" placeholder="<?php echo app('translator')->get('models/users.fields.phone_no'); ?>">

                              <span class="invalid-feedback">
                                  <?php if($errors->has('contact_phone_no')): ?>
                                  <strong><?php echo e($errors->first('contact_phone_no')); ?></strong>
                                  <?php else: ?>
                                  <strong>Please provide a valid phone number.</strong>
                                  <?php endif; ?>
                              </span>

                          </div>
                          <div class="form-group">
                              <label for="email" style="font-size:12px; font-weight:bold">E-mail</label>
                              <input type="email" class="form-control py-3" id="email" required name="contact_email" placeholder="<?php echo app('translator')->get('auth.email'); ?>">

                              <span class="invalid-feedback">
                                  <?php if($errors->has('contact_email')): ?>
                                  <strong><?php echo e($errors->first('contact_email')); ?></strong>
                                  <?php else: ?>
                                  <strong>Please provide a valid email address.</strong>
                                  <?php endif; ?>
                              </span>

                          </div>


                          <button type="submit"
                              class="mt-3 p-2 btn col-12 text-white btn-primary btn-block font-weight-bold"
                              style="font-size:15px;">SIGN UP</button>
                      </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>
<script>


    document.addEventListener('DOMContentLoaded', function() {


        const contactForm = document.getElementById('contactForm');

        contactForm.addEventListener('submit', function(event) {

            if (!contactForm.checkValidity()) {
                // Form has validation errors, prevent form submission
                event.preventDefault();
                event.stopPropagation();
            }

            contactForm.classList.add('was-validated'); // Add 'was-validated' class to enable Bootstrap's styles
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Check the checkbox state when the page loads
        if ($('#sameAsPersonalDetails').prop('checked')) {
            // Fill form fields with data from session
            $('#contact_first_name').val('<?php echo e(session('user_data.first_name')); ?>');
            $('#contact_last_name').val('<?php echo e(session('user_data.last_name')); ?>');
            $('#contact_phone_no').val('<?php echo e(session('user_data.phone_no')); ?>');
            $('#email').val('<?php echo e(session('user_data.email')); ?>');
        }

        // Listen for checkbox change event
        $('#sameAsPersonalDetails').change(function() {
            // If checkbox is checked, fill form fields with session data
            if ($(this).prop('checked')) {
                $('#contact_first_name').val('<?php echo e(session('user_data.first_name')); ?>');
                $('#contact_last_name').val('<?php echo e(session('user_data.last_name')); ?>');
                $('#contact_phone_no').val('<?php echo e(session('user_data.phone_no')); ?>');
                $('#email').val('<?php echo e(session('user_data.email')); ?>');
            } else {
                // If checkbox is unchecked, clear form fields
                $('#contact_first_name').val('');
                $('#contact_last_name').val('');
                $('#contact_phone_no').val('');
                $('#email').val('');
            }
        });
    });
</script>
</html><?php /**PATH E:\Codespace\devapp.shipflow.co.uk\resources\views/auth/contact.blade.php ENDPATH**/ ?>