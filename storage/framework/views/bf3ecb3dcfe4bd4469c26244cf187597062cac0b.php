<?php $__env->startSection('style'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main id="main" class="main">
    <section class="section dashboard">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><?php echo e($parentCourier ? $parentCourier->courier_name . ' ' : ''); ?>Courier Services</h1>
                    </div>
                </div>
            </div>
        </div>
        <?php if(session('success')): ?>
        <div class="alert alert-success my-3">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
        <div class="card-body mt-5 table-responsive bg-white py-4 rounded">
            <div class="w-100 d-flex justify-content-end mb-2 border-bottom">

                <a href="<?php echo e(route('courier-services.add')); ?>" class="ms-auto my-1 btn btn-primary text-white ">Add New Service</a>
            </div>
            <table id="serviceTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Courier Name</th>
                        <th>Service Name</th>
                        <th>Service ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($service->parentCourier->courier_name ?? 'N/A'); ?></td>
                        <td><?php echo e($service->Name); ?></td>
                        <td><?php echo e($service->service_id); ?></td>
                        <td>
                            <a class="btn btn-info text-white view-btn" onclick="viewclick(this)" data-toggle="modal" data-target="#viewServiceModal" data-details="<?php echo e(json_encode($service)); ?>">View</a>
                            <a href="<?php echo e(route('courier-services.edit', $service->id)); ?>" class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger delete-btn" data-id="<?php echo e($service->id); ?>">Delete</button>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<!-- View Service Modal -->
<div class="modal fade" id="viewServiceModal" tabindex="-1" role="dialog" aria-labelledby="viewServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewServiceModalLabel">Service Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Service details will be filled by JavaScript -->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        $('#serviceTable').DataTable();

        // View button click event
        // $('.view-btn').on('click', function() {
        window.viewclick = function (element){
            var details = $(element).data('details');
            console.log('details',details);
            var modalBody = $('#viewServiceModal .modal-body');
            modalBody.empty(); // Clear previous details

            // Append details content
            $.each(details, function(key, value) {
                modalBody.append('<p><strong>' + key.charAt(0).toUpperCase() + key.slice(1).replace(/_/g, ' ') + ':</strong> ' + value + '</p>');
            });

            $('#viewServiceModal').modal('show');
        };
        // });

        // Delete button functionality
        // Similar AJAX deletion logic as shown in the courier example
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\newgcl\gcl\resources\views/couriers/service/index.blade.php ENDPATH**/ ?>