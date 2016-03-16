@extends('auth.auth')

@section('form')
		<!-- BEGIN FORGOT PASSWORD FORM -->
		<form class="forget-form" action="/password/email" method="post">
            {!! csrf_field() !!}
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
				<i class="m-icon-swapleft"></i>返回
				</button>
				<button type="submit" class="btn green pull-right">
				提交 <i class="m-icon-swapright m-icon-white"></i>
				</button>            
			</div>
		</form>
		<!-- END FORGOT PASSWORD FORM -->
@endsection
