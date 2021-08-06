@extends('front.layout.app')
@section('title','property details')
@section('content')
<main id="main">
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">{{ $pro->title }}</h1>
                        <span class="color-text-a">{{ $pro->address }}</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('propertyList') }}">Properties</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $pro->title}}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- End Intro Single-->
    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
                        @if(empty($pro->gallery_images))
                            <div class="carousel-item-b">
                                <img src="{{ asset('assets/img/slide-2.jpg') }}" alt="">
                            </div>
                            <div class="carousel-item-b">
                                <img src="{{ asset('assets/img/slide-3.jpg') }}" alt="">
                            </div>
                            <div class="carousel-item-b">
                                <img src="{{ asset('assets/img/slide-1.jpg') }}" alt="">
                            </div>
                        @else
                            @php
                                $images = json_decode($pro->gallery_images);
                            @endphp
                            @forelse($images as $image)
                                <div class="carousel-item-b">
                                    <img src="{{ asset('storage/gallery').'/'.$image }}" alt="">
                                </div>
                            @empty
                                <div class="carousel-item-b">
                                    <img src="{{ asset('assets/img/slide-2.jpg') }}" alt="">
                                </div>
                                <div class="carousel-item-b">
                                    <img src="{{ asset('assets/img/slide-3.jpg') }}" alt="">
                                </div>
                                <div class="carousel-item-b">
                                    <img src="{{ asset('assets/img/slide-1.jpg') }}" alt="">
                                </div>
                            @endforelse
                        @endif
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-md-5 col-lg-4">
                            <div class="property-price d-flex justify-content-center foo">
                                <div class="card-header-c d-flex">
                                    <div class="card-box-ico">
                                        <span class="ion-money">$</span>
                                    </div>
                                    <div class="card-title-c align-self-center">
                                        <h5 class="title-c">{{ number_format($pro->price) }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="property-summary">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="title-box-d section-t4">
                                            <h3 class="title-d">Quick Summary</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-list">
                                    <ul class="list">
                                        <li class="d-flex justify-content-between">
                                            <strong>Title:</strong>
                                            <span>{{ $pro->title }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Address:</strong>
                                            <span>{{ $pro->address }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Floor area:</strong>
                                            <span>{{ $pro->floor_area }}m
                                                <sup>2</sup>
                                            </span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Bedroom:</strong>
                                            <span>{{ $pro->bedrom }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Bathroom:</strong>
                                            <span>{{ $pro->bathroom }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>City:</strong>
                                            <span>{{ $pro->city }}</span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Near by places:</strong>
                                            <span>{{ $pro->near_by_places }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 section-md-t3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Property Description</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="property-description">
                                <p class="description color-text-a">
                                    {{ $pro->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="title-box-d">
                                <h3 class="title-d">Contact Admin</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="property-contact">
                                <form class="form-a" method="post" action="{{ route('property.enquiry') }}">
                                    @csrf
                                    <input type="hidden" name="property_id" value="{{ $pro->id }}">
                                    <div class="row">
                                        <div class="col-md-12 mb-1">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" value="{{ old('name') }}" name="name" required>
                                                @error('name')
                                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" value="{{ old('email') }}" name="email" required>
                                                @error('email')
                                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <div class="form-group">
                                                <input type="number" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Contact *" value="{{ old('contact') }}" name="contact" required>
                                                @error('contact')
                                                    <small class="text-danger">{{ $errors->first('contact') }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <div class="form-group">
                                                <textarea id="textMessage" class="form-control" placeholder="Message *" cols="45" rows="8" value="{{ old('message') }}" name="message" required></textarea>
                                                @error('message')
                                                    <small class="text-danger">{{ $errors->first('message') }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        @auth
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-a">Send Message</button>
                                            </div>
                                        @endauth
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Property Single-->
</main><!-- End #main -->
