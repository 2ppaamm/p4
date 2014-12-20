@extends('_master')
@section('header')
    {{{$course->course_code->course_code}}}-{{{ $course->title}}}
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
                    <div class="row" id = 'course-main'>
                        <div class="col-md-4 col-sm-3">
                            @include('note.sorter')
                            @include('note.form-modal')
                        </div>
                        <!-- Portlet that displays all notes in each section on the main section -->
                        <div class="col-md-8 col-sm-9" id="course_body">
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

<!-- Script that shows the lesson when mouseover -->
<script>
// highlight the right tab
    $( "ul[name^='lesson-number']" ).click(function () {
        $("[name^='tab_id']").removeClass('active');
        $('#tab_id_'+this.id).addClass('active');
    })
  .click(function(){});
</script>
    <script>
    // format input for form according to note_type
	$( "select" )
      .change(function () {
        var note_type = $( "select option:selected" ).text().toLowerCase();
        if( note_type.indexOf('video') > -1) {
            $( ".note_type_message" ).text( 'Please specify youtube link for video.' );
            $('.file-link').css('display', 'none');
            $('.image-link').css('display', 'none');
            $('.url-link').css('display', 'block');
            $('.form-buttons').css('display', 'block');
        }
        else if( note_type.indexOf('slide') > -1) {
            $( ".note_type_message" ).text( 'Please specify slides link from http://lab.hakim.se/reveal-js/.' );
            $('.file-link').css('display', 'none');
            $('.image-link').css('display', 'none');
            $('.url-link').css('display', 'block');
            $('.form-buttons').css('display', 'block');
        }
        else if( note_type.indexOf('link') > -1) {
            $( ".note_type_message" ).text( 'Please specify a link.' );
            $('.file-link').css('display', 'none');
            $('.image-link').css('display', 'none');
            $('.url-link').css('display', 'block');
            $('.form-buttons').css('display', 'block');
            $('.form-errors').html('');
        }
        else if(note_type.indexOf('file') > -1) {
            $( ".note_type_message" ).text( 'Please upload the relevant pdf file.' );
            $('.file-link').css('display', 'block');
            $('.image-link').css('display', 'none');
            $('.url-link').css('display', 'none');
            $('.form-buttons').css('display', 'block');
            $('.form-errors').html('');
        }
        else if(note_type.indexOf('image') > -1) {
            $( ".note_type_message" ).text( 'Please upload the relevant image file.' );
            $('.file-link').css('display', 'none');
            $('.image-link').css('display', 'block');
            $('.url-link').css('display', 'none');
            $('.form-buttons').css('display', 'block');
            $('.form-errors').html('');
        }
        else if(note_type.indexOf('text') > -1) {
            $( ".note_type_message" ).text( 'Key in Announcement/Text. HTML tags allowed.' );
            $('.file-link').css('display', 'none');
            $('.image-link').css('display', 'none');
            $('.url-link').css('display', 'none');
            $('.form-buttons').css('display', 'block');
            $('.form-errors').html('');
        }
        else {
            $( ".note_type_message" ).text( 'Choose another activity. This is not being implemented for P4 yet.' );
            $('.file-link').css('display', 'none');
            $('.image-link').css('display', 'none');
            $('.url-link').css('display', 'none');
            $('.form-buttons').css('display', 'none');
            $('.form-errors').html('');
        }
      })
      .change();
    </script>
    <script>
        // Javascript to find the id of the note and action clicked on
        $('.note_action').on('click', function () {
       //     alert(this.id)
            $( "#tab_1_note" ).load( this.id, function(){
                $("[name^='tab_id']").removeClass('active');
                $('#tab_id_note').addClass('active');
                $('#tab_1_note').addClass('active');
            });
        });
    </script>
<!-- Ajax form submission couldn't go into show1 -->
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
	<script>
	// First, set up the options for the ajax submission
        var options = {
            type: 'post',
            url: '/note',
            success: function(response) {
                // Load the results recieved from process.php into the results div
                $( ".close" ).trigger( "click" );              //closes the modal
                location.reload();
            },
            error: function (response) {
                $('.form-errors').html('');                             // clears the element first before putting errors there.
                $.each (response['responseJSON'], function(key, val){
                    $('.form-errors').append('*'+val+'<br />');
                })
            }
        };
	// Then attach the ajax form plugin to this form so that when it's submitted,
	// it will be submitted via ajax
    	$('#note_create').ajaxForm(options);
	</script>
@stop