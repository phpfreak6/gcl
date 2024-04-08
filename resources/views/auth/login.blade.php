{{-- <!DOCTYPE html>
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
<body class="hold-transition login-page">
    @include('flash-message')

    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('home') }}" class="h3"><b>Portal</b>GCL</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form method="post" action="{{ route('do_login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control py-3 {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" placeholder="@lang('auth.email')">
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
                        <input type="password" class="form-control py-3 {{ $errors->has('password')?'is-invalid':'' }}" name="password" placeholder="@lang('auth.password')">
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
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1">
                    <a  href="{{ url('/password/reset') }}">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a  href="{{ route('register') }}">Register a new account</a>
                </p>
            </div>
          </div>


    </div>
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('/css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">

    <style>
        /* Custom CSS for the background image and login panel */
        .container-bg {
            background: url('images/background.png') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh; /* 100% of the viewport height */
            align-items: end;
            overflow-x:hidden;
        }

        .login-panel {
            background-color: white;
            padding: 20px;
            border-radius:20px  0px 0px 20px;
            height:100vh;


        }
        .specifyColor {
            accent-color: #90EE90;
        }
        a {
      text-decoration: none; /* Remove underline */
    }

    </style>

</head>
<body>


<div class="container-fluid container-bg p-0">
        <div class="row justify-content-end align-items-center">
            <div class="col-sm-10 col-md-6 col-lg-4 col-12">
                <div class="login-panel">
                    <!-- Your login panel content here -->
                    <div class="ml-2 d-flex flex-row font-weight-bold mt-5" style="font-size:20px">
                        <img src="images/logo-1.png" alt="" width="170" >
                    </div>
                    <div class="mt-4 ml-4 text-left" style="font-size:25px;">
                        <P>Welcome Back!</P>
                    </div>

                    <form id="loginForm" method="post" action="{{ route('do_login') }}" class="px-3 needs-validation" novalidate>
                        <!-- Form fields -->
@csrf
                        <div class="form-group">
                            <label for="email" style="font-size:12px; font-weight:bold">Email</label>
                            <input type="email" class="form-control py-3 {{ $errors->has('email')?'is-invalid':'' }}" required name="email" value="{{ old('email') }}" placeholder="@lang('auth.email')">


                            <span class="invalid-feedback">
                                @if ($errors->has('email'))
                                <strong>{{ $errors->first('email') }}</strong>
                                @else
                                <strong>Enter a vaild email</strong>
                                @endif
                            </span>

                        </div>

                        <div class="form-group">
                            <label for="password" style="font-size:12px; font-weight:bold">Password</label>
                            <input type="password" class="form-control py-3 {{ $errors->has('password')?'is-invalid':'' }}" required name="password" placeholder="@lang('auth.password')">

                            <span class="invalid-feedback">
                                @if ($errors->has('password'))
                            <strong>{{ $errors->first('password') }}</strong>
                            @else
                            <strong>Enter a password</strong>

                            @endif
                            </span>
                        </div>

                        <!-- Remaining form fields -->

                        <button  type="submit" class="mt-3 p-2 btn btn-primary text-white col-12 btn-block font-weight-bold" style="font-size:15px;">LOG IN</button>

                        <div class="mt-4">
                            <a href="{{ url('/password/reset') }}" class="text-danger">Forgot Password?</a>
                        </div>

                        <p class="mt-3">Not on My Parcel Delivery? <a href="{{ route('register') }}">Create an account</a></p>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


</body>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('loginForm');

        loginForm.addEventListener('submit', function(event) {
            if (!loginForm.checkValidity()) {
                // Form has validation errors, prevent form submission
                event.preventDefault();
                event.stopPropagation();
            }

            loginForm.classList.add('was-validated'); // Add 'was-validated' class to enable Bootstrap's styles
        });
    });
</script>

</html>