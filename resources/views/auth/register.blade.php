<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

    <link rel="stylesheet" href="{{ asset('/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <style>
        /* Custom CSS for the background image and login panel */
        .container-bg {
            background: url('images/background.png') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            /* 100% of the viewport height */
            align-items: end;
            overflow-x: hidden;
        }

        .login-panel {
            background-color: white;
            padding: 20px;
            border-radius: 20px 0px 0px 20px;
        }

        .separator {
            display: flex;
            align-items: center;
            text-align: center;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 3px solid #309cdc;
        }

        .separator:not(:empty)::before {
            margin-right: .25em;
        }

        .separator:not(:empty)::after {
            margin-left: .25em;
        }

        .btn-oval {
            border-radius: 50px;
            /* Make it oval-shaped by setting border-radius to half of the button height */
            border: 2px solid #309cdc;
            /* Blue border */
            background-color: white;
            /* White background */
            color: #309cdc;
            /* Blue text color */
            font-size: 15px;
            /* Adjust font size as needed */
            font-weight: bold;
            /* Bold text */
            padding: 10px 20px;
            /* Adjust padding as needed */
        }

        .btn-oval:hover {
            color: "white" !important
        }
    </style>

</head>

<body>


    <div class="container-fluid container-bg p-0">
        <div class="row justify-content-end align-items-center">
            <div class="col-sm-10 col-md-6 col-lg-4 col-12">
                <div class="login-panel">
                    <!-- Your login panel content here -->
                    <div class="ml-2 d-flex flex-row font-weight-bold mt-2" style="font-size:20px">
                        <img src="images/logo-1.png" alt="" width="170">

                    </div>
                    <div class="mt-4 ml-4 text-left" style="font-size:25px;">
                        <P>Create Your Login</P>
                    </div>

                    <form class="px-3 needs-validation" action="{{ route('do_register') }}" method="post"
                        id="signupForm" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="firstname" style="font-size:12px; font-weight:bold">First Name</label>
                            <input type="text"
                                class="form-control py-3 {{ $errors->has('first_name') ? 'is-invalid' : '' }}" required
                                name="first_name" value="{{ old('first_name') }}" placeholder="@lang('auth.first_name')">

                            <span class="invalid-feedback">
                                @if ($errors->has('first_name'))
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                @else
                                    <strong>Please provide a valid first name.</strong>
                                @endif
                            </span>

                        </div>
                        <div class="form-group">
                            <label for="lastname" style="font-size:12px; font-weight:bold">Last Name</label>
                            <input type="text"
                                class="form-control py-3 {{ $errors->has('last_name') ? 'is-invalid' : '' }}" required
                                name="last_name" value="{{ old('last_name') }}" placeholder="@lang('auth.last_name')">
                            <span class="invalid-feedback">
                                @if ($errors->has('last_name'))
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                @else
                                    <strong>Please provide a valid last name.</strong>
                                @endif
                            </span>

                        </div>
                        <div class="form-group">
                            <label for="phonenumber" style="font-size:12px; font-weight:bold">Phone Number</label>
                            <input type="text" required
                                class="form-control py-3 {{ $errors->has('phone_no') ? 'is-invalid' : '' }}"
                                name="phone_no" value="{{ old('phone_no') }}" placeholder="@lang('models/users.fields.phone_no')">

                            <span class="invalid-feedback">
                                @if ($errors->has('phone_no'))
                                    <strong>{{ $errors->first('phone_no') }}</strong>
                                @else
                                    <strong>Please provide a valid phone number.</strong>
                                @endif
                            </span>

                        </div>
                        <div class="form-group">
                            <label for="email" style="font-size:12px; font-weight:bold">E-mail</label>
                            <input type="email" required
                                class="form-control py-3 {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                name="email" value="{{ old('email') }}" placeholder="@lang('auth.email')">

                            <span class="invalid-feedback">
                                @if ($errors->has('email'))
                                    <strong>{{ $errors->first('email') }}</strong>
                                @else
                                    <strong>Please provide a valid email address.</strong>
                                @endif
                            </span>

                        </div>
                        <div class="form-group">
                            <label for="password" style="font-size:12px; font-weight:bold">Password</label>

                            <input type="password" required
                                class="form-control py-3 {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                name="password" placeholder="@lang('auth.password')">

                            <span class="invalid-feedback">
                                @if ($errors->has('password'))
                                    <strong>{{ $errors->first('password') }}</strong>
                                @endif
                                <strong>Enter a valid password</strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" style="font-size:12px; font-weight:bold">Confirm
                                Password</label>
                            <input required type="password" class="form-control py-3" name="password_confirmation"
                                placeholder="@lang('auth.confirm_password')">

                            <span class="invalid-feedback">
                                @if ($errors->has('password_confirmation'))
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                @else
                                    <strong>Confirm password is required</strong>
                                @endif
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="payment_method">Preferred Payment Method:</label>
                            <select id="payment_method" name="payment_method_id" class="form-control">
                                @foreach ($payment_methods as $payment_method)
                                    <option value="{{ $payment_method->id }}">{{ $payment_method->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit"
                            class="mt-3 p-2 btn col-12 text-white btn-primary btn-block font-weight-bold"
                            style="font-size:15px;">CONTINUE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const signupForm = document.getElementById('signupForm');

        signupForm.addEventListener('submit', function(event) {
            if (!signupForm.checkValidity()) {
                // Form has validation errors, prevent form submission
                event.preventDefault();
                event.stopPropagation();
            }

            signupForm.classList.add(
                'was-validated'); // Add 'was-validated' class to enable Bootstrap's styles
        });
    });
</script>

</html>
