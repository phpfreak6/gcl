<div class="row">
    <div class="col-md-2 col-sm-6">
        <div class="form-group">
            {!! Form::label('date', __('models/pickups.fields.date').':') !!}
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i  style="height: 38px;" class="d-flex justify-content-center align-items-center far fa-calendar-alt"></i>
                    </span>
                </div>
                {!! Form::text('date', null, ['class' => ($errors->has('date')) ? 'form-control is-invalid datepicker' : 'form-control datepicker']) !!}
                @if ($errors->has('date'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('date') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-6">
        <div class="form-group">
            {!! Form::label('earliest_time', __('models/pickups.fields.earliest_time').':') !!}
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i  style="height: 38px;" class="d-flex justify-content-center align-items-center far fa-calendar-alt"></i>
                    </span>
                </div>
                {!! Form::text('earliest_time', null, ['class' => ($errors->has('earliest_time')) ? 'form-control is-invalid timepicker' : 'form-control timepicker']) !!}
                @if ($errors->has('earliest_time'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('earliest_time') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-6">
        <div class="form-group">
            {!! Form::label('latest_time', __('models/pickups.fields.latest_time').':') !!}
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <i  style="height: 38px;" class="d-flex justify-content-center align-items-center far fa-calendar-alt"></i>
                    </span>
                </div>
                {!! Form::text('latest_time', null, ['class' => ($errors->has('latest_time')) ? 'form-control is-invalid timepicker' : 'form-control timepicker']) !!}
                @if ($errors->has('latest_time'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('latest_time') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-6">
        <div class="form-group">
            {!! Form::label('courier', __('models/pickups.fields.courier').':') !!}
            {!! Form::select('courier', ['DHL' => 'DHL', 'DHLParcelUK' => 'DHLParcelUK', 'EvriCorporate' => 'EvriCorporate', 'Palletways' => 'Palletways'], null, ['class' => ($errors->has('type')) ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('courier'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('courier') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="form-group">
            {!! Form::label('instructions', __('models/pickups.fields.instructions').':') !!}
            {!! Form::text('instructions', null, ['class' => ($errors->has('instructions')) ? 'form-control is-invalid' : 'form-control']) !!}
            @if ($errors->has('instructions'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('instructions') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-2 col-sm-6">
        <div class="form-group">
            {!! Form::label('no_packages', __('models/pickups.fields.no_packages').':') !!}
            {!! Form::text('no_packages', null, ['class' => ($errors->has('no_packages')) ? 'form-control is-invalid' : 'form-control'] ) !!}
            @if ($errors->has('no_packages'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('no_packages') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2 col-sm-6">
        <div class="form-group">
            {!! Form::label('weight', __('models/pickups.fields.weight').':') !!}
            {!! Form::text('weight', null, ['class' => ($errors->has('weight')) ? 'form-control is-invalid' : 'form-control'] ) !!}
            @if ($errors->has('weight'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('weight') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2 col-sm-6">
        <div class="form-group">
            {!! Form::label('length', __('models/pickups.fields.length').':') !!}
            {!! Form::text('length', null, ['class' => ($errors->has('length')) ? 'form-control is-invalid' : 'form-control'] ) !!}
            @if ($errors->has('length'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('length') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('width', __('models/pickups.fields.width').':') !!}
            {!! Form::text('width', null, ['class' => ($errors->has('width')) ? 'form-control is-invalid' : 'form-control'] ) !!}
            @if ($errors->has('width'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('width') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('height', __('models/pickups.fields.height').':') !!}
            {!! Form::text('height', null, ['class' => ($errors->has('height')) ? 'form-control is-invalid' : 'form-control'] ) !!}
            @if ($errors->has('height'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('height') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<hr>
<!-- Submit Field -->
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('pickups.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
