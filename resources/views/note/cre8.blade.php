<!-- Create a new note modal -->
<<div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			<h4 class="modal-title">Create a new Note</h4>
		</div>
    	<div class="modal-body">
	        <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">
	            <div class="row">
                    @foreach ($errors->all() as $error)
                        <p class="error">{{ $error }}</p>
                    @endforeach
                    <!-- Section Create Form starts -->
                    {!! Form::open([
                        'url' => '/note',
                        'id' => 'note_create',
                        'name'=>'note_create',
                        'class' => 'form-horizontal',
                        'action' => 'javascript'
                    ]) !!}
                    <!-- Section Create Form ends -->

                        <!-- FORM HEAD -->
                        <div class="form">
                            <div class="form-group">
                                <div class="col-md-8 col-sm-8">
                                    <div class="todo-taskbody-user">
                                        <img class="todo-userpic pull-left" src="{{ Auth::user()->image }}" width="50px" height="50px">
                                        <span class="todo-username pull-left">{{ Auth::user()->username }}</span>
                                        <button type="button" class="todo-username-btn btn btn-circle btn-default btn-xs">&nbsp;edit&nbsp;</button>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="todo-taskbody-date pull-right">
                                        <!-- Privacy form input -->
                                            <div class="form-group">
                                                {!! Form::checkbox('privacy', null,[
                                                    'class' => 'make-switch',
                                                    'id' => 'privacy',
                                                    'placeholder' => 'Privacy'
                                                    ]) !!}
                                            </div>
                                         <!-- end: text input Privacy -->
                                        <input type="checkbox" class="make-switch" data-on-text="Yes" data-off-text="No">

                                        <button type="button" class="todo-username-btn btn btn-circle btn-default btn-xs">&nbsp; Make Public &nbsp;</button>
                                    </div>
                                </div>
                            </div>
                            <!-- END TASK HEAD -->
                            <!-- TASK TITLE -->
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
                            <!-- TASK DESC -->
                            <div class="form-group">
                                <div class="col-md-12">
                                <!-- Section description form input -->
                                    {!! Form::textarea('Note_description', null,[
                                        'class' => 'form-control todo-taskbody-taskdesc',
                                        'id' => 'Note_description',
                                        'placeholder' => 'Note description'
                                        ]) !!}
                                <!-- end: text input Section description -->
                                </div>
                            </div>
                            <!-- END NOTE DESC -->

                            <!-- CREATE NOTE FORM BUTTONS -->
                            <div class="form-actions right todo-form-actions">
                                <!-- Save Changes button -->
                                {!! Form::button('Save Changes',[
                                    'class' => 'btn btn-circle btn-sm green-haze',
                                    'type' => 'submit'
                                 ])!!}
                                <!-- Cancel button -->
                                    {!! Form::button('Cancel', [
                                      'class' => 'btn btn-circle btn-sm btn-default'
                                    ]) !!}
                                <!-- end: submit button -->
                            </div>
                            <!-- end: submit button -->
                        </div>
                    {!! Form::close() !!}
	            </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn default">Close</button>
                <button type="button" class="btn green">Save changes</button>
            </div>
		</div>
	</div>
</div>
<div class="modal fade" id="ajax" role="basic" aria-hidden="true">
	<div class="page-loading page-loading-boxed">
		<img src="../../assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
		<span>&nbsp;&nbsp;Loading... </span>
	</div>
	<div class="modal-dialog">
	    <div class="modal-content">
		</div>
	</div>
</div>
<!-- /.modal -->