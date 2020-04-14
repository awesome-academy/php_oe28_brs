<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('bower_components/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/solid.css') }}">
    <link href="{{ asset('bower_components/fonts/css.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/toastr/toastr.css') }}" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        @include('admin.layouts.header')
        @include('admin.layouts.aside')

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('title-header')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">{{ trans('menus.home') }}</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                @yield('content')
            </section>
        </div>
        @include('admin.layouts.footer')

    </div>

    <script src="{{ asset('bower_components/jQuery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bower_components/adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bower_components/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('bower_components/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('bower_components/adminlte/dist/js/demo.js') }}"></script>
    <script src="{{ asset('bower_components/adminlte/dist/js/table.js') }}"></script>
    <script src="{{ asset('bower_components/toastr/toastr.js') }}"></script>
    @if( session('success') == true)
        <script src="{{ mix('js/app.js') }}"></script>
    @endif
</body>
</html>
