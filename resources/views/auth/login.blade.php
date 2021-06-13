<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('vendor/coreui/css/coreui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/coreui/fontawesome/css/fontawesome.css') }}">

    <title>{{ __('coreui::coreui.sign_in') }}</title>
</head>
<body class="c-app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <h1>{{ __('coreui::coreui.sign_in') }}</h1>
                        <p class="text-muted">{{ __('coreui::coreui.login_message') }}</p>

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>

                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                       value="{{ old('email') }}" placeholder="{{ __('coreui::coreui.email') }}"
                                       required
                                       autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" placeholder="{{ __('coreui::coreui.password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary px-4"
                                            type="submit">{{ __('coreui::coreui.sign_in') }}</button>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-link px-0"
                                       href="{{ route('password.request') }}">{{ __('coreui::coreui.i_forgot_my_password') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery first, then Popper.js, Bootstrap, then CoreUI  -->
<script type="application/javascript" src="{{ asset('vendor/coreui/js/jquery.slim.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('vendor/coreui/js/bootstrap.bundle.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('vendor/coreui/js/coreui.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('vendor/coreui/js/coreui-utilities.min.js') }}"></script>
</body>
</html>
