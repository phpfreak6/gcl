<?php $__env->startSection('content'); ?>
<main id="main" class="main">
    <section class="section dashboard">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo app('translator')->get('crud.detail'); ?> Pickup Request</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo route('pickups.index'); ?>">Pickup Request</a></li>
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
                        <h5 class="my-3 text-muted text-center"> <b>Customer Detail</b></h5>
                        <ul class="list-group list-group-unbordered mb-3">
                            <?php echo $__env->make('pickups.show_user_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-body p-5">
                        <h5 class="my-3 text-muted text-center"> <b>Request Detail</b></h5>
                        <ul class="list-group list-group-unbordered mb-3">
                            <?php echo $__env->make('pickups.show_fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-body p-5">
                        <h5 class="my-3 text-muted text-center"><b>Admin Comments</b></h5>

                        <form method="post" >
                            <?php echo csrf_field(); ?>

                            <div class="mb-3">
                                <label for="comments" class="form-label">Comments</label>
                                <textarea class="form-control" id="comments" name="comments" rows="3" placeholder="Enter your comments here"></textarea>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="markAsDone" name="markAsDone">
                                <label class="form-check-label" for="markAsDone">
                                    Mark as Done
                                </label>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </section>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Admin Panels\gcl\resources\views/pickups/show.blade.php ENDPATH**/ ?>