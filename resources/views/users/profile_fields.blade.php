<div class="text-center">
    <img class="profile-user-img img-fluid"
    src="{{ isset($user->image) ? asset('dist/img/'.$user->image) : asset('dist/img/avatar.png') }}"
    alt="User profile picture">
</div>
<h3 class="profile-username text-center">{{ $user->name }}</h3>
<p class="text-muted text-center">
    @foreach($user->roles as $role)
       {{ $role->name .' '}}
    @endforeach
</p>
<ul class="list-group list-group-unbordered mb-3">
    <li class="list-group-item">
        <b>Full Name</b> <a class="float-right">{{ $user->full_name}}</a>
    </li>
    <li class="list-group-item">
        <b>EMAIL</b> <a class="float-right">{{ $user->email}}</a>
    </li>
</ul>
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('password', 'Password') !!}
        <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }}" name="password" value="{{ old('password') }}" >
        @if ($errors->has('password'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
            </span>
        @else
            <span class="help-block text-danger" style="font-size: small;">Please leave it blank if you don't want to change password</span>
        @endif
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('password_confirmation', 'Confirm Password') !!}
        <input type="password" name="password_confirmation" class="form-control" >
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('company_name', __('models/users.fields.company_name').':') !!}
        {!! Form::text('company_name', null, ['class' => ($errors->has('company_name')) ? 'form-control is-invalid' : 'form-control'] ) !!}
        @if ($errors->has('company_name'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('company_name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('phone_no', __('models/users.fields.phone_no').':') !!}
        {!! Form::text('phone_no', null, ['class' => ($errors->has('phone_no')) ? 'form-control is-invalid' : 'form-control'] ) !!}
        @if ($errors->has('phone_no'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('phone_no') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('town', __('models/users.fields.town').':') !!}
        {!! Form::text('town', null, ['class' => ($errors->has('town')) ? 'form-control is-invalid' : 'form-control'] ) !!}
        @if ($errors->has('town'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('town') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('city', __('models/users.fields.city').':') !!}
        {!! Form::text('city', null, ['class' => ($errors->has('city')) ? 'form-control is-invalid' : 'form-control'] ) !!}
        @if ($errors->has('city'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('city') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('postal', __('models/users.fields.postal').':') !!}
        {!! Form::text('postal', null, ['class' => ($errors->has('postal')) ? 'form-control is-invalid' : 'form-control'] ) !!}
        @if ($errors->has('postal'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('postal') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('country', __('models/users.fields.country').':') !!}
        <select class="form-control {{ $errors->has('country')?'is-invalid':'' }}" name="country">
            <option selected disabled>Select country</option>
            @foreach ($countries as $country)
                <option value="{{ $country->name }}" {{ $country->name == old('country', $user->country) ? 'selected' : '' }}>
                    {{ $country->name }} - {{ $country->code }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('country'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('country') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-12">
        {!! Form::label('address_1', __('models/users.fields.address_1').':') !!}
        {!! Form::text('address_1', null, ['class' => ($errors->has('address_1')) ? 'form-control is-invalid' : 'form-control'] ) !!}
        @if ($errors->has('address_1'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('address_1') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-12">
        {!! Form::label('address_2', __('models/users.fields.address_2').':') !!}
        {!! Form::text('address_2', null, ['class' => ($errors->has('address_2')) ? 'form-control is-invalid' : 'form-control'] ) !!}
        @if ($errors->has('address_2'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('address_2') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-md-12">
        <label for="image">Profile Image</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>
    </div>
</div>
<!-- Submit Field -->
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::submit('Update Detail', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
