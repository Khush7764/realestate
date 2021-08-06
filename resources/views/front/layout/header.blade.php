<!-- ======= Property Search Section ======= -->
<div class="click-closed"></div>
<!--/ Form Search Star /-->
<div class="box-collapse">
    <div class="title-box-d">
        <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
        <form class="form-a" method="post" action="{{ route('propertyListPost') }}">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input name="title" type="text" class="form-control form-control-lg form-control-a" placeholder="Name">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="bedrooms">Bedrooms</label>
                        <input name="bedrom" type="number" class="form-control form-control-lg form-control-a" placeholder="Bedrooms">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input name="city" type="text" class="form-control form-control-lg form-control-a" placeholder="City">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group">
                        <label for="max_price">Max price</label>
                        <input name="price" type="number" class="form-control form-control-lg form-control-a" placeholder="Max price">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-b">Search Property</button>
                </div>
            </div>
        </form>
    </div>
</div><!-- End Property Search Section -->>
<!-- ======= Header/Navbar ======= -->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a class="navbar-brand text-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  {{ Route::currentRouteName() == 'home' ? 'active' : ''}}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ \Request::is('property*') ? 'active' : ''}}" href="{{ route('propertyList') }}">Property</a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                            <a class="dropdown-item" href="{{ route('userChangePassword') }}">Change password</a>
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
        <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
        </button>
    </div>
</nav><!-- End Header/Navbar -->
