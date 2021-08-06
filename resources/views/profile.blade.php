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
                            <div class="w-25">
                                <img src="{{ !empty(Auth::user()->image) ? asset('storage/avatar').'/'.Auth::user()->image : asset('admin_assets/dist/img/user4-128x128.jpg') }}" alt="" class="img-thumbnail rounded">
                            </div>
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
                                    Profile
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
                            <form class="form-a" method="post" action="{{ route('profile') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" name="name" value="{{ Auth::user()->name }}" required>
                                            @error('name')
                                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" name="email" value="{{ Auth::user()->email }}" required>
                                            @error('email')
                                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group">
                                            <input type="file" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Image *" name="image" required>
                                            @error('image')
                                                <small class="text-danger">{{ $errors->first('image') }}</small>
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
