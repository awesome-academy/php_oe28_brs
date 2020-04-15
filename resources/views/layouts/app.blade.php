<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/template_book/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/solid.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/datatable/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/datatable/dataTables.bootstrap4.min.css') }}">

</head>

<body>

    <div class="wrapper" id="wrapper">
        @include('layouts.header')
        <div class="ht__bradcaump__area bg-image--6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                            <nav class="bradcaump-content">
                                <a class="breadcrumb_item" href="index.html">{{ trans('menus.home') }}</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        @include('layouts.footer')
    </div>

    <script src="{{ asset('bower_components/jQuery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatable/table.js') }}"></script>

</body>

</html>
