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

    <title>@yield('title') | Microduino开放平台</title>


     @yield('header')

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body @yield('bodyStyle')>

    @yield('nav')

    @yield('content')

    <!-- jQuery -->
    <script src="{{ asset('lib/jquery/jquery.js') }}"></script>


    @yield('javascript')

</body>

</html>
