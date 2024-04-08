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
            min-height: 100vh;
            /* 100% of the viewport height */
            align-items: end;
            overflow-x: hidden;
        }

        .login-panel {
            background-color: white;
            padding: 20px;
            border-radius: 20px 0px 0px 20px;
        }

        .separator {
            display: flex;
            align-items: center;
            text-align: center;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 3px solid #309cdc;
        }

        .separator:not(:empty)::before {
            margin-right: .25em;
        }

        .separator:not(:empty)::after {
            margin-left: .25em;
        }

        .btn-oval {
            border-radius: 50px;
            /* Make it oval-shaped by setting border-radius to half of the button height */
            border: 2px solid #309cdc;
            /* Blue border */
            background-color: white;
            /* White background */
            color: #309cdc;
            /* Blue text color */
            font-size: 15px;
            /* Adjust font size as needed */
            font-weight: bold;
            /* Bold text */
            padding: 10px 20px;
            /* Adjust padding as needed */
        }

        .btn-oval:hover {
            color: "white" !important
        }
    </style>

</head>

<body>


    <div class="container-fluid container-bg p-0">
        <div class="row justify-content-end align-items-center">
            <div class="col-sm-10 col-md-6 col-lg-4 col-12">
                <div class="login-panel">
                    <!-- Your login panel content here -->
                    <div class="ml-2 d-flex flex-row font-weight-bold mt-2" style="font-size:20px">
                        <img src="images/logo-1.png" alt="" width="170">

                    </div>
                    <div class="mt-4 ml-4 text-left" style="font-size:25px;">
                        <P>Create Your Login</P>
                    </div>

                    <form class="px-3 needs-validation" action="<?php echo e(route('do_register')); ?>" method="post"
                        id="signupForm" novalidate>
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="firstname" style="font-size:12px; font-weight:bold">First Name</label>
                            <input type="text"
                                class="form-control py-3 <?php echo e($errors->has('first_name') ? 'is-invalid' : ''); ?>" required
                                name="first_name" value="<?php echo e(old('first_name')); ?>" placeholder="<?php echo app('translator')->get('auth.first_name'); ?>">

                            <span class="invalid-feedback">
                                <?php if($errors->has('first_name')): ?>
                                    <strong><?php echo e($errors->first('first_name')); ?></strong>
                                <?php else: ?>
                                    <strong>Please provide a valid first name.</strong>
                                <?php endif; ?>
                            </span>

                        </div>
                        <div class="form-group">
                            <label for="lastname" style="font-size:12px; font-weight:bold">Last Name</label>
                            <input type="text"
                                class="form-control py-3 <?php echo e($errors->has('last_name') ? 'is-invalid' : ''); ?>" required
                                name="last_name" value="<?php echo e(old('last_name')); ?>" placeholder="<?php echo app('translator')->get('auth.last_name'); ?>">
                            <span class="invalid-feedback">
                                <?php if($errors->has('last_name')): ?>
                                    <strong><?php echo e($errors->first('last_name')); ?></strong>
                                <?php else: ?>
                                    <strong>Please provide a valid last name.</strong>
                                <?php endif; ?>
                            </span>

                        </div>
                        <div class="form-group">
                            <label for="phonenumber" style="font-size:12px; font-weight:bold">Phone Number</label>
                            <input type="text" required
                                class="form-control py-3 <?php echo e($errors->has('phone_no') ? 'is-invalid' : ''); ?>"
                                name="phone_no" value="<?php echo e(old('phone_no')); ?>" placeholder="<?php echo app('translator')->get('models/users.fields.phone_no'); ?>">

                            <span class="invalid-feedback">
                                <?php if($errors->has('phone_no')): ?>
                                    <strong><?php echo e($errors->first('phone_no')); ?></strong>
                                <?php else: ?>
                                    <strong>Please provide a valid phone number.</strong>
                                <?php endif; ?>
                            </span>

                        </div>
                        <div class="form-group">
                            <label for="email" style="font-size:12px; font-weight:bold">E-mail</label>
                            <input type="email" required
                                class="form-control py-3 <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>"
                                name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo app('translator')->get('auth.email'); ?>">

                            <span class="invalid-feedback">
                                <?php if($errors->has('email')): ?>
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                <?php else: ?>
                                    <strong>Please provide a valid email address.</strong>
                                <?php endif; ?>
                            </span>

                        </div>
                        <div class="form-group">
                            <label for="password" style="font-size:12px; font-weight:bold">Password</label>

                            <input type="password" required
                                class="form-control py-3 <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>"
                                name="password" placeholder="<?php echo app('translator')->get('auth.password'); ?>">

                            <span class="invalid-feedback">
                                <?php if($errors->has('password')): ?>
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                <?php endif; ?>
                                <strong>Enter a valid password</strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" style="font-size:12px; font-weight:bold">Confirm
                                Password</label>
                            <input required type="password" class="form-control py-3" name="password_confirmation"
                                placeholder="<?php echo app('translator')->get('auth.confirm_password'); ?>">

                            <span class="invalid-feedback">
                                <?php if($errors->has('password_confirmation')): ?>
                                    <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                <?php else: ?>
                                    <strong>Confirm password is required</strong>
                                <?php endif; ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="payment_method">Preferred Payment Method:</label>
                            <select id="payment_method" name="payment_method_id" class="form-control">
                                <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($payment_method->id); ?>"><?php echo e($payment_method->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <button type="submit"
                            class="mt-3 p-2 btn col-12 text-white btn-primary btn-block font-weight-bold"
                            style="font-size:15px;">CONTINUE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const signupForm = document.getElementById('signupForm');

        signupForm.addEventListener('submit', function(event) {
            if (!signupForm.checkValidity()) {
                // Form has validation errors, prevent form submission
                event.preventDefault();
                event.stopPropagation();
            }

            signupForm.classList.add(
                'was-validated'); // Add 'was-validated' class to enable Bootstrap's styles
        });
    });
</script>

</html>
<?php /**PATH /home/coukshipflow/public_html/devapp.shipflow.co.uk/resources/views/auth/register.blade.php ENDPATH**/ ?>