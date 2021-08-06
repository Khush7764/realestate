@extends('front.layout.app')
@section('title','property list')
@section('content')
<!-- ======= Intro Single ======= -->
<main id="main">
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Our Amazing Properties</h1>
                        <span class="color-text-a">Grid Properties</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Properties Grid
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section><!-- End Intro Single-->
    <section class="property-grid grid">
        <div class="container">
            <div class="row">
                @forelse($property as $pro)
                    <div class="col-md-4">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                <img src="{{ !empty($pro->featured_image) ? asset('storage/feature').'/'.$pro->featured_image : asset('assets/img/property-1.jpg')}}" alt="" class="img-a img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                        <a href="{{ route('propertyDetails',$pro->id) }}">{{$pro->title}}</a>
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span class="price-a">Sale | $ {{ number_format($pro->price) }}</span>
                                        </div>
                                        <a href="{{ route('propertyDetails',$pro->id) }}" class="link-a">Click here to view
                                            <span class="ion-ios-arrow-forward"></span>
                                        </a>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <li>
                                                <h4 class="card-info-title">Floor Area</h4>
                                                <span>{{ $pro->floor_area}}m
                                                    <sup>2</sup>
                                                </span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Beds</h4>
                                                <span>{{ $pro->bedrom }}</span>
                                            </li>
                                            <li>
                                                <h4 class="card-info-title">Baths</h4>
                                                <span>{{ $pro->bathroom }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>No property available at the moment</div>
                @endforelse
                {{ $property->links() }}
            </div>
        </div>
    </section>
</main>
@endsection
