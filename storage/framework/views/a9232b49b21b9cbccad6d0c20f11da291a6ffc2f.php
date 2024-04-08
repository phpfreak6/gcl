<?php $__env->startSection('css'); ?>
    <?php echo $__env->make('layouts.datatables_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .badge-success{
            background-color: rgba(0, 128, 0, 0.622)
        }
        .badge-danger{
            background-color:#dc3545
        }
    </style>

<?php $__env->stopSection(); ?>

<?php echo $dataTable->table(['width' => '100%', 'class' => 'table table-hover table-bordered table-striped table-sm']); ?>


<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('layouts.datatables_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $dataTable->scripts(); ?>

<?php $__env->stopSection(); ?>
<?php /**PATH /home/coukshipflow/public_html/devapp.shipflow.co.uk/resources/views/users/table.blade.php ENDPATH**/ ?>