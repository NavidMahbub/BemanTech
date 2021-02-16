<!doctype html>
<!--[if IE 7 ]><html lang="en-gb" class="isie ie7 oldie no-js"><![endif]-->
<!--[if IE 8 ]><html lang="en-gb" class="isie ie8 oldie no-js"><![endif]-->
<!--[if IE 9 ]><html lang="en-gb" class="isie ie9 no-js"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en-gb" class="no-js"><!--<![endif]-->
<head>
    <title>@yield('title')</title>
    @yield('seo')
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700italic,700,600italic,600,400italic,300italic,300|Roboto:100,300,400,500,700&amp;subset=latin,latin-ext' type='text/css' />
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('site/theme3/css/reset.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/theme3/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/theme3/css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('site/theme3/css/responsive-leyouts.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/theme3/js/sticky-menu/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('site/theme3/css/res-table.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('site/theme3/js/revolutionslider/css/fullwidth.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('site/theme3/js/revolutionslider/rs-plugin/css/settings.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('site/theme3/js/jcarousel/skin.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('site/theme3/js/jcarousel/skin2.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('site/theme3/css/custom.css') }}" />
    <link href="{{ asset('admin/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="{{ asset('site/theme3/images/favicon.ico') }}">
    @yield('style')
</head>

<body>

<div class="site_wrapper">
    @include('site.theme3.partials._header')

    @yield('content')
</div>

@include('site.theme3.partials._footer')

<script type="text/javascript" src="{{ asset('site/theme3/js/universal/jquery.js') }}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
<script type="text/javascript" src="{{ asset('site/theme3/js/mainmenu/ddsmoothmenu.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/theme3/js/mainmenu/selectnav.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/theme3/js/jcarousel/jquery.jcarousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/theme3/js/revolutionslider/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/theme3/js/mainmenu/scripts.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/theme3/js/accordion/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/theme3/js/sticky-menu/core.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/theme3/js/main.js') }}"></script>
<script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}" type="text/javascript"></script>
@yield('script')
</body>
</html>
