<div class="page-head">
	<div class="container">
		<!-- BEGIN PAGE TITLE -->
		<div class="page-title">
			<h1>@yield('header') <small>@yield('subtitle')</small></h1>
				@if(Session::get('flash_message'))
            		<div style="color: #960000" class='flash-message'>{{ Session::get('flash_message') }}</div>
            	@endif

		</div>
		<!-- END PAGE TITLE -->
    </div>
</div>