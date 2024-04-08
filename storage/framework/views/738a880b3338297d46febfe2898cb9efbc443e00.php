<div class="row d-flex flex-wrap align-items-start">
    <div class="col-md-6 my-3">
        <h4>Personal Details</h4>
        <div class="col-md-11 col-12">
            <div class="form-group">
                <?php echo Form::label('dcID', __('models/users.fields.dcID') . ':'); ?>

                <?php echo Form::text('dcID', null, [
                    'class' => $errors->has('dcID') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]); ?>

                <?php if($errors->has('dcID')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('dcID')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-11 col-12 py-2">
            <div class="form-group">
                <?php echo Form::label('first_name', __('auth.first_name') . ':'); ?>

                <?php echo Form::text('first_name', null, [
                    'class' => $errors->has('first_name') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]); ?>

                <?php if($errors->has('first_name')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('first_name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-11 col-12 py-2">
            <div class="form-group">
                <?php echo Form::label('last_name', __('auth.last_name') . ':'); ?>

                <?php echo Form::text('last_name', null, [
                    'class' => $errors->has('last_name') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]); ?>

                <?php if($errors->has('last_name')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('last_name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-11 col-12">
            <div class="form-group">
                <?php echo Form::label('phone_no', __('models/users.fields.phone_no') . ':'); ?>

                <?php echo Form::text('phone_no', null, [
                    'class' => $errors->has('phone_no') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]); ?>

                <?php if($errors->has('phone_no')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('phone_no')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-11 col-12 py-2">
            <div class="form-group">
                <?php echo Form::label('email', __('auth.email') . ':'); ?>

                <?php echo Form::email('email', null, [
                    'class' => $errors->has('email') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]); ?>

                <?php if($errors->has('email')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-11 col-12">
            <div class="form-group">
                <?php echo Form::label('password', __('auth.password') . ':'); ?>

                <input type="password" class="form-control <?php echo e($errors->has('password') ? 'is-invalid py-3' : 'py-3'); ?>"
                    name="password">
                <?php if($errors->has('password')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-11 col-12">
            <div class="form-group">
                <?php echo Form::label('password_confirmation', __('auth.confirm_password') . ':'); ?>

                <input type="password" class="form-control py-3" name="password_confirmation">
                <?php if($errors->has('password_confirmation')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 my-3">
        <h4>Company Details</h4>
        <div class="col-md-11 col-12">
            <div class="form-group">
                <?php echo Form::label('company_name', __('models/users.fields.company_name') . ':'); ?>

                <?php echo Form::text('company_name', null, [
                    'class' => $errors->has('company_name') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]); ?>

                <?php if($errors->has('company_name')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('company_name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="col-md-11 col-12">
            <div class="form-group">
                <?php echo Form::label('registration_no', __('models/users.fields.registration_no') . ':'); ?>

                <?php echo Form::text('registration_no', null, [
                    'class' => $errors->has('registration_no') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]); ?>

                <?php if($errors->has('registration_no')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('registration_no')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        
        
        <div class="col-md-11 col-12">
            <div class="form-group">
                <?php echo Form::label('city', __('models/users.fields.city') . ':'); ?>

                <?php echo Form::text('city', null, [
                    'class' => $errors->has('city') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]); ?>

                <?php if($errors->has('city')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('city')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-11 col-12">
            <div class="form-group">
                <?php echo Form::label('postal', __('models/users.fields.postal') . ':'); ?>

                <?php echo Form::text('postal', null, [
                    'class' => $errors->has('postal') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]); ?>

                <?php if($errors->has('postal')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('postal')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-11 col-12">
            <div class="form-group">
                <?php echo Form::label('country', __('models/users.fields.country') . ':'); ?>

                <select class="form-control <?php echo e($errors->has('country') ? 'is-invalid py-3' : 'py-3'); ?>" name="country">
                    <option selected disabled>Select country</option>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->code); ?>"
                            <?php echo e(isset($user) && $country->code == old('country', $user->country) ? 'selected' : ''); ?>>
                            <?php echo e($country->name); ?> - <?php echo e($country->code); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('country')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('country')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-11 col-12">
            <div class="form-group">
                <?php echo Form::label('address_1', __('models/users.fields.address_1') . ':'); ?>

                <?php echo Form::text('address_1', null, [
                    'class' => $errors->has('address_1') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]); ?>

                <?php if($errors->has('address_1')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('address_1')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-11 col-12">
            <div class="form-group">
                <?php echo Form::label('address_2', __('models/users.fields.address_2') . ':'); ?>

                <?php echo Form::text('address_2', null, [
                    'class' => $errors->has('address_2') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]); ?>

                <?php if($errors->has('address_2')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('address_2')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-11 col-12">
            <label for="industry_type" class="form-label" style="font-size:12px; font-weight:bold">Industry Type</label>
            <select required class="form-control py-3 <?php echo e($errors->has('industry') ? 'is-invalid' : ''); ?>"
                name="industry">
                <option value="" disabled selected>Select industry type</option>
                <option <?php echo e($user->industry == 'Technology' ? 'selected' : ''); ?> value="Technology">Technology</option>
                <option <?php echo e($user->industry == 'Healthcare' ? 'selected' : ''); ?> value="Healthcare">Healthcare</option>
                <option <?php echo e($user->industry == 'Finance' ? 'selected' : ''); ?> value="Finance">Finance</option>
                <option <?php echo e($user->industry == 'Education' ? 'selected' : ''); ?> value="Education">Education</option>
                <option <?php echo e($user->industry == 'Manufacturing' ? 'selected' : ''); ?> value="Manufacturing">Manufacturing
                </option>
                <option <?php echo e($user->industry == 'Retail' ? 'selected' : ''); ?> value="Retail">Retail</option>
                <option <?php echo e($user->industry == 'Hospitality' ? 'selected' : ''); ?> value="Hospitality">Hospitality
                </option>
                <option <?php echo e($user->industry == 'Transportation' ? 'selected' : ''); ?> value="Transportation">
                    Transportation
                </option>
                <option <?php echo e($user->industry == 'Media' ? 'selected' : ''); ?> value="Media">Media</option>
                <option <?php echo e($user->industry == 'Other' ? 'selected' : ''); ?> value="Other">Other</option>
            </select>
            <span class="invalid-feedback">
                <?php if($errors->has('industry')): ?>
                    <strong><?php echo e($errors->first('industry')); ?></strong>
                <?php else: ?>
                    <strong>Please select a industry.</strong>
                <?php endif; ?>
            </span>
        </div>
        <div class="col-md-11 col-12">
            <label for="payment_method_id" class="form-label" style="font-size:12px; font-weight:bold">Payment
                Method</label>

            <select id="payment_method" name="payment_method_id" required
                class="form-control py-3 <?php echo e($errors->has('payment_method') ? 'is-invalid' : ''); ?>">
                <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($paymentMethod->id); ?>"
                        <?php echo e($user->paymentMethod && $user->paymentMethod->id == $paymentMethod->id ? 'selected' : ''); ?>>
                        <?php echo e($paymentMethod->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <span class="invalid-feedback">
                <?php if($errors->has('industry')): ?>
                    <strong><?php echo e($errors->first('industry')); ?></strong>
                <?php else: ?>
                    <strong>Please select a industry.</strong>
                <?php endif; ?>
            </span>
        </div>
        <div id="selected-countries"></div>
        <button type="button" class="my-3 text-white w-100 btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#countryModal">
            Select Favourite Shipping Countries
        </button>
    </div>

    <div class="col-md-6 my-3">
        <h4>Contact Details</h4>

        <div class="col-md-11 col-12">
            <div class="form-group">
                <?php echo Form::label('contact_phone_no', __('models/users.fields.phone_no') . ':'); ?>

                <?php echo Form::text('contact_phone_no', null, [
                    'class' => $errors->has('contact_phone_no') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]); ?>

                <?php if($errors->has('contact_phone_no')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('contact_phone_no')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-11 col-12 py-2">
            <div class="form-group">
                <?php echo Form::label('contact_first_name', __('auth.first_name') . ':'); ?>

                <?php echo Form::text('contact_first_name', null, [
                    'class' => $errors->has('contact_first_name') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]); ?>

                <?php if($errors->has('contact_first_name')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('contact_first_name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-11 col-12 py-2">
            <div class="form-group">
                <?php echo Form::label('contact_last_name', __('auth.last_name') . ':'); ?>

                <?php echo Form::text('contact_last_name', null, [
                    'class' => $errors->has('contact_last_name') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]); ?>

                <?php if($errors->has('contact_last_name')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('contact_last_name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-11 col-12 py-2">
            <div class="form-group">
                <?php echo Form::label('contact_email', __('auth.email') . ':'); ?>

                <?php echo Form::email('contact_email', null, [
                    'class' => $errors->has('contact_email') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]); ?>

                <?php if($errors->has('contact_email')): ?>
                    <span class="invalid-feedback">
                        <strong><?php echo e($errors->first('contact_email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 mt-3">
        <div class="form-group">
            <?php echo Form::label('active', __('models/users.fields.active')); ?>

            <label class="checkbox-inline">
                <?php echo Form::hidden('active', 0); ?>

                <?php echo Form::checkbox('active', '1', null, []); ?>

            </label>
        </div>
    </div>
</div>
<hr>








<div class="modal fade" id="countryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Select Favourite Shipping Countries
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-between flex-wrap">
                <?php $__currentLoopData = $continents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $cont): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h5 class="my-2 w-100"> <input type="checkbox" role="button"
                            class="form-check-input continent-checkbox" name="<?php echo e($index); ?>"
                            id="<?php echo e($index); ?>" value="<?php echo e($index); ?>"> <?php echo e($index); ?> </h5>
                    <?php $__currentLoopData = $cont; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check col-md-3 col-sm-4 my-2">
                            <?php
                                $isFavorite = in_array($country, $favcountries);
                            ?>
                            <input class="form-check-input country <?php echo e($index); ?>" name="Favcountries[]"
                                role="button" type="checkbox" value="<?php echo e($country); ?>"
                                <?php echo e($isFavorite ? 'checked' : ''); ?>>
                            <label class="form-check-label">
                                <?php echo e($country); ?>

                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- Add more countries as needed -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>






<!-- Submit Field -->
<div class="row">
    <div class="form-group col-sm-12">
        <?php echo Form::submit('Save', ['class' => 'btn btn-primary text-white']); ?>

        <a href="<?php echo e(route('users.index')); ?>" class="btn btn-secondary">Cancel</a>
    </div>
</div>
<?php /**PATH E:\Codespace\devapp.shipflow.co.uk\resources\views/users/fields.blade.php ENDPATH**/ ?>