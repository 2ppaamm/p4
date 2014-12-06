@extends('_master')

@section('header')
    My Courses
@stop

@section('subtitle')
    All courses I have enrolled in
@stop

@section('content')
	<!-- BEGIN ACCORDION PORTLET-->
    <div class="portlet light">
    	<div class="portlet-title">
        	<div class="caption">
    	    	<i class="fa fa-cogs font-green-sharp"></i>
    			<span class="caption-subject font-green-sharp bold uppercase">My Courses</span>
    		</div>
    		<div class="tools">
    			<a href="javascript:;" class="collapse"></a>
				<a href="#portlet-config" data-toggle="modal" class="config"></a>
    		</div>
    	</div>
		@if(count('mycourses')<1)
    	    I have no course, list courses interest/surfed before/ close to framework level
	    @else
	        @for($i=0; $i<count($mycourses); $i++)
            	<div class="portlet-body">
            		<div class="panel-group accordion" id="accordion3">
            			<div class="panel panel-default">
            				<div class="panel-heading">
            					<h4 class="panel-title">
            	    				<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse"
            	    				data-parent="#accordion3" href="#collapse_3_{{$i}}">
            							{{ $mycourses[$i] -> title }}
            							@foreach( $mycourses[$i]->course_roles as $course_role )
            							    | {{ $course_role->description }}
            							@endforeach</a>
                                        @if (isset($mycourses[$i]->course_end_date))
                							Expiry : {{ $mycourses[$i]->course_end_date }}
                						@endif
            					</h4>
            				</div>
            			<div id="collapse_3_{{$i}}" class="panel-collapse collapse">
                     		<div class="panel-body">
                                <p>{{ $mycourses[$i]->description}} </p>
                                <p> Latest news/todo/updates/alerts on each course</p>
                                <p>Touch the course title to go to the course page, otherwise just open accordion</p>
            		        </div>
            	        </div>
                    </div>
                </div>
        	</div>
        @endfor
	<!-- END ACCORDION PORTLET-->

					<!-- My Courses Menu and Sections -->
                        <li class="menu-dropdown classic-menu-dropdown ">
                            <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
                            My Courses <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-left">
                                @foreach($mycourses as $course)
        							<li class=" dropdown-submenu">
        								<a href="javascript:;">
        								{{ $course -> title }} </a>
        								@if(count($course->course_sections)>0)
                                            <ul class="dropdown-menu">
                                                @foreach($course->course_sections as $course_section)
                                                    <li class=" ">
                                                        <a href="table_basic.html">
                                                        Section {{$course_section->lesson_number}}: {{$course_section->title}} </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
        							</li>
                                @endforeach
                            </ul>
                        </li>
					@endif
@stop
@section('page_scripts')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="../../assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
    <script src="../../assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@stop