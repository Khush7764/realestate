<!-- ======= Footer ======= -->
<section class="section-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="widget-a">
                    <div class="w-header-a">
                        <h3 class="w-title-a text-brand">{{ config('app.name') }}</h3>
                    </div>
                    <div class="w-body-a">
                        <p class="w-text-a color-text-a">
                            Enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis
                            sed aute irure.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="nav-footer">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ route('propertyList') }}">Property</a>
                        </li>
                        @auth
                            <li class="list-inline-item">
                                <a href="{{ route('logout') }}">Logout</a>
                            </li>
                        @else
                            <li class="list-inline-item">
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                        @endauth
                    </ul>
                </nav>
                <div class="copyright-footer">
                    <p class="copyright color-text-a">
                        &copy; Copyright
                        <span class="color-a">{{config('app.name')}}</span> All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer><!-- End  Footer -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>
