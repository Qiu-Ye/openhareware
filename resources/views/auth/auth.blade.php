    @extends('layout.layout')

    @section('title', '登录')

    @section('header')
	<!-- BEGIN THEME STYLES --> 
	<link href="{{ asset('css/style-metronic.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
    @endsection

    @section('bodyStyle', 'class="login"')

    @section('content')
	<div class="logo">
        <h1 style="color: wheat;">Microduino开放平台</h1>
	</div>
	<!-- BEGIN LOGIN -->
	<div class="content">
        @yield('form')
	</div>
	<!-- END LOGIN -->
	<!-- BEGIN COPYRIGHT -->
	<div class="copyright">
		2016 &copy; Microduino开放平台.
	</div>
	<!-- END COPYRIGHT -->
    @endsection


    @section('javascript')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="{{ asset('plugins/jquery.validate.min.js') }}" type="text/javascript"></script>	
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="{{ asset('scripts/login.js') }}" type="text/javascript"></script> 
	<!-- END PAGE LEVEL SCRIPTS --> 
	<script>
		jQuery(document).ready(function() {     
		  Login.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
    @endsection

