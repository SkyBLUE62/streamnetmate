<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{asset('assets/client/images/logo.png')}}" type="image/x-icon">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('vendor/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    @include('include.client.nav')

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © <?= date('Y') ?> <a href="{{route('home')}}">StreamNetMate</a>. All rights reserved. <br>
                        <a href="{{route('home')}}">Home</a>
                        <span> - </span>
                        <a href="{{route('allChaines')}}">Chaines</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/client/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/client/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/client/js/popup.js') }}"></script>
    <script src="{{ asset('assets/client/js/custom.js') }}"></script>

    @yield('script')
</body>

</html>
