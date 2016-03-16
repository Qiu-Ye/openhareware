@extends('auth.auth')

@section('form')
		<!-- BEGIN LOGIN FORM -->
		<form class="login-form" action="/login" method="post">
            {!! csrf_field() !!}
			<h3 class="form-title">账号登录</h3>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul style="color:red;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>请输入用户名和密码</span>
			</div>
			<div class="form-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">用户名</label>
				<div class="input-icon">
					<i class="fa fa-user"></i>
					<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="name"/>
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
				<input type="checkbox" name="remember"/> 记住我
				</label>
				<button type="submit" class="btn green pull-right">
				登录 <i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
			<div class="forget-password">
				<h4>忘记密码了吗?</h4>
				<p>
					不用担心,请点击 <a href="/password/email"  id="forget-password">这里</a>
					重置密码.
				</p>
			</div>
			<div class="create-account">
				<p>
					没有账户吗?&nbsp; 
					<a href="/register" id="register-btn" >注册</a>
				</p>
			</div>
		</form>
		<!-- END LOGIN FORM -->        
@endsection
