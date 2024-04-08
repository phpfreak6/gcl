<?php $__env->startSection('content'); ?>

<!-- Main content -->
<main id="main" class="main">
   <section class="section dashboard">
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-1" style="background-image:url(assets/images/logo_invoice-bg.png); background-repeat: no-repeat; background-size: cover;">
                    <div class="card-header">
                        <h5 class="card-title"><i class="fas fa-chart-pie mr-1"></i>Dashboard</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="progressbar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Admin Panels\gcl\resources\views/home.blade.php ENDPATH**/ ?>