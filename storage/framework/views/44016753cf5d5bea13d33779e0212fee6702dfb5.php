<div class="row">
    <div class="col-md-2 col-sm-6">
        <div class="form-group">
            <?php echo Form::label('date', __('models/pickups.fields.date').':'); ?>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i  style="height: 38px;" class="d-flex justify-content-center align-items-center far fa-calendar-alt"></i>
                    </span>
                </div>
                <?php echo Form::text('date', null, ['class' => ($errors->has('date')) ? 'form-control is-invalid datepicker' : 'form-control datepicker']); ?>

                <?php if($errors->has('date')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('date')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-6">
        <div class="form-group">
            <?php echo Form::label('earliest_time', __('models/pickups.fields.earliest_time').':'); ?>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i  style="height: 38px;" class="d-flex justify-content-center align-items-center far fa-calendar-alt"></i>
                    </span>
                </div>
                <?php echo Form::text('earliest_time', null, ['class' => ($errors->has('earliest_time')) ? 'form-control is-invalid timepicker' : 'form-control timepicker']); ?>

                <?php if($errors->has('earliest_time')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('earliest_time')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-6">
        <div class="form-group">
            <?php echo Form::label('latest_time', __('models/pickups.fields.latest_time').':'); ?>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i  style="height: 38px;" class="d-flex justify-content-center align-items-center far fa-calendar-alt"></i>
                    </span>
                </div>
                <?php echo Form::text('latest_time', null, ['class' => ($errors->has('latest_time')) ? 'form-control is-invalid timepicker' : 'form-control timepicker']); ?>

                <?php if($errors->has('latest_time')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('latest_time')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-6">
        <div class="form-group">
            <?php echo Form::label('courier', __('models/pickups.fields.courier').':'); ?>

            <?php echo Form::select('courier', ['DHL' => 'DHL', 'DHLParcelUK' => 'DHLParcelUK', 'EvriCorporate' => 'EvriCorporate', 'Palletways' => 'Palletways'], null, ['class' => ($errors->has('type')) ? 'form-control is-invalid' : 'form-control']); ?>

            <?php if($errors->has('courier')): ?>
                <span class="invalid-feedback">
                    <strong><?php echo e($errors->first('courier')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="form-group">
            <?php echo Form::label('instructions', __('models/pickups.fields.instructions').':'); ?>

            <?php echo Form::text('instructions', null, ['class' => ($errors->has('instructions')) ? 'form-control is-invalid' : 'form-control']); ?>

            <?php if($errors->has('instructions')): ?>
                <span class="invalid-feedback">
                    <strong><?php echo e($errors->first('instructions')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-2 col-sm-6">
        <div class="form-group">
            <?php echo Form::label('no_packages', __('models/pickups.fields.no_packages').':'); ?>

            <?php echo Form::text('no_packages', null, ['class' => ($errors->has('no_packages')) ? 'form-control is-invalid' : 'form-control'] ); ?>

            <?php if($errors->has('no_packages')): ?>
                <span class="invalid-feedback">
                    <strong><?php echo e($errors->first('no_packages')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-2 col-sm-6">
        <div class="form-group">
            <?php echo Form::label('weight', __('models/pickups.fields.weight').':'); ?>

            <?php echo Form::text('weight', null, ['class' => ($errors->has('weight')) ? 'form-control is-invalid' : 'form-control'] ); ?>

            <?php if($errors->has('weight')): ?>
                <span class="invalid-feedback">
                    <strong><?php echo e($errors->first('weight')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-2 col-sm-6">
        <div class="form-group">
            <?php echo Form::label('length', __('models/pickups.fields.length').':'); ?>

            <?php echo Form::text('length', null, ['class' => ($errors->has('length')) ? 'form-control is-invalid' : 'form-control'] ); ?>

            <?php if($errors->has('length')): ?>
                <span class="invalid-feedback">
                    <strong><?php echo e($errors->first('length')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <?php echo Form::label('width', __('models/pickups.fields.width').':'); ?>

            <?php echo Form::text('width', null, ['class' => ($errors->has('width')) ? 'form-control is-invalid' : 'form-control'] ); ?>

            <?php if($errors->has('width')): ?>
                <span class="invalid-feedback">
                    <strong><?php echo e($errors->first('width')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <?php echo Form::label('height', __('models/pickups.fields.height').':'); ?>

            <?php echo Form::text('height', null, ['class' => ($errors->has('height')) ? 'form-control is-invalid' : 'form-control'] ); ?>

            <?php if($errors->has('height')): ?>
                <span class="invalid-feedback">
                    <strong><?php echo e($errors->first('height')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
</div>
<hr>
<!-- Submit Field -->
<div class="row">
    <div class="form-group col-sm-12">
        <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

        <a href="<?php echo e(route('pickups.index')); ?>" class="btn btn-secondary">Cancel</a>
    </div>
</div>
<?php /**PATH D:\Admin Panels\gcl\resources\views/pickups/fields.blade.php ENDPATH**/ ?>