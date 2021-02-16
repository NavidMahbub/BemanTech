<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--core styles--}}
    <link rel="stylesheet" href="{{ asset('site/theme1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme1/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme1/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme1/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme1/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme1/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme1/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('site/theme1/css/responsive.css') }}">

    {{--custom styles--}}
    @yield('style')

    {{--core scripts--}}
    <script src="{{ asset('site/theme1/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    {{--header section--}}
    @include('site.theme1.partials._header')

    {{--content section--}}
    @yield('content')

    {{--foolter section--}}
    @include('site.theme1.partials._footer')

    {{--core scripts--}}
    <script src="{{ asset('site/theme1/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <script src="{{ asset('site/theme1/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('site/theme1/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('site/theme1/js/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('site/theme1/js/jquery.mixitup.min.js') }}"></script>
    <script src="{{ asset('site/theme1/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('site/theme1/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('site/theme1/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('site/theme1/js/plugins.js') }}"></script>
    <script src="{{ asset('site/theme1/js/main.js') }}"></script>

    {{--custom scripts--}}
    @yield('script')
</body>
</html>
