<?php echo Form::open(['route' => ['pickups.destroy', $id], 'method' => 'delete']); ?>

<div class='btn-group'>
    <a href="<?php echo e(route('pickups.show', $id)); ?>" class='btn btn-outline-primary'>
        <i class="fa fa-eye"></i>
    </a>
    <?php echo Form::button('<i class="fas fa-trash text-danger"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-outline-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]); ?>

</div>
<?php echo Form::close(); ?>

<?php /**PATH D:\xampp\htdocs\devapp.shipflow.co.uk\resources\views/pickups/datatables_actions.blade.php ENDPATH**/ ?>