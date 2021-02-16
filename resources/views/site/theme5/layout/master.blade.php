<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('site/theme4/front_end/images/favicon.png') }}" type="image/png" sizes="180x180">
    <!-- Site Title -->
    <title>PKCSBD</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('site/theme5/front_end/css/mediaquires.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme5/front_end/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.13/css/all.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('site/theme5/front_end/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme5/plugins/fileinput/fileinput.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site/theme5/plugins/datepicker/css/datepicker.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css"/>
    <script src="{{ asset('site/theme5/front_end/js/jquery-3.4.1.min.js') }}"></script>
    @yield('style')
</head>
<body>
@include('site.theme5.partials._header')
<div class="clearfix"></div>
<main role="main">
    @yield('content')
    <div class="clearfix"></div>
    @include('site.theme5.partials._footer')
</main>
<script src="{{ asset('site/theme5/front_end/js/popper.min.js') }}"></script>
<script src="{{ asset('site/theme5/front_end/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('site/theme5/front_end/js/jssor.slider-27.5.0.min.js') }}"></script>
<script src="{{ asset('site/theme5/plugins/fileinput/fileinput.min.js') }}"></script>
<script src="{{ asset('site/theme5/plugins/jquery-validator/jquery.validate.js') }}"></script>
<script src="{{ asset('site/theme5/plugins/jquery-validator/additional-methods.js') }}"></script>
<script src="{{ asset('site/theme5/plugins/datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('site/theme5/front_end/js/custom.js') }}"></script>
<script src="{{ asset('js/registration.js') }}"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js"></script>
@yield('script')
</body>
</html>
