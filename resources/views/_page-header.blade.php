<div class="page-header-top">
	<div class="container">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="/"><img src="/assets/img/all gifted logo tiny.png" alt="logo" class="logo-default"></a>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler"></a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-bell"></i>
					<span class="badge badge-default">7</span>
					</a>
					<ul class="dropdown-menu">
						<li class="external">
							<h3>Alert system will be implemented later</h3>
						</li>
					</ul>
				</li>
				<!-- END NOTIFICATION DROPDOWN -->
				<!-- BEGIN TODO DROPDOWN -->
				<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-calendar"></i>
					<span class="badge badge-default">3</span>
					</a>
					<ul class="dropdown-menu extended tasks">
						<li class="external">
							<h3>To do list will be implemented later</h3>
						</li>
					</ul>
				</li>
				<!-- END TODO DROPDOWN -->
				<li class="droddown dropdown-separator">
					<span class="separator"></span>
				</li>
				<!-- BEGIN INBOX DROPDOWN -->
				<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="circle">3</span>
                        <span class="corner"></span>
					</a>
    				<ul class="dropdown-menu">
						<li class="external">
							<h3>Message System will be implemented<strong>later</strong></h3>
							<a href="javascript:;">Future links</a>
						</li>
					</ul>
				</li>
				<!-- END INBOX DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="{{$user->image}}">
                        <span class="username username-hide-mobile">{{ $user->username }}</span>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="extra_profile.html">
							<i class="icon-user"></i> My Profile (future)</a>
						</li>
						<li>
							<a href="page_calendar.html">
							<i class="icon-calendar"></i> My Calendar(future) </a>
						</li>
						<li>
							<a href="inbox.html">
							<i class="icon-envelope-open"></i> My Inbox (future) <span class="badge badge-danger">
							3 </span>
							</a>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-rocket"></i> My Tasks (future) <span class="badge badge-success">
							7 </span>
							</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="/auth/logout">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
</div>