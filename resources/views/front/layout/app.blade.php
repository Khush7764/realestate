<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>{{config('app.name')}} | @yield('title')</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <!-- Favicons -->
        <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
        <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/toastr/toastr.min.css') }}">
        @yield('css')
        <!-- =======================================================
        * Template Name: EstateAgency - v2.2.1
        * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>
    <body>
        @include('front.layout.header')
        @yield('content')
        @include('front.layout.footer')
        <!-- Vendor JS Files -->
        <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/scrollreveal/scrollreveal.min.js') }}"></script>
        <!-- Template Main JS File -->
        <script src="{{ asset('assets/js/main.js')}}"></script>
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
