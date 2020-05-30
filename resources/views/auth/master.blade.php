<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content={{csrf_token()}}>

    <title>3 Deseos | @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css"></link>
    <link rel="stylesheet" href="/dist/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- Theme style Session-->
    <link rel="stylesheet" href="/dist/css/session.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/dist/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/dist/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/dist/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/dist/plugins/datepicker/datepicker3.css">
    <!-- Toaster -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/dist/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body class="hold-transition sidebar-mini">


    <div class="wrapper" id="app">
        <div class="login-box">
            <div class="login-logo">
                <img src="/images/logo-color.png" height="150">
            </div>
            @yield('content')
        </div>
    </div>
    @yield('javascript')
    <!-- jQuery -->
    <script src="/dist/plugins/jquery/jquery.min.js"></script>

    {{-- Alert Toster--}}
    <script>
    $( document ).ready(function() {
        @if (session('success'))
        toastr.success('{{session('success')}}');
        @endif
        @if (session('fail'))
        toastr.error('{{session('fail')}}');
        @endif
        @if (session('warning'))
        toastr.warning('{!! session('warning') !!}');
        @endif
        @if ($errors->any())
        @foreach ($errors->all(':message') as $mensaje)
        toastr.warning('{{$mensaje}}');
        @endforeach
        @endif
    });
    </script>

    <!-- Toaster -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>

</body>
</html>
