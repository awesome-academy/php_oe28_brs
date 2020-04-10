<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ trans('menus.login') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('bower_components/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/solid.css') }}">
    <link href="{{ asset('bower_components/fonts/css.css') }}" rel="stylesheet">

</head>
<body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <b>{{ trans('messages.brs') }}</b>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{ trans('messages.text_login') }}</p>
                @if (session('error'))
                    <span class="text-danger">{{ session('error') }}</span><br>
                @endif
                <form action="{{ route('checkLogin') }}" method="post">
                    @csrf
                    @if ($errors)
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="{{ trans('messages.email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors)
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="{{ trans('messages.password') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">{{ trans('menus.login') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
