<div class="page-header-menu">
	<div class="container">
		<!-- BEGIN MEGA MENU -->
		<div class="hor-menu hor-menu hor-menu-light">
			<ul class="nav navbar-nav">

		    <!-- Dashboard -->
				<li><a href="{!! route('home') !!}">Dashboard</a></li>
				@if(count('mycourses')>0)
				<!-- My Courses Menu and Sections -->
                    <li class="menu-dropdown classic-menu-dropdown ">
                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
                            My Courses <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu pull-left">
                            <li><a href="/course/mycourses">My Course Page</a></li>
                            <hr />
                            @foreach($mycourses as $course)
    							<li class=" dropdown" id="courselink">
      								<a href="/course/show/{{$course->id}}">
       								{{ $course -> title }} </a>
       							</li>
                            @endforeach
                        </ul>
                    </li>
    			@endif
				<!-- Learn menu - lists courses relevant for learner -->
				<li class="menu-dropdown mega-menu-dropdown mega-menu-full">
					<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
    					Learn <i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<div class="mega-menu-content">
								<div class="row">
									<div class="col-md-6">
										<div id="accordion" class="panel-group">
											<div class="panel panel-success">
												<div class="panel-heading">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                                                <!-- In future, get from database attainment for each subject -->
													<h4 class="panel-title">
                                                           My Current Reading Level : Lexile 1200
                   									</h4></a>
												</div>
												<div id="collapseOne" class="panel-collapse in">
													<div class="panel-body">
                                                        <!-- which course is recommended is obtained from database in future -->
                                                        <h4>Recommended Next: Course 1 offered by All Gifted</h4>
                                                        <p>
                                                            <a href="/course_code/1" class="btn default purple-stripe">Available Classes</a>
                                                        </p>
	    					    					</div>
												</div>
											</div>
											<div class="panel panel-success">
												<div class="panel-heading">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
													<h4 class="panel-title">
                                                         My Current Math Level : Maxile 1200
                   									</h4></a>
												</div>
												<div id="collapseOne" class="panel-collapse in">
													<div class="panel-body">
                                                        <h4>Recommended Next: Course 2 authored by Teacher 2</h4>
                                                        <p>
                                                             <a href="/course_code/2" class="btn default purple-stripe">Available Classes</a>
                                                        </p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="note note-success">
											<h4 class="block">Other Courses <a href="/course">View All Courses</a></h4>
											<p>
											    Courses are meant to promote literacy, numeracy and computing skills.
											    Some courses are self-paced while others are instructor-paced.
        									</p>
										</div>
									</div>
							    </div>
							</div>
						</li>
					</ul>
				</li>
				<!-- Start a class menu - courses available for teaching an existing course-->
				<li class="menu-dropdown mega-menu-dropdown">
					<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
		    			Teach <i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu" style="min-width: 710px">
						<li>
							<div class="mega-menu-content">
								<div class="row">
									<div class="col-md-4">
										<ul class="mega-menu-submenu">
											<li>
												<h3>Approved to teach</h3>
											</li>
											<li>
                                                @if (count($teachable_courses)>0)
                                                    @foreach($teachable_courses as $course)
                                                        <a href="/course_code/{{$course->id}}">
                                                            {{ $course->course_code }} | {{$course->title}} <br />
                                                            <p style="color: #960000"> Authored by {{$course->author->username}}</p>
                                                            <img class="img-responsive pull-left" src="{{$course->cover}}" /><br />
                                                        </a>
                                                    @endforeach
                                                @else
                                                    <a href="/course/apply" class="iconify">
                                                    <i class="icon-home"></i></i> Not approved to teach yet.</a>
                                                @endif
                                            </li>
			    						</ul>
									</div>
									<div class="col-md-4">
										<ul class="mega-menu-submenu">
											<li>
												<h3>Offer a Course</h3>
											</li>
											<li>
												<a href="/course_code" class="iconify">
												<i class="icon-cursor-move"></i>
												View all course codes </a>
											</li>
											<li>
												<a href="/course/apply" class="iconify">
												<i class="icon-cursor-move"></i>
												Apply to teach</a>
											</li>
											<li>
												<a href="/course_code/create" class="iconify">
												<i class="icon-cursor-move"></i>
												Propose a Course </a>
											</li>
										</ul>
									</div>
									<div class="col-md-4">
										<ul class="mega-menu-submenu">
											<li>
												<h3>Go to My Classes</h3>
												My list of classes
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</li>
				<li class="menu-dropdown mega-menu-dropdown mega-menu-full pull-right">
					<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
					Home <i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<div class="mega-menu-content">
								<div class="row">
									<div class="col-md-3">
										<ul class="mega-menu-submenu">
											<li>
												<h3>Subjects Available</h3>
											</li>
											<!-- list all subjects -->
											@include('subject.index')
										</ul>
									</div>
									<div class="col-md-3">
										<ul class="mega-menu-submenu">
											<li>
												<h3>Courses Available</h3>
											</li>
										</ul>
									</div>
									<div class="col-md-3">
										<ul class="mega-menu-submenu">
											<li>
												<h3>Instructors</h3>
											</li>
										</ul>
									</div>
									<div class="col-md-3">
										<ul class="mega-menu-submenu">
											<li>
												<h3>Contacts</h3>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</li>
				<!-- Request a course -->
				<li class="menu-dropdown mega-menu-dropdown mega-menu-full ">
					<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
					Site Blog (not implemented) <i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<div class="mega-menu-content">
								<div class="row">
									<div class="col-md-3">
										<ul class="mega-menu-submenu">
											<li>
												<h3>Latest Articles</h3>
											</li>
										</ul>
									</div>
									<div class="col-md-3">
										<ul class="mega-menu-submenu">
											<li>
												<h3>Free Stuff</h3>
											</li>
										</ul>
									</div>
									<div class="col-md-3">
										<ul class="mega-menu-submenu">
											<li>
												<h3>Seminars</h3>
											</li>
										</ul>
									</div>
									<div class="col-md-3">
										<ul class="mega-menu-submenu">
											<li>
												<h3>School Calendar/Events</h3>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- END MEGA MENU -->
	</div>
</div>
