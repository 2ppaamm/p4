<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    @include('_head')
<!-- BEGIN PAGE STYLES -->
    @yield('page_styles')
<!--END PAGE STYLES
</head>

<body>
<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER ABOVE NAVBAR -->
	@include('_page-header')
	<!-- END HEADER TOP ABOVE NAVBAR-->
	<!-- BEGIN HEADER MENU / NAVBAR -->
	@include('_navbar')
	<!-- END HEADER MENU / NAVBAR-->
</div>
<!-- END HEADER -->
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD BELOW NAV BAR-->
        @include('_page-head')
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
        @include('_configurator')
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
     	        @yield('content')
			</div>
			<!-- END PAGE CONTENT INNER -->
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<!-- BEGIN FOOTER -->
    @include('_footer')
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    @include('_scripts')
    @yield('page_scripts')
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
