<div class="row">
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b><?php echo app('translator')->get('models/pickups.fields.date'); ?></b> <br><a class="text-left"><?php echo e($pickup->date); ?></a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b><?php echo app('translator')->get('models/pickups.fields.earliest_time'); ?></b> <br><a class="text-left"><?php echo e($pickup->earliest_time); ?></a>
        </li>
    </div>
    <div class="col-md-4 col-sm-6">
        <li class="list-group-item mb-3">
            <b><?php echo app('translator')->get('models/pickups.fields.latest_time'); ?></b> <br><a class="text-left"><?php echo e($pickup->latest_time); ?></a>
        </li>
    </div>
    <div class="col-md-2 col-sm-6">
        <li class="list-group-item mb-3">
            <b><?php echo app('translator')->get('models/pickups.fields.courier'); ?></b> <br><a class="text-left"><?php echo e($pickup->courier); ?></a>
        </li>
    </div>
    <div class="col-md-2 col-sm-6">
        <li class="list-group-item mb-3">
            <b><?php echo app('translator')->get('models/pickups.fields.no_packages'); ?></b> <br><a class="text-left"><?php echo e($pickup->no_packages); ?></a>
        </li>
    </div>
    <div class="col-md-2 col-sm-6">
        <li class="list-group-item mb-3">
            <b><?php echo app('translator')->get('models/pickups.fields.weight'); ?></b> <br><a class="text-left"><?php echo e($pickup->weight); ?></a>
        </li>
    </div>
    <div class="col-md-2 col-sm-12">
        <li class="list-group-item mb-3">
            <b><?php echo app('translator')->get('models/pickups.fields.length'); ?></b> <br><a class="text-left"><?php echo e($pickup->length); ?></a>
        </li>
    </div>
    <div class="col-md-2 col-sm-12">
        <li class="list-group-item mb-3">
            <b><?php echo app('translator')->get('models/pickups.fields.width'); ?></b> <br><a class="text-left"><?php echo e($pickup->width); ?></a>
        </li>
    </div>
    <div class="col-md-2 col-sm-12">
        <li class="list-group-item mb-3">
            <b><?php echo app('translator')->get('models/pickups.fields.height'); ?></b> <br><a class="text-left"><?php echo e($pickup->height); ?></a>
        </li>
    </div>
    <div class="col-md-12 col-sm-6">
        <li class="list-group-item mb-3">
            <b><?php echo app('translator')->get('models/pickups.fields.instructions'); ?></b> <br><a class="text-left"><?php echo e($pickup->instructions); ?></a>
        </li>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\gcl\resources\views/pickups/show_fields.blade.php ENDPATH**/ ?>