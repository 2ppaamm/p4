<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    @include('_head')
    @yield('page_styles')
</head>

<body>
<div class="page-header"> <!-- Header before contents -->
	<!-- HEADER ABOVE NAVBAR -->
	@include('_page-header')

	<!-- MENU / NAVBAR -->
	@include('_navbar')
</div>

<div class="page-container">
	<!-- BEGIN PAGE HEAD BELOW NAV BAR-->
        @include('_page-head')

	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="row">
     	    @yield('content')
		</div>
	</div>
</div>

<!-- BEGIN FOOTER -->
    @include('_footer')

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    @include('_scripts')
    @yield('page_scripts')
<!-- END JAVASCRIPTS -->
</body>
</html>
