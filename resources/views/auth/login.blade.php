@extends('master')
@section('header')
    Login
@stop
@section('pagehead')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="/assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
@stop
@section('content')
    	<!-- BEGIN LOGIN FORM -->
        {!! Form::open([
            'url' => '/auth/login',
            'id' => 'Login',
            'name'=>'Login',
            'class' => 'login-form'
        ]) !!}
    		<h3 class="form-title">Sign In</h3>
    		<div class="alert alert-danger display-hide">
    			<button class="close" data-close="alert"></button>
    			<span>
    			Enter any username and password. </span>
    		</div>
    		<div class="form-group">
    			<!--ien8, ie9 does not support html5 placeholder, so we just show field title for that-->
    			<label class="control-label visible-ie8 visible-ie9">Username</label>
                {!! Form::email('email', null,[
                    'class' => 'form-control placeholder-no-fix',
                    'id' => 'email',
                    'placeholder' => 'Email'
                ]) !!}
    		</div>
    		<div class="form-group">
    			<label class="control-label visible-ie8 visible-ie9">Password</label>
                {!! Form::password('password',[
                    'class' => 'form-control  placeholder-no-fix',
                    'id' => 'password',
                    'placeholder' => 'Password'
                ]) !!}
    		</div>
    		<div class="form-actions">
                {!! Form::button('Login <i class="m-icon-swapright m-icon-white"></i>', [
                    'class' => 'btn btn-success uppercase',
                    'type' => 'submit'
                ]) !!}
            {!! Form::close() !!}
    			<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
    		</div>
    		<div class="login-options">
    			<h4>Or login with</h4>
    			<ul class="social-icons">
    				<li>
    					<a class="social-icon-color facebook" data-original-title="facebook" href="/fblogin"></a>
    				</li>
    			</ul>
    		</div>
            <div class="create-account">
                <p>
                    <a href="javascript:;" id="register-btn" class="uppercase">A New Learning Journey Begins</a>
                </p>
            </div>
    	    {!! Form::close() !!}

    	<!-- END LOGIN FORM -->

	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="index.html" method="post">
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default">Back</button>
			<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->

@stop
@section('pagescript')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
    <script src="/assets/admin/pages/scripts/login.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@stop