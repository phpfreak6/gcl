
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo e(config('app.name')); ?></title>
    <meta name="token" content="<?php echo e(csrf_token()); ?>">
    <meta name="base-url" content="<?php echo e(url('/')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?php echo e(route('home')); ?>" class="h3"><b>PMS</b> System</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg"><?php echo app('translator')->get('auth.forgot_password.title'); ?></p>
                <form method="post" action="<?php echo e(url('/password/email')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control <?php echo e($errors->has('email')?'is-invalid':''); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo app('translator')->get('auth.email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    <a class="text-primary" href="<?php echo e(route('do_login')); ?>">Back to login</a>
                </p>
            </div>
        </div>
    </div>
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH /home/coukshipflow/public_html/devapp.shipflow.co.uk/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>