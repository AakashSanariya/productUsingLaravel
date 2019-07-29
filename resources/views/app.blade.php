<html>
<head>
    <title>Product</title>
    {{--CSS Start--}}
        <link rel="stylesheet" href="{{ asset("css/bootstrap/dist/css/bootstrap.min.css") }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset("css/font-awesome/css/font-awesome.min.css") }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset("css/Ionicons/css/ionicons.min.css") }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset("css/AdminLTE.min.css") }}">
        <!-- Material Design -->
        <link rel="stylesheet" href="{{ asset("css/bootstrap-material-design.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/ripples.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/MaterialAdminLTE.min.css") }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset("css/all-md-skins.min.css") }}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{ asset("css/bootstrap-datepicker.min.css") }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset("css/daterangepicker.css") }}">
        @yield('css')
    {{--CSS Over--}}

    {{--Script Start--}}
        <!-- jQuery 3 -->
        <script src="{{ asset("js/jquery/dist/jquery.min.js") }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset("js/jquery-ui/jquery-ui.min.js") }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>
        <!-- Material Design -->
        <script src="{{ asset("js/material.min.js") }}"></script>
        <script src="{{ asset("js/ripples.min.js") }}"></script>
        <script>
            $.material.init();
        </script>
        <!-- Sparkline -->
        <script src="{{ asset("js/jquery.sparkline.min.js") }}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset("js/moment.min.js") }}"></script>
        <script src="{{ asset("js/daterangepicker.js") }}"></script>
        <!-- datepicker -->
        <script src="{{ asset("js/bootstrap-datepicker.min.js") }}"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ asset("js/bootstrap3-wysihtml5.all.min.js") }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset("js/adminlte.min.js") }}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset("js/dashboard.js") }}"></script>
        @yield('scripts')
    {{-- Script Over--}}
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('layouts.header')
        @include('layouts.leftsidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>
</body>
</html>