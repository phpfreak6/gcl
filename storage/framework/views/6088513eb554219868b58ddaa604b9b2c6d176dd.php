

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        a {
      text-decoration: none; /* Remove underline */
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
                    <div class="mt-4 ml-4 text-left" style="font-size:25px;">
                        <P>Welcome Back!</P>
                    </div>

                    <form id="loginForm" method="post" action="<?php echo e(route('do_login')); ?>" class="px-3 needs-validation" novalidate>
                        <!-- Form fields -->
<?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="email" style="font-size:12px; font-weight:bold">Email</label>
                            <input type="email" class="form-control py-3 <?php echo e($errors->has('email')?'is-invalid':''); ?>" required name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo app('translator')->get('auth.email'); ?>">


                            <span class="invalid-feedback">
                                <?php if($errors->has('email')): ?>
                                <strong><?php echo e($errors->first('email')); ?></strong>
                                <?php else: ?>
                                <strong>Enter a vaild email</strong>
                                <?php endif; ?>
                            </span>

                        </div>

                        <div class="form-group">
                            <label for="password" style="font-size:12px; font-weight:bold">Password</label>
                            <input type="password" class="form-control py-3 <?php echo e($errors->has('password')?'is-invalid':''); ?>" required name="password" placeholder="<?php echo app('translator')->get('auth.password'); ?>">

                            <span class="invalid-feedback">
                                <?php if($errors->has('password')): ?>
                            <strong><?php echo e($errors->first('password')); ?></strong>
                            <?php else: ?>
                            <strong>Enter a password</strong>

                            <?php endif; ?>
                            </span>
                        </div>

                        <!-- Remaining form fields -->

                        <button  type="submit" class="mt-3 p-2 btn btn-primary text-white col-12 btn-block font-weight-bold" style="font-size:15px;">LOG IN</button>

                        <div class="mt-4">
                            <a href="<?php echo e(url('/password/reset')); ?>" class="text-danger">Forgot Password?</a>
                        </div>

                        <p class="mt-3">Not on My Parcel Delivery? <a href="<?php echo e(route('register')); ?>">Create an account</a></p>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


</body>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('loginForm');

        loginForm.addEventListener('submit', function(event) {
            if (!loginForm.checkValidity()) {
                // Form has validation errors, prevent form submission
                event.preventDefault();
                event.stopPropagation();
            }

            loginForm.classList.add('was-validated'); // Add 'was-validated' class to enable Bootstrap's styles
        });
    });
</script>

</html><?php /**PATH /home/coukshipflow/public_html/devapp.shipflow.co.uk/resources/views/auth/login.blade.php ENDPATH**/ ?>