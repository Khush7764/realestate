<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name')}} | @yield('title')</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{asset('admin_assets/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/toastr/toastr.min.css') }}">
        @yield('css')
    </head>
    <body class="hold-transition sidebar-mini">

        <div class="wrapper">
            <!-- Navbar -->
            @include('admin.layout.header')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('admin.layout.sidebar')
            <!-- /.main-sidebar-container -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            @include('admin.layout.footer')
            <!-- /.main-footer -->
        </div>

        <!-- jQuery -->
        <script src="{{asset('admin_assets/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
        <!-- Toastr -->
        <script src="{{ asset('admin_assets/plugins/toastr/toastr.min.js') }}"></script>

        @stack('scripts')

        <script type="text/javascript">
            toastr.options = {
                'closeButton': true,
                'progressBar': true,
                'preventDuplicates': false
            }
            @if(Session::has('success'))
                toastr.success("{{ session('success') }}");
            @endif

            @if(Session::has('error'))
                toastr.error("{{ session('error') }}");
            @endif
        </script>
    </body>
</html>
