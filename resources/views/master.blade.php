<!DOCTYPE html>
    <!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
    <!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
    <!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
<head>
    @include('_head')
    @yield('pagehead')
</head>
<body class="login">
	@if(Session::get('flash_message'))
  		<div style="color: #960000" class='flash-message'>{{ Session::get('flash_message') }}</div>
   	@endif

    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="#">
        <img src="/assets/img/all gifted logo tiny.png" alt="All Gifted"/>
        </a>
    </div>
    <!-- END LOGO -->

    <!-- BEGIN LOGIN -->
    <div class="content">
        @yield('content')
    </div>
        @include('_scripts')
        @yield('pagescript')
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>