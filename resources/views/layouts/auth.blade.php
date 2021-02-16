<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <!-- Title -->
    <title>@yield('site_title')</title>

    <!-- Font -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Stylesheets -->
    <link href="{{ asset('admin/css/main.css') }}" rel="stylesheet" type="text/css">
</head>
<body>

    <section class="material-half-bg">
        <div class="cover"></div>
    </section>

    <section class="login-content">
        <div class="login-box">

            @yield('content')

        </div>
    </section>

    <!-- Scripts -->
    <script src="{{ asset('admin/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/plugins/pace.min.js') }}" type="text/javascript"></script>
</body>
</html>
