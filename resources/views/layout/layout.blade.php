<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="An open platform for Microduino">
    <meta name="author" content="xieqiu">
    <meta name="email" content="qiuye@163.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">

     @yield('header')

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    @yield('nav')

    @yield('content')

    <!-- jQuery -->
    <script src="{{ asset('scripts/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('scripts/bootstrap.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('scripts/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('scripts/jquery.fittext.js') }}"></script>
    <script src="{{ asset('scripts/wow.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('scripts/creative.js') }}"></script>

</body>

</html>
