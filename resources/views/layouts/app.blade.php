<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="token" content="{{ csrf_token() }}"/>

    <!-- Title -->
    <title>@yield('site_title')</title>

    <!-- Common Styles -->
    <link href="{{ asset('admin/plugins/font-awesome/5/css/all.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/plugins/font-awesome/4/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/css/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('site/theme6/fonts/icomoon/style.css') }}">

    @yield('style')

    <!-- Common Scripts -->
    <script src="{{ asset('admin/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/plugins/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ asset('wizard/css/wizard.css') }}">
    <link rel="stylesheet" href="{{ asset('wizard/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('wizard/css/demo.css') }}">

    <style>
        .site-blocks-cover.overlay::before {
            position: absolute;
            content: "";
            left: 0;
            bottom: 0;
            right: 0;
            top: 0;
            background: rgba(0, 0, 0, 0.08);
        }
        label.error {
            display: inline-block;
            width: 100%;
            color: #e8220d;
            margin-top: 5px;
        }
        #image-error {
            z-index: 10;
            height: 55px;
        }
    </style>

</head>
<body class="app sidebar-mini rtl">

@include('partials._header')

@include('partials._sidebar')

<main class="app-content">

    @yield('page_title')

    <div class="row">
        <div class="col-md-12" id="app">
            @yield('page_content')
        </div>
    </div>

</main>


<!-- Common Scripts -->
<script src="{{ asset('admin/js/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/main.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/plugins/pace.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/plugins/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('wizard/js/jquery.bootstrap.wizard.js') }}"></script>
<script src="{{ asset('wizard/js/jquery.validate.min.js') }}"></script>
<script>
    searchVisible = 0;
    transparent = true;

    $(document).ready(function () {

        /*  Activate the tooltips      */
        $('[rel="tooltip"]').tooltip();

        // Code for the Validator
        var $validator = $('.wizard-card form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                school_college: {
                    required: true,
                    minlength: 3
                },
                group: {
                    required: true
                },
                player_mobile: {
                    required: true,
                    minlength: 11,
                    maxlength: 11,
                    number: true,
                    remote: {
                        type: 'post',
                        url: '/api/validate/phone'
                    }
                },
                image: {
                    required: true
                },
                playing_type: {
                    required: true
                },
                geo_division_id: {
                    required: true
                },
                geo_district_id: {
                    required: true
                },
                geo_upazila_id: {
                    required: true
                },
                district_code: {
                    required: true
                },
                phone: {
                    required: true,
                    remote: {
                        type: 'post',
                        url: '/api/validate/login'
                    }
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirmation: {
                    required: true,
                    minlength: 6,
                    equalTo: '#password'
                },
                @if(auth()->user()->type == 4)
                code: {
                    required: true
                }
                @endif
            },
            messages: {
                player_mobile: {
                    remote: 'Phone number is already taken.'
                },
                phone: {
                    remote: 'Email/Phone is already taken.'
                }
            }
        });

        // Wizard Initialization
        $('.wizard-card').bootstrapWizard({
            'tabClass': 'nav nav-pills',
            'nextSelector': '.btn-next',
            'previousSelector': '.btn-previous',
            onNext: function (tab, navigation, index) {
                var $valid = $('.wizard-card form').valid();
                if (!$valid) {
                    $validator.focusInvalid();
                    return false;
                }
            },
            onInit: function (tab, navigation, index) {
                //check number of tabs and fill the entire row
                var $total = navigation.find('li').length;
                $width = 100 / $total;
                navigation.find('li').css('width', $width + '%');
            },
            onTabClick: function (tab, navigation, index) {
                var $valid = $('.wizard-card form').valid();
                if (!$valid) {
                    return false;
                } else {
                    return true;
                }
            },
            onTabShow: function (tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;
                var $wizard = navigation.closest('.wizard-card');
                // If it's the last tab then hide the last button and show the finish instead
                if ($current >= $total) {
                    $($wizard).find('.btn-next').hide();
                    $($wizard).find('.btn-finish').show();
                } else {
                    $($wizard).find('.btn-next').show();
                    $($wizard).find('.btn-finish').hide();
                }
                // update progress
                var move_distance = 100 / $total;
                move_distance = move_distance * (index) + move_distance / 2;
                $wizard.find($('.progress-bar')).css({width: move_distance + '%'});
                // e.relatedTarget // previous tab
                $wizard.find($('.wizard-card .nav-pills li.active a .icon-circle')).addClass('checked');
            }
        });

        // Code for the Validator
        var $validator1 = $('.wizard-card1 form').validate({
            rules: {
                //
            },
            messages: {
                //
            }
        });

        // Wizard Initialization
        $('.wizard-card1').bootstrapWizard({
            'tabClass': 'nav nav-pills',
            'nextSelector': '.btn-next',
            'previousSelector': '.btn-previous',
            onNext: function (tab, navigation, index) {
                var $valid = $('.wizard-card1 form').valid();
                if (!$valid) {
                    $validator1.focusInvalid();
                    return false;
                }
            },
            onInit: function (tab, navigation, index) {
                //check number of tabs and fill the entire row
                var $total = navigation.find('li').length;
                $width = 100 / $total;
                navigation.find('li').css('width', $width + '%');
            },
            onTabClick: function (tab, navigation, index) {
                var $valid = $('.wizard-card1 form').valid();
                if (!$valid) {
                    return false;
                } else {
                    return true;
                }
            },
            onTabShow: function (tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;
                var $wizard = navigation.closest('.wizard-card1');
                // If it's the last tab then hide the last button and show the finish instead
                if ($current >= $total) {
                    $($wizard).find('.btn-next').hide();
                    $($wizard).find('.btn-finish').show();
                } else {
                    $($wizard).find('.btn-next').show();
                    $($wizard).find('.btn-finish').hide();
                }
                // update progress
                var move_distance = 100 / $total;
                move_distance = move_distance * (index) + move_distance / 2;
                $wizard.find($('.progress-bar')).css({width: move_distance + '%'});
                // e.relatedTarget // previous tab
                $wizard.find($('.wizard-card1 .nav-pills li.active a .icon-circle')).addClass('checked');
            }
        });

        // Prepare the preview for profile picture
        $("#wizard-picture").change(function () {
            readURL(this);
        });

        $('[data-toggle="wizard-radio"]').click(function () {
            wizard = $(this).closest('.wizard-card');
            wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
            $(this).addClass('active');
            $(wizard).find('[type="radio"]').removeAttr('checked');
            $(this).find('[type="radio"]').attr('checked', 'true');
        });

        $('[data-toggle="wizard-checkbox"]').click(function () {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $(this).find('[type="checkbox"]').removeAttr('checked');
            } else {
                $(this).addClass('active');
                $(this).find('[type="checkbox"]').attr('checked', 'true');
            }
        });

        $('.set-full-height').css('height', 'auto');

    });


    // Function to show image before upload

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


    function debounce(func, wait, immediate) {
        var timeout;
        return function () {
            var context = this, args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            }, wait);
            if (immediate && !timeout) func.apply(context, args);
        };
    };

</script>

@yield('script')

<!-- Vue scripts -->
@yield('vue_script')

</body>
</html>
