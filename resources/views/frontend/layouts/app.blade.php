<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">

    <title>{{ $title ?? env('APP_NAME') }}</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend') }}/css/font-awesome.css">

    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/templatemo-softy-pinko.css">
    @stack('styles')
    @vite('resources/js/app.js')
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    @include('frontend.layouts.partials.header')
    <!-- ***** Header Area End ***** -->

    <div class="pb-5" style="min-height: 800px">
        @yield('content')
    </div>

    <!-- ***** Footer Start ***** -->
    @include('frontend.layouts.partials.footer')


    <!-- jQuery -->
    <script src="{{ asset('assets/frontend') }}/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/frontend') }}/js/popper.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/frontend') }}/js/scrollreveal.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/waypoints.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/js/imgfix.min.js"></script>

    <!-- Global Init -->
    <script src="{{ asset('assets/frontend') }}/js/custom.js"></script>
    @stack('scripts')
</body>

</html>
