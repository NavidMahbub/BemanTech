<!DOCTYPE html>
<html  class="no-js">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BeManTech</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('site/theme6/content2/technics/images/favicon.ico') }}">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

    <!-- FONTS BeMantech -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto+Mono:300,400,400italic,700,700italic'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:100,300,400'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS BeMantech-->

    <link rel='stylesheet' href="{{ asset('site/theme6/css2/global.css')}}">
    <link rel='stylesheet' href="{{ asset('site/theme6/css2/style-demo.css')}}">
    <link rel='stylesheet' href="{{ asset('site/theme6/content2/technics/css/structure.css')}}">
    <link rel='stylesheet' href="{{ asset('site/theme6/content2/technics/css/technics.css')}}">
    <link rel='stylesheet' href="{{ asset('site/theme6/content2/technics/css/custom.css')}}">
    <link rel='stylesheet' href="{{ asset('site/theme6/plugins2/rs-plugin/css/settings.css')}}">

</head>


<body class="template-slider color-custom style-simple layout-full-width nice-scroll-on mobile-tb-left button-flat if-zoom no-content-padding header-modern minimalist-header-no sticky-header sticky-tb-color ab-hide subheader-both-center menu-line-below-80-1 menuo-right menuo-no-borders footer-copy-center">
    <div id="Wrapper">
        <div id="Header_wrapper">
            @include('site.theme6.partials._header')
            @yield('content')
            @include('site.theme6.partials._footer')

        </div>
    </div>

    
 
    <script src="{{asset('site/theme6/js2/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('site/theme6/js2/mfn.menu.js')}}"></script>
    <script src="{{asset('site/theme6/js2/jquery.plugins.js')}}"></script>
    <script src="{{asset('site/theme6/js2/jquery.jplayer.min.js')}}"></script>
    <script src="{{asset('site/theme6/js2/animations/animations.js')}}"></script>
    <script src="{{asset('site/theme6/js2/ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('site/theme6/js2/scripts.js')}}"></script>
    <script src="{{asset('site/theme6/js2/emails.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script src="{{asset('site/theme6/plugins2/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('site/theme6/plugins2/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('site/theme6/plugins2/rs-plugin/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="{{asset('site/theme6/plugins2/rs-plugin/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('site/theme6/plugins2/rs-plugin/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('site/theme6/plugins2/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('site/theme6/plugins2/rs-plugin/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('site/theme6/plugins2/rs-plugin/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('site/theme6/plugins2/rs-plugin/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('site/theme6/plugins2/rs-plugin/js/extensions/revolution.extension.parallax.min.js')}}"></script>


    <script>
        var tpj = jQuery;
            var revapi1;
            tpj(document).ready(function() {
                if (tpj("#rev_slider_1_2").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_1_2");
                } else {
                    revapi1 = tpj("#rev_slider_1_2").show().revolution({
                        sliderType: "hero",
                        sliderLayout: "auto",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {},
                        visibilityLevels: [1240, 1024, 778, 480],
                        gridwidth: 1080,
                        gridheight: 780,
                        lazyType: "none",
                        shadow: 0,
                        spinner: "spinner2",
                        autoHeight: "off",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            });
    </script>

<script id="mfn-dnmc-retina-js">
        jQuery(window).load(function() {
            var retina = window.devicePixelRatio > 1 ? true : false;
            if (retina) {
                var retinaEl = jQuery("#logo img.logo-main");
                var retinaLogoW = retinaEl.width();
                var retinaLogoH = retinaEl.height();
                // retinaEl.attr("src", "content/technics/images/retina-technics.png").width(retinaLogoW).height(retinaLogoH);
                retinaEl.attr("src", "{{asset('site/theme6/content2/technics/images/retina-technics.png')}}").width(retinaLogoW).height(retinaLogoH);
                var stickyEl = jQuery("#logo img.logo-sticky");
                var stickyLogoW = stickyEl.width();
                var stickyLogoH = stickyEl.height();
                stickyEl.attr("src", "{{asset('site/theme6/content2/technics/images/retina-technics.png')}}").width(stickyLogoW).height(stickyLogoH);
                var mobileEl = jQuery("#logo img.logo-mobile");
                var mobileLogoW = mobileEl.width();
                var mobileLogoH = mobileEl.height();
                mobileEl.attr("src", "{{asset('site/theme6/content2/technics/images/retina-technics.png')}}").width(mobileLogoW).height(mobileLogoH);
            }
        });
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-96349019-1', 'auto');
        ga('send', 'pageview');
    </script>

</body>
</html>
