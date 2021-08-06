@extends('front.layout.app')
@section('title','Profile')
@section('content')
    <main id="main">
        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1>Change password</h1>
                            <span class="color-text-a">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Change password
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section><!-- End Intro Single-->
        <section class="property nav-arrow-b">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="property-contact">
                            <form class="form-a" method="post" action="{{ route('userChangePassword') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Old password *" name="old_password" required>
                                            @error('password')
                                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Password *" name="password" required>
                                            @error('password')
                                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg form-control-a" id="inputName" placeholder="password_confirmation *" name="password_confirmation" required>
                                            @error('password_confirmation')
                                                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    @auth
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-a">Submit</button>
                                        </div>
                                    @endauth
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
