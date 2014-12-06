@extends('_master')
@section('header')
    {{{ $course->title}}}
@stop
@section('page_styles')
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/jquery-nestable/jquery.nestable.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/select2/select2.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/pages/css/todo.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"/>
    <script>var num_sections = {{ count($course->course_sections)}}</script>

    <!--pass variable from database to javascript for sorting -->
@stop

@section('content')
    <!-- BEGIN PAGE CONTAINER -->
    <div class="page-container">
        <!-- BEGIN PAGE CONTENT -->
        <div class="page-content">
            <div class="container">
                <!-- BEGIN PAGE CONTENT INNER -->
                <div class="portlet light">
                <!-- PORTLET HEAD -->
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-bar-chart font-red-sharp hide"></i>
                            <span class="caption-helper">COURSE PAGE:</span> &nbsp; <span class="caption-subject font-green-sharp bold uppercase">{{ $course->title }}</span>
                        </div>
                        @include('course.action')
                    </div>
                <!-- end PORTLET HEAD -->

                <div class="portlet-body">
                    <div class="row">
                        @include('note.edit')
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-3">
                            @include('note.sorter')
                            @include('note.create')
                        </div>
                        <!-- Portlet that displays all notes in each section on the main section -->
                        <div class="col-md-8 col-sm-9">
        					<div class="portlet light">
        						<div class="portlet-title">
        							<div class="caption">
        								<i class="fa fa-cogs font-green-sharp"></i>
        								<span class="caption-subject font-purple-sharp bold uppercase">Click on Lesson to view:</span>
        							</div>
        							<div class="tools">
        								<a href="javascript:;" class="collapse">
        								</a>
        								<a href="#portlet-config" data-toggle="modal" class="config">
        								</a>
        							</div>
        						</div>
        						@include('section.display')
        					</div>
                        </div>
                    </div>
                </div>
            </div>
                    <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- END PAGE CONTAINER -->
@stop
@section('page_scripts')
    <script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="/assets/global/plugins/select2/select2.min.js"></script>
    <script src="/assets/admin/pages/scripts/todo.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jquery-nestable/jquery.nestable.js"></script>
    <script src="/assets/admin/pages/scripts/ui-nestable.js"></script>
    <script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="/assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
    <script src="/assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

    <script>
    // Initializes the page
    jQuery(document).ready(function() {
       Metronic.init(); // init metronic core components
       Layout.init(); // init current layout
       Demo.init(); // init demo features
       UINestable.init();
       Todo.init(); // init
    });

    // Javascript to find the id of the element clicked on
    $('.note_action').on('click', function () {
        alert(this.id)
        $.get( this.id, function( data ) {
        $( "#notes" ).html( data );
        })
    });

    // enables display of a hidden tab with a # on the address bar
    $(function(){
      var hash = window.location.hash;
      hash && $('ul.nav a[href="' + hash + '"]').tab('show');
    });
    </script>
    <script>
        // script for passing data into a modal, this script must be loaded end of the page
        //triggered when modal is about to be shown
        $('#responsive').on('show.bs.modal', function(e) {
        //get data-id attribute of the clicked element
            var sectionId = $(e.relatedTarget).data('section-id');
            //populate the hidden textbox
            $(e.currentTarget).find('input[name="course_section_id"]').val(sectionId);
        });
    </script>
@stop