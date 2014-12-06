<!--  Create Note modal -->
<div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Create a Note</h4>
			</div>
			<div class="modal-body">
			    <div id = "form-errors" style="color: red">
	                 @foreach ($errors->all() as $error)
                        <p class="error">{{ $error }}</p>
                    @endforeach
                </div>
                    <!-- Section Create Form starts -->
                    {!! Form::open([
                        'url' => '/note',
                        'id' => 'note_create',
                        'name'=>'note_create',
                        'class' => 'form-horizontal',
                        'action' => 'javascript'
                    ]) !!}
                    <!-- Section Create Form ends -->
                    <!-- Gets the section id from where the user clicked and hide it -->
                        {!! Form::hidden('course_section_id', '', ['id'=>'course_section_id']) !!}
                        <div class="form">
                            <div class="form-group">
                                <div class="col-md-8 col-sm-8">
                                    <div class="todo-taskbody-user">
                                        <img class="todo-userpic pull-left" src="{{ Auth::user()->image }}" width="50px" height="50px">
                                        <span class="todo-username pull-left">{{ Auth::user()->username }}</span>
                            </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="todo-taskbody-date pull-right">
        								<input type="checkbox" class="make-switch" name="privacy" data-on-color='danger' data-off-color="success" data-on-text="&nbsp;Private&nbsp;" data-off-text="&nbsp;Public&nbsp;">
                                        <div id="comment">Choose if you want to make note public or private.</div>
                                    </div>
                                </div>
                            </div>
                            <!-- END FORM HEAD -->
                            <!-- NOTE TITLE -->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <!-- Section title form input -->
                                        {!! Form::text('note_title', null,[
                                            'class' => 'form-control todo-taskbody-tasktitle',
                                            'id' => 'note_title',
                                            'placeholder' => 'Note Title...'
                                        ]) !!}
                                    <!-- end: text input Section_title -->
                                </div>
                            </div>
                            <!-- NOTE DESC -->
                            <div class="row form-group">
                                <div class="col-md-12">
                                <!-- Note description form input -->
                                    {!! Form::textarea('note_description', null,[
                                        'class' => 'form-control todo-taskbody-taskdesc',
                                        'id' => 'note_description',
                                        'placeholder' => 'Note Description...'
                                        ]) !!}
                                <!-- end: text input Note description -->
                                </div>
                            </div>

                            <!-- SET DATE SECTION IS PLANNED-->
                            <div class="form-group">
                                <div class="col-md-4">
                                    <!--  note_type form input note_type-->
                                    {!! Form::select('note_type', ['- Select Note Type -']+$note_types, Input::old('note_types'),[
                                        'class' => 'form-control todo-taskbody-taskdesc']) !!}
                                    <!-- end: Select input from database for  note_type -->
                                </div>
                                <div class="col-md-8">
                                    {!! Form::file('link', ['class' => 'form-control todo-taskbody-taskdesc']) !!}
                                </div>
                            </div>
                            <!-- CREATE SECTION FORM BUTTONS -->
                            <div class="form-actions right todo-form-actions">
                                <!-- Save Changes button -->
                                {!! Form::button('Create Note',[
                                    'class' => 'btn btn-sm purple',
                                    'type' => 'submit'
                                 ])!!}
                            </div>
                            <!-- end: submit button -->
                        </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
	<script>
	// First, set up the options for the ajax submission
        var options = {
            type: 'post',
            url: '/note',
            success: function(response) {
                // Load the results recieved from process.php into the results div
                $('#form-errors').html(response);
        //        $('#form-errors').html('Form successfully submitted');
            },
            error: function (response) {
                $('#form-errors').html("");                             // clears the element first before putting errors there.
                $.each (response['responseJSON'], function(key, val){
                    $('#form-errors').append('*'+val+'<br />');
                })
            }
        };
	// Then attach the ajax form plugin to this form so that when it's submitted,
	// it will be submitted via ajax
    	$('#note_create').ajaxForm(options);
	</script>
