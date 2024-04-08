<?php $__env->startSection('content'); ?>
<main id="main" class="main">
    <section class="section  dashboard">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo app('translator')->get('crud.detail'); ?> User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo route('users.index'); ?>">User</a></li>
                        <li class="breadcrumb-item active"><?php echo app('translator')->get('crud.detail'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-body p-5">
                        <h5 class="my-3 text-muted text-center"> <b>User Detail</b></h5>
                        <ul class="list-group list-group-unbordered mb-3">
                            <?php echo $__env->make('users.show_fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/coukshipflow/public_html/devapp.shipflow.co.uk/resources/views/users/show.blade.php ENDPATH**/ ?>