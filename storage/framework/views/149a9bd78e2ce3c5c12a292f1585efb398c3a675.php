

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
                        <h1 class="m-0 text-dark">Couriers</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body mt-5 table-responsive bg-white py-4 rounded">
            <div class="w-100 d-flex justify-content-end mb-2 border-bottom" >

                <a href="<?php echo e(route('couriers.add')); ?>" class="ms-auto my-1 btn btn-primary text-white">Add New Courier</a>
               </div>
            <table id="courierTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Courier Name</th>
                        <th>Auth Company</th>
                        <th>Short Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $couriers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><img src="<?php echo e(asset($courier->logo)); ?>" alt="Logo" style="max-height: 50px;"></td>
                        <td><?php echo e($courier->courier_name); ?></td>
                        <td><?php echo e($courier->auth_company); ?></td>
                        <td><?php echo e($courier->short_description); ?></td>
                        <td>
                            <a href="#" class="btn btn-info text-white view-btn" data-toggle="modal" data-target="#viewModal" data-details="<?php echo e(json_encode($courier)); ?>">View</a>
                            <a href="<?php echo e(route('courier-services.index', $courier->id)); ?>" class="btn btn-secondary">Services</a>
                            
                            <a href="<?php echo e(route('couriers.edit', $courier->id)); ?>" class="btn btn-primary">Edit</a>
<button class="btn btn-danger delete-btn" data-id="<?php echo e($courier->id); ?>">Delete</button>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Courier Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Courier details will be filled by JavaScript -->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function () {
    $('#courierTable').DataTable();

    // Handle click event on "View" button
    $('.view-btn').on('click', function () {
        var details = $(this).data('details');
        var modalBody = $('#viewModal .modal-body');
        modalBody.empty(); // Clear previous details

        // Generate and append details content
        $.each(details, function(key, value) {
            if(key !== 'logo') { // Exclude the logo from text details
                modalBody.append('<p><strong>' + key.charAt(0).toUpperCase() + key.slice(1) + ':</strong> ' + value + '</p>');
            } else {
                modalBody.append('<img src="<?php echo e(asset('')); ?>' + value + '" alt="Logo" style="max-width: 100%;">');
            }
        });

        $('#viewModal').modal('show');
    });
});
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function () {
    $('#courierTable').DataTable();

    $('.delete-btn').on('click', function () {
        var courierId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed to delete the courier using AJAX
                $.ajax({
                    url: '/couriers/' + courierId,
                    type: 'DELETE',
                    method:'delete',
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                    },
                    success: function(response) {
                        // On success, reload the DataTable or remove the row
                        $('#courierTable').DataTable().row($('[data-id="' + courierId + '"]').parents('tr')).remove().draw();

                        // Show success message
                        toastr.success('Courier successfully deleted');
                    },
                    error: function(xhr) {
                        // Show error message
                        toastr.error('Error deleting courier');
                        console.log("Error",xhr);
                    }
                });
            }
        })
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/coukshipflow/public_html/devapp.shipflow.co.uk/resources/views/couriers/show.blade.php ENDPATH**/ ?>