@extends('_master')
@section('header')
    Course Codes in the System
@stop
@section('subtitle')
    View status of proposal or apply to teach any course
@stop
@section('page_styles')
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
@stop

@section('content')
    <div class="col-md-12">
	<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
	    			<i class="fa fa-cogs font-green-sharp"></i>
					<span class="caption-subject font-green-sharp bold uppercase">Course Codes in System</span>
				</div>
				<div class="tools">
		    		<a href="javascript:;" class="collapse"></a>
					<a href="#portlet-config" data-toggle="modal" class="config"></a>
					<a href="javascript:;" class="reload"></a>
					<a href="javascript:;" class="remove"></a>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-striped table-hover" id="sample_5">
					<thead>
			    		<tr>
							<th>Subject</th>
							<th>Course Code</th>
							<th>Course Name</th>
							<th>Course Author</th>
							<th>Framework</th>
							<th class="hidden-xs">Pre-Req Level</th>
							<th class="hidden-xs">Target Level</th>
							<th class="hidden-xs">Proposed Cost (US$)</th>
							<th>Course Type</th>
							<th>Actions</th>
						</tr>
					</thead>
				    <tbody>
				        @foreach($course_code_list as $course)
                            <tr>
                                <td>{{ $course->subject->description }}</td>
                                <td>{{ $course->course_code }}</td>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->author->username }}</td>
                                <td>{{ $course->subject->framework->framework }}</td>
                                <td>{{ $course->prereqlevel }}</td>
                                <td>{{ $course->targetlevel }}</td>
                                <td>{{ $course->cost }}</td>
                                <td>{{ $course->course_type->name}}</td>
                                <td>
                                    <a href="/course_code/{{$course->id}}" class="icon-btn tiny">
                                        <i class="fa fa-group"></i>
                                        <div>View Classes</div>
                                        <span class="badge badge-success">{{count($course->courses)}}</span>
                                    </a>
                                    @if (1==2) <!-- if already an instructor -->
                                        <a href="#" class="icon-btn small">
                                            <i class="fa fa-group"></i>
                                            <div>Start a Class</div>
                                        </a>
                                    @else
                                        <a href="/course/apply" class="icon-btn small">
                                            <i class="fa fa-group"></i>
                                            <div>Teach this!</div>
                                        </a>
                                    @endif
                                    <a href="#" class="icon-btn small">
                                       <i class="fa fa-group"></i>
                                       <div>View Instructors</div>
                                        <span class="badge badge-success">{{count($course->instructors)}}</span>
                                    </a>
                                </td>
                            </tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
@stop
@section('page_scripts')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/table-advanced.js"></script>
<script>
jQuery(document).ready(function() {
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
   TableAdvanced.init();
});
</script>
@stop