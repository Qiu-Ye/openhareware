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
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
		<form class="login-form" action="/login" method="post">
			<h3 class="form-title">账号登录</h3>
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>请输入用户名和密码</span>
			</div>
			<div class="form-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">用户名</label>
				<div class="input-icon">
					<i class="fa fa-user"></i>
					<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">密码</label>
				<div class="input-icon">
					<i class="fa fa-lock"></i>
					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
				</div>
			</div>
			<div class="form-actions">
				<label class="checkbox">
				<input type="checkbox" name="remember" value="1"/> 记住我
				</label>
				<button type="submit" class="btn green pull-right">
				登录 <i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
			<div class="forget-password">
				<h4>忘记密码了吗?</h4>
				<p>
					不用担心,请点击 <a href="javascript:;"  id="forget-password">这里</a>
					重置密码.
				</p>
			</div>
			<div class="create-account">
				<p>
					没有账户吗?&nbsp; 
					<a href="javascript:;" id="register-btn" >注册</a>
				</p>
			</div>
		</form>
		<!-- END LOGIN FORM -->        
		<!-- BEGIN FORGOT PASSWORD FORM -->
		<form class="forget-form" action="index.html" method="post" style="">
			<h3 >Forget Password ?</h3>
			<p>请输入您的邮箱地址去重置您的密码.</p>
			<div class="form-group">
				<div class="input-icon">
					<i class="fa fa-envelope"></i>
					<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" />
				</div>
			</div>
			<div class="form-actions">
				<button type="button" id="back-btn" class="btn">
				<i class="m-icon-swapleft"></i> 返回
				</button>
				<button type="submit" class="btn green pull-right">
				提交 <i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
		</form>
		<!-- END FORGOT PASSWORD FORM -->
		<!-- BEGIN REGISTRATION FORM -->
		<form class="register-form" action="/register" method="post">
			<h3 >注册</h3>
			<p>请输入您的个人信息</p>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">姓名</label>
				<div class="input-icon">
					<i class="fa fa-font"></i>
					<input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="fullname"/>
				</div>
			</div>
			<div class="form-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">Email</label>
				<div class="input-icon">
					<i class="fa fa-envelope"></i>
					<input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">地址</label>
				<div class="input-icon">
					<i class="fa fa-check"></i>
					<input class="form-control placeholder-no-fix" type="text" placeholder="Address" name="address"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">电话号码</label>
				<div class="input-icon">
					<i class="fa fa-location-arrow"></i>
					<input class="form-control placeholder-no-fix" type="text" placeholder="telephone" name="city"/>
				</div>
			</div>
			<p>请输入您的账户信息如下</p>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">Username</label>
				<div class="input-icon">
					<i class="fa fa-user"></i>
					<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="账户名" name="username"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">Password</label>
				<div class="input-icon">
					<i class="fa fa-lock"></i>
					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="密码" name="password"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
				<div class="controls">
					<div class="input-icon">
						<i class="fa fa-check"></i>
						<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="请确认密码" name="rpassword"/>
					</div>
				</div>
			</div>
            <!--
			<div class="form-group">
				<label>
				<input type="checkbox" name="tnc"/> I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
				</label>  
				<div id="register_tnc_error"></div>
			</div>
            -->
			<div class="form-actions">
				<button id="register-back-btn" type="button" class="btn">
				<i class="m-icon-swapleft"></i> 返回 
				</button>
				<button type="submit" id="register-submit-btn" class="btn green pull-right">
				注册 <i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
		</form>
		<!-- END REGISTRATION FORM -->
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
