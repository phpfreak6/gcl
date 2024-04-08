<div class="row d-flex flex-wrap align-items-start">
    <div class="col-md-6 my-3">
        <h4>Personal Details</h4>
        <div class="col-md-11 col-12">
            <div class="form-group">
                {!! Form::label('dcID', __('models/users.fields.dcID') . ':') !!}
                {!! Form::text('dcID', null, [
                    'class' => $errors->has('dcID') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]) !!}
                @if ($errors->has('dcID'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('dcID') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-11 col-12 py-2">
            <div class="form-group">
                {!! Form::label('first_name', __('auth.first_name') . ':') !!}
                {!! Form::text('first_name', null, [
                    'class' => $errors->has('first_name') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]) !!}
                @if ($errors->has('first_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-11 col-12 py-2">
            <div class="form-group">
                {!! Form::label('last_name', __('auth.last_name') . ':') !!}
                {!! Form::text('last_name', null, [
                    'class' => $errors->has('last_name') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]) !!}
                @if ($errors->has('last_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-11 col-12">
            <div class="form-group">
                {!! Form::label('phone_no', __('models/users.fields.phone_no') . ':') !!}
                {!! Form::text('phone_no', null, [
                    'class' => $errors->has('phone_no') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]) !!}
                @if ($errors->has('phone_no'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('phone_no') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-11 col-12 py-2">
            <div class="form-group">
                {!! Form::label('email', __('auth.email') . ':') !!}
                {!! Form::email('email', null, [
                    'class' => $errors->has('email') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]) !!}
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-11 col-12">
            <div class="form-group">
                {!! Form::label('password', __('auth.password') . ':') !!}
                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid py-3' : 'py-3' }}"
                    name="password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-11 col-12">
            <div class="form-group">
                {!! Form::label('password_confirmation', __('auth.confirm_password') . ':') !!}
                <input type="password" class="form-control py-3" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6 my-3">
        <h4>Company Details</h4>
        <div class="col-md-11 col-12">
            <div class="form-group">
                {!! Form::label('company_name', __('models/users.fields.company_name') . ':') !!}
                {!! Form::text('company_name', null, [
                    'class' => $errors->has('company_name') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]) !!}
                @if ($errors->has('company_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('company_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        {{--
       <div class="col-md-11 col-12">
          <div class="form-group">
             {!! Form::label('business_location', __('models/users.fields.business_location').':') !!}
             {!! Form::text('business_location', null, ['class' => ($errors->has('business_location')) ? 'form-control is-invalid py-3' : 'form-control py-3'] ) !!}
             @if ($errors->has('business_location'))
             <span class="invalid-feedback">
             <strong>{{ $errors->first('business_location') }}</strong>
             </span>
             @endif
          </div>
       </div>
       --}}
        <div class="col-md-11 col-12">
            <div class="form-group">
                {!! Form::label('registration_no', __('models/users.fields.registration_no') . ':') !!}
                {!! Form::text('registration_no', null, [
                    'class' => $errors->has('registration_no') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]) !!}
                @if ($errors->has('registration_no'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('registration_no') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        {{--
       <div class="col-md-11 col-12">
          <div class="form-group">
             {!! Form::label('vat', __('models/users.fields.vat').':') !!}
             {!! Form::text('vat', null, ['class' => ($errors->has('vat')) ? 'form-control is-invalid py-3' : 'form-control py-3'] ) !!}
             @if ($errors->has('vat'))
             <span class="invalid-feedback">
             <strong>{{ $errors->first('vat') }}</strong>
             </span>
             @endif
          </div>
       </div>
       --}}
        {{--
       <div class="col-md-11 col-12">
          <div class="form-group">
             {!! Form::label('town', __('models/users.fields.town').':') !!}
             {!! Form::text('town', null, ['class' => ($errors->has('town')) ? 'form-control is-invalid py-3' : 'form-control py-3'] ) !!}
             @if ($errors->has('town'))
             <span class="invalid-feedback">
             <strong>{{ $errors->first('town') }}</strong>
             </span>
             @endif
          </div>
       </div>
       --}}
        <div class="col-md-11 col-12">
            <div class="form-group">
                {!! Form::label('city', __('models/users.fields.city') . ':') !!}
                {!! Form::text('city', null, [
                    'class' => $errors->has('city') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]) !!}
                @if ($errors->has('city'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-11 col-12">
            <div class="form-group">
                {!! Form::label('postal', __('models/users.fields.postal') . ':') !!}
                {!! Form::text('postal', null, [
                    'class' => $errors->has('postal') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]) !!}
                @if ($errors->has('postal'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('postal') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-11 col-12">
            <div class="form-group">
                {!! Form::label('country', __('models/users.fields.country') . ':') !!}
                <select class="form-control {{ $errors->has('country') ? 'is-invalid py-3' : 'py-3' }}" name="country">
                    <option selected disabled>Select country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->code }}"
                            {{ isset($user) && $country->code == old('country', $user->country) ? 'selected' : '' }}>
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
        </div>
        <div class="col-md-11 col-12">
            <div class="form-group">
                {!! Form::label('address_1', __('models/users.fields.address_1') . ':') !!}
                {!! Form::text('address_1', null, [
                    'class' => $errors->has('address_1') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]) !!}
                @if ($errors->has('address_1'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('address_1') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-11 col-12">
            <div class="form-group">
                {!! Form::label('address_2', __('models/users.fields.address_2') . ':') !!}
                {!! Form::text('address_2', null, [
                    'class' => $errors->has('address_2') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]) !!}
                @if ($errors->has('address_2'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('address_2') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-11 col-12">
            <label for="industry_type" class="form-label" style="font-size:12px; font-weight:bold">Industry Type</label>
            <select required class="form-control py-3 {{ $errors->has('industry') ? 'is-invalid' : '' }}"
                name="industry">
                <option value="" disabled selected>Select industry type</option>
                <option {{ $user->industry == 'Technology' ? 'selected' : '' }} value="Technology">Technology</option>
                <option {{ $user->industry == 'Healthcare' ? 'selected' : '' }} value="Healthcare">Healthcare</option>
                <option {{ $user->industry == 'Finance' ? 'selected' : '' }} value="Finance">Finance</option>
                <option {{ $user->industry == 'Education' ? 'selected' : '' }} value="Education">Education</option>
                <option {{ $user->industry == 'Manufacturing' ? 'selected' : '' }} value="Manufacturing">Manufacturing
                </option>
                <option {{ $user->industry == 'Retail' ? 'selected' : '' }} value="Retail">Retail</option>
                <option {{ $user->industry == 'Hospitality' ? 'selected' : '' }} value="Hospitality">Hospitality
                </option>
                <option {{ $user->industry == 'Transportation' ? 'selected' : '' }} value="Transportation">
                    Transportation
                </option>
                <option {{ $user->industry == 'Media' ? 'selected' : '' }} value="Media">Media</option>
                <option {{ $user->industry == 'Other' ? 'selected' : '' }} value="Other">Other</option>
            </select>
            <span class="invalid-feedback">
                @if ($errors->has('industry'))
                    <strong>{{ $errors->first('industry') }}</strong>
                @else
                    <strong>Please select a industry.</strong>
                @endif
            </span>
        </div>
        <div class="col-md-11 col-12">
            <label for="payment_method_id" class="form-label" style="font-size:12px; font-weight:bold">Payment
                Method</label>

            <select id="payment_method" name="payment_method_id" required
                class="form-control py-3 {{ $errors->has('payment_method') ? 'is-invalid' : '' }}">
                @foreach ($payment_methods as $paymentMethod)
                    <option value="{{ $paymentMethod->id }}"
                        {{ $user->paymentMethod && $user->paymentMethod->id == $paymentMethod->id ? 'selected' : '' }}>
                        {{ $paymentMethod->name }}
                    </option>
                @endforeach
            </select>

            <span class="invalid-feedback">
                @if ($errors->has('industry'))
                    <strong>{{ $errors->first('industry') }}</strong>
                @else
                    <strong>Please select a industry.</strong>
                @endif
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
                {!! Form::label('contact_phone_no', __('models/users.fields.phone_no') . ':') !!}
                {!! Form::text('contact_phone_no', null, [
                    'class' => $errors->has('contact_phone_no') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]) !!}
                @if ($errors->has('contact_phone_no'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('contact_phone_no') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-11 col-12 py-2">
            <div class="form-group">
                {!! Form::label('contact_first_name', __('auth.first_name') . ':') !!}
                {!! Form::text('contact_first_name', null, [
                    'class' => $errors->has('contact_first_name') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]) !!}
                @if ($errors->has('contact_first_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('contact_first_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-11 col-12 py-2">
            <div class="form-group">
                {!! Form::label('contact_last_name', __('auth.last_name') . ':') !!}
                {!! Form::text('contact_last_name', null, [
                    'class' => $errors->has('contact_last_name') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]) !!}
                @if ($errors->has('contact_last_name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('contact_last_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-11 col-12 py-2">
            <div class="form-group">
                {!! Form::label('contact_email', __('auth.email') . ':') !!}
                {!! Form::email('contact_email', null, [
                    'class' => $errors->has('contact_email') ? 'form-control is-invalid py-3' : 'form-control py-3',
                ]) !!}
                @if ($errors->has('contact_email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('contact_email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 mt-3">
        <div class="form-group">
            {!! Form::label('active', __('models/users.fields.active')) !!}
            <label class="checkbox-inline">
                {!! Form::hidden('active', 0) !!}
                {!! Form::checkbox('active', '1', null, []) !!}
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
                @foreach ($continents as $index => $cont)
                    <h5 class="my-2 w-100"> <input type="checkbox" role="button"
                            class="form-check-input continent-checkbox" name="{{ $index }}"
                            id="{{ $index }}" value="{{ $index }}"> {{ $index }} </h5>
                    @foreach ($cont as $country)
                        <div class="form-check col-md-3 col-sm-4 my-2">
                            @php
                                $isFavorite = in_array($country, $favcountries);
                            @endphp
                            <input class="form-check-input country {{ $index }}" name="Favcountries[]"
                                role="button" type="checkbox" value="{{ $country }}"
                                {{ $isFavorite ? 'checked' : '' }}>
                            <label class="form-check-label">
                                {{ $country }}
                            </label>
                        </div>
                    @endforeach
                @endforeach
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
        {!! Form::submit('Save', ['class' => 'btn btn-primary text-white']) !!}
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>
