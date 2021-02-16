<!DOCTYPE html>
<html lang="en">
<head>
    {{--site meta--}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    {{--site title--}}
    <title>@yield('title')</title>
    {{--core styles--}}
    <link href="{{ asset('site/theme2/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('site/theme2/css/main.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('site/theme2/css/demo.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('site/theme2/js/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('site/theme2/css/bjqs.css') }}" rel="stylesheet"/>
    <link href="{{ asset('site/theme2/css/team.css') }}" rel="stylesheet"/>
    <link href="{{ asset('site/theme2/demo.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('site/theme1/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--core scripts--}}
    <script src="{{ asset('site/theme2/js/jquery.js') }}" type="text/javascript"></script>
    <script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript"></script>
    {{--custom styles--}}
    @yield('style')
</head>
<body>
<div class="top_border"></div>
<div class="wrapper">
    <div class="main_wrapper">

        @include('site.theme2.partials._header')

        <div class="banner">
            <div id="wowslider-container1">
                <div class="ws_images">
                    <ul>
                        <li>
                            <img style="max-height: 300px;" alt="banner_img" id="wows1_0" src="{{ asset('site/theme2/images/slider/banner_img.jpg')  }}"/>
                        </li>
                    </ul>
                </div>
                <div class="ws_bullets">
                    <div></div>
                </div>
                <div class="ws_shadow"></div>
            </div>
            <script type="text/javascript" src="{{ asset('site/theme2/js/wowslider.js') }}"></script>
            <script type="text/javascript" src="{{ asset('site/theme2/js/script.js') }}"></script>
        </div>
        <br/><br/>

        @yield('content')

    </div>
</div>

<div class="clear"></div>

@include('site.theme2.partials._footer')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{ asset('site/theme2/js/flaunt.js') }}"></script>
<script src="{{ asset('site/theme1/js/jquery.magnific-popup.min.js') }}"></script>
<script>
    /* image-link */
    $('.image-link').magnificPopup({
        type: 'image',
        gallery:{
            enabled:true
        }
    });
</script>

@yield('script')

</body>
</html>
