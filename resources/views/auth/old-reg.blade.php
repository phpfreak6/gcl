<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('home') }}" class="h3"><b>Portal</b>GCL</a>
            </div>
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new account</p>
                <form action="{{ route('do_register') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" class="form-control {{ $errors->has('first_name')?'is-invalid':'' }}" name="first_name" value="{{ old('first_name') }}" placeholder="@lang('auth.first_name')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @if ($errors->has('first_name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control {{ $errors->has('last_name')?'is-invalid':'' }}" name="last_name" value="{{ old('last_name') }}" placeholder="@lang('auth.last_name')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @if ($errors->has('last_name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" placeholder="@lang('auth.email')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }}" name="password" placeholder="@lang('auth.password')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control"
                            name="password_confirmation"
                            placeholder="@lang('auth.confirm_password')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                    {{-- Personal Information --}}
                    <p class="login-box-msg">Personal Detail</p>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control {{ $errors->has('company_name')?'is-invalid':'' }}" name="company_name" value="{{ old('company_name') }}" placeholder="@lang('models/users.fields.company_name')">
                        <div class="input-group-append">
                            <div class="input-group-text"></div>
                        </div>
                        @if ($errors->has('company_name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('company_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control {{ $errors->has('phone_no')?'is-invalid':'' }}" name="phone_no" value="{{ old('phone_no') }}" placeholder="@lang('models/users.fields.phone_no')">
                        <div class="input-group-append">
                            <div class="input-group-text"></div>
                        </div>
                        @if ($errors->has('phone_no'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('phone_no') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control {{ $errors->has('registration_no')?'is-invalid':'' }}" name="registration_no" value="{{ old('registration_no') }}" placeholder="@lang('models/users.fields.registration_no')">
                        <div class="input-group-append">
                            <div class="input-group-text"></div>
                        </div>
                        @if ($errors->has('registration_no'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('registration_no') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control {{ $errors->has('vat')?'is-invalid':'' }}" name="vat" value="{{ old('vat') }}" placeholder="@lang('models/users.fields.vat')">
                        <div class="input-group-append">
                            <div class="input-group-text"></div>
                        </div>
                        @if ($errors->has('vat'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('vat') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control {{ $errors->has('business_location')?'is-invalid':'' }}" name="business_location" value="{{ old('business_location') }}" placeholder="@lang('models/users.fields.business_location')">
                        <div class="input-group-append">
                            <div class="input-group-text"></div>
                        </div>
                        @if ($errors->has('business_location'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('business_location') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control {{ $errors->has('address_1')?'is-invalid':'' }}" name="address_1" value="{{ old('address_1') }}" placeholder="@lang('models/users.fields.address_1')">
                        <div class="input-group-append">
                            <div class="input-group-text"></div>
                        </div>
                        @if ($errors->has('address_1'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('address_1') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control {{ $errors->has('address')?'is-invalid':'' }}" name="address_2" value="{{ old('address_2') }}" placeholder="@lang('models/users.fields.address_2')">
                        <div class="input-group-append">
                            <div class="input-group-text"></div>
                        </div>
                        @if ($errors->has('address_2'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('address_2') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control {{ $errors->has('town')?'is-invalid':'' }}" name="town" value="{{ old('town') }}" placeholder="@lang('models/users.fields.town')">
                        <div class="input-group-append">
                            <div class="input-group-text"></div>
                        </div>
                        @if ($errors->has('town'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('town') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control {{ $errors->has('city')?'is-invalid':'' }}" name="city" value="{{ old('city') }}" placeholder="@lang('models/users.fields.city')">
                        <div class="input-group-append">
                            <div class="input-group-text"></div>
                        </div>
                        @if ($errors->has('city'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control {{ $errors->has('postal')?'is-invalid':'' }}" name="postal" value="{{ old('postal') }}" placeholder="@lang('models/users.fields.postal')">
                        <div class="input-group-append">
                            <div class="input-group-text"></div>
                        </div>
                        @if ($errors->has('postal'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('postal') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-control {{ $errors->has('country')?'is-invalid':'' }}" name="country">
                            <option selected disabled>Select country</option>
                            @foreach ($countries as $country)
                                <option value="{{$country->code}}">{{$country->name}} - {{$country->code}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text"></div>
                        </div>
                        @if ($errors->has('country'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>

                    </div>
                </form>
                <div class="social-auth-links text-center"></div>
                <a href="{{ route('login') }}" class="text-center">I already have an account</a>
            </div>

        </div>
    </div>


    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
