<!DOCTYPE html>
<html lang="en">
<head>
    {{--meta tags--}}
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    {{--title--}}
    <title>@yield('title')</title>
    {{--core styles--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('site/theme4/css/sliderman.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('site/theme4/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('site/theme4/css/jquery.simplyscroll.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('site/theme4/css/styles_left_menu.css') }}">
    {{--core scripts--}}
    <script type="text/javascript" src="{{ asset('site/theme4/js/jquery-2.0.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('site/theme4/js/sliderman.1.3.7.js') }}"></script>
    <script type="text/javascript" src="{{ asset('site/theme4/js/jquery.simplyscroll.min.js') }}"></script>
    {{--custom sctipts--}}
    <script type="text/javascript">
        (function ($) {
            $(function () {
                $("#scroller").simplyScroll();
            });
        })(jQuery);
    </script>
    @yield('style')
</head>
<body>
<table width="1080" border="0" align="center">
    @include('site.theme4.partials._header')

    @yield('content')

    @include('site.theme4.partials._footer')

    @yield('script')
</table>
</body>
</html>
