<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}} | Register</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/toastr/toastr.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>{{config('app.name')}}</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3 mt-1">
                        <input type="text" class="form-control" placeholder="Name *" name="name" value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('name')
                        <small class="row ml-1 mt-n3 text-danger">{{$errors->first('name')}}</small>
                    @enderror
                    <div class="input-group mb-3 mt-1">
                        <input type="email" class="form-control" placeholder="Email *" name="email" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <small class="row ml-1 mt-n3 text-danger">{{$errors->first('email')}}</small>
                    @enderror
                    <div class="input-group mb-3 mt-1">
                        <input type="password" class="form-control" placeholder="Password *" name="password" value="{{ old('password') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <small class="row ml-1 mt-n3 text-danger">{{$errors->first('password')}}</small>
                    @enderror
                    <div class="row mb-4 mt-3">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <a href="{{ route('login') }}" class="float-right">Already have an account?</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- jQuery -->
    <script src="{{ asset('admin_assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('admin_assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('admin_assets/plugins/toastr/toastr.min.js') }}"></script>
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
