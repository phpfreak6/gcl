<?php echo Form::open(['route' => ['users.destroy', $id], 'method' => 'delete']); ?>

<div class='btn-group'>
    <a href="<?php echo e(route('users.show', $id)); ?>" class='btn btn-outline-primary'>
        <i class="fa fa-eye"></i>
     </a>
    <a href="<?php echo e(route('users.edit',$id)); ?>"  class='btn btn-outline-info'>
        <i class="fas fa-pen"></i>
     </a>
    <?php if($id != 1): ?>
        <?php echo Form::button('<i class="fas fa-trash text-danger"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-outline-danger',
            'onclick' => "return confirm('Are you sure?')"
        ]); ?>

    <?php endif; ?>
</div>
<?php echo Form::close(); ?>

<?php /**PATH D:\xampp\htdocs\devapp.shipflow.co.uk\resources\views/users/datatables_actions.blade.php ENDPATH**/ ?>