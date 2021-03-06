@extends('_master')

@section('header')
    {{$course_code_courselist->first()->course_code->course_code}}
@stop

@section('subtitle')
    {{$course_code_courselist->first()->course_code->title}}
@stop
@section('page_styles')
<link href="/assets/admin/pages/css/pricing-table.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
	<div class="col-md-12">
    	<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>List of classes and instructors for {{$course_code_courselist->first()->course_code->course_code}}
				</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
					<a href="#portlet-config" data-toggle="modal" class="config"></a>
					<a href="javascript:;" class="reload"></a>
					<a href="javascript:;" class="remove"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="row margin-bottom-40">
					@foreach ($course_code_courselist as $class)
					<!-- Class list for Course -->
						<div class="col-md-4">
							<div class="pricing hover-effect">
								<div class="pricing-head">
									<h3>{{$class->creator->username}}
									    <span>{{$class->title}}</span>
									</h3>
									<h4><i>$</i><i>{{$class->cost}}</i>
								    	<span>Per {{$class->course_type->name}} </span>
									</h4>
								</div>
								<ul class="pricing-content list-unstyled">
									<li><i class="fa fa-calendar"></i> Start Date: {{$class->startdate}}</li>
									<li><i class="fa fa-calendar-o"></i> End Date: {{$class->enddate}}</li>
									<li><i class="fa fa-clock-o"></i> Duration: {{$class->duration}}</li>
									<li><i class="fa fa-heart"></i> Rating by students: TBD</li>
									<li><i class="fa fa-star"></i> Rating by All Gifted: TBD</li>
								</ul>
								<div class="pricing-footer">
									<p> {{$class->description}}	</p>
									@foreach ($errors->all() as $error)
									    <p class="error">{{ $error }}</p>
									@endforeach
									<!-- Enrol Form starts -->
								    {!! Form::open([
								        'url' => '/enrollment',
								        'id' => 'enrollment',
								        'name'=>'enrolment'
								    ]) !!}
								    <!-- Course_id form input -->
							            {!! Form::hidden('course_id', $class->id,[
							                'id' => 'course_id'
						                ]) !!}
								    <!-- end: text input Course_id -->
								    <!-- Course_code form input -->
								        {!! Form::hidden('course_code', $class->course_code_id,[
								            'id' => 'course_code',
								        ]) !!}
								    <!-- end: text input Course_code -->
                                        <button class="btn yellow-crusta" type="submit">
                                            Enrol <i class="m-icon-swapright m-icon-white"></i>
                                        </button>
									{!! Form::close() !!}
									<!-- Enrol Form ends -->

								</div>
							</div>
						</div>
					@endforeach
					<!--//End Pricing -->
				</div>
			</div>
		</div>
	</div>
@stop
@section('page_scripts')
<script>
jQuery(document).ready(function() {
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
});
</script>
@stop