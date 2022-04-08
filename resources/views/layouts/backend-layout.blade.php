<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Magwe Skulman Admin</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('assets/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('assets/vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset ('assets/toastr/toastr.min.css') }}">

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    @stack('css')

</head>
    <body>

    <!-- WRAPPER -->
    <div id="wrapper fluid-container">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('inc.topbar')
            @include('inc.sidebar')
        </nav>

        <!-- BODY -->
        <div id="page-wrapper">
            @yield('content')
        </div>
    </div>
    <!-- END WRAPPER -->

    <!-- SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('assets/vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('assets/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('assets/data/morris-data.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('assets/dist/js/sb-admin-2.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ asset ('assets/toastr/toastr.min.js') }}"></script>
    {!! Toastr::render() !!}

    @stack('js')

    <!-- END SCRIPTS -->
    </body>
</html>
