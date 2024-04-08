<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main id="main" class="main">
    <section class="section dashboard">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><?php echo e(isset($courier) ? 'Edit' : 'Add'); ?> Courier</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body mt-5 table-responsive bg-white py-4 rounded">

            <form action="<?php echo e(isset($courier) ? route('couriers.update', $courier->id) : route('couriers.store')); ?>" method="POST" class="col-md-7 mx-auto" enctype="multipart/form-data">
                <?php if(session('success')): ?>
                    <div class="alert alert-success my-3">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                <?php echo csrf_field(); ?>
                <?php if(isset($courier)): ?>
                    <?php echo method_field('PUT'); ?>
                <?php endif; ?>

                <div class="form-group my-2">
                    <label for="courier_name">Courier Name</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['courier_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="courier_name" name="courier_name" placeholder="Enter Courier Name" value="<?php echo e(old('courier_name', isset($courier) ? $courier->courier_name : '')); ?>" required>
                    <?php $__errorArgs = ['courier_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group my-2">
                    <label for="auth_company">Auth Company</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['auth_company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="auth_company" name="auth_company" placeholder="Enter Auth Company" value="<?php echo e(old('auth_company', isset($courier) ? $courier->auth_company : '')); ?>" required>
                    <?php $__errorArgs = ['auth_company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group my-2">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control-file <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="logo" name="logo">
                    <?php if(isset($courier) && $courier->logo): ?>
                    <div class="mt-2">
                        <?php if(isset($courier) && $courier->logo): ?>
                            <img src="<?php echo e(asset($courier->logo)); ?>" alt="Current Logo" style="max-height: 100px;">
                        <?php endif; ?>
                    </div>

                    <?php endif; ?>
                    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group my-2">
                    <label for="short_description">Short Description</label>
                    <textarea class="form-control <?php $__errorArgs = ['short_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="short_description" name="short_description" rows="2" placeholder="Enter a short description"><?php echo e(old('short_description', isset($courier) ? $courier->short_description : '')); ?></textarea>
                    <?php $__errorArgs = ['short_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group my-2">
                    <label for="long_description">Long Description</label>
                    <textarea class="form-control <?php $__errorArgs = ['long_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="long_description" name="long_description" rows="4" placeholder="Enter a long description"><?php echo e(old('long_description', isset($courier) ? $courier->long_description : '')); ?></textarea>
                    <?php $__errorArgs = ['long_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="btn btn-primary"><?php echo e(isset($courier) ? 'Update' : 'Submit'); ?></button>
            </form>
        </div>
    </section>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\gcl\resources\views/couriers/add.blade.php ENDPATH**/ ?>