<?php $__env->startSection('content'); ?>
<main id="main" class="main">
    <section class="section dashboard">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pickup Requests</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Pickup Requests</li>
                    </ol>
                </div>
            </div>
        </div>
  </div>
  <div class="content">
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Pickup Requests Detail</h3>
        </div>
        <div class="card-body table-responsive" >
            <?php echo $__env->make('pickups.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
    </section>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Codespace\devapp.shipflow.co.uk\resources\views/pickups/index.blade.php ENDPATH**/ ?>