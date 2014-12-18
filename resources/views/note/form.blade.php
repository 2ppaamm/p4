			    <!-- Form validation errors -->
			    <div class = "form-errors" style="color: red">
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
                    'files' => 'true'
                ]) !!}
                <!-- Section Create Form ends -->
                    <!-- Gets the section id from where the user clicked and hide it -->
                    {!! Form::hidden('course_section_id', '', ['id'=>'course_section_id']) !!}
                    <div class="form">
                        <div class="form-group">
                            <div class="col-md-8 col-sm-8">
                                <div class="todo-taskbody-user">
                                    <img class="todo-userpic pull-left" src="{{ $user->image }}" width="50px" height="50px">
                                    <span class="todo-username pull-left">{{ $user->username }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4" style="display: none">
                                <div class="todo-taskbody-date pull-right">
        					    	<input type="checkbox" class="make-switch" name="privacy" data-on-color='danger' data-off-color="warning" data-on-text="&nbsp;Private&nbsp;" data-off-text="&nbsp;Public&nbsp;">
                                    <div id="comment">Choose if you want to make note public or private.</div>
                                </div>
                            </div>
                        </div>
                        <!-- END FORM HEAD -->
                        <!-- NOTE TITLE -->
                        <!-- NOTE TYPE-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <!--  note_type form input note_type-->
                                {!! Form::select('note_type_id', ['- Select Note Type -']+$note_types, Input::old('note_types'),[
                                    'class' => 'note_type form-control todo-taskbody-taskdesc select-type']) !!}
                                <!-- end: Select input from database for  note_type -->
                                <span style="color: red"  class="note_type_message note-type-message help-block">Choose an activity</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group file-link" style="display: none">
                                {!! Form::file('input-file', [
                                'class' => 'input-file form-control todo-taskbody-taskdesc'
                                ]) !!}
                            </div>
                            <div class="form-group image-link" style="display: none">
                                {!! Form::file('image-file', [
                                'class' => 'image-file form-control todo-taskbody-taskdesc'
                                ]) !!}
                            </div>
                            <div class="form-group url-link" style="display: none">
                                {!! Form::text('url', null,[
                                    'class' => 'form-control url-link',
                                    'placeholder' => 'Provide Url'
                                ]) !!}
                            </div>
                        </div>
                        <!-- Url form input -->
                        <div class="form-group">
                            <div class="col-md-12">
                                <!-- Section title form input -->
                                {!! Form::text('title', null,[
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
                                {!! Form::textarea('description', null,[
                                   'class' => 'form-control todo-taskbody-taskdesc',
                                   'id' => 'note_description',
                                   'placeholder' => 'Note Description...'
                                ]) !!}
                                <!-- end: text input Note description -->
                            </div>
                        </div>
                        <!-- CREATE NOTE FORM BUTTONS -->
                        <div class="form-actions right todo-form-actions form-buttons">
                            <!-- Create Note button -->
                            {!! Form::button('Create Note',[
                                'class' => 'btn btn-circle btn-sm green-haze',
                                'type' => 'submit',
                            ])!!}
                            <!-- Cancel button -->
                            {!! Form::button('Cancel', [
                                'class' => 'btn btn-circle btn-sm btn-default',
                                'data-dismiss'=>'modal',
                            ]) !!}
                            <!-- end: submit button -->
                        </div>
                    </div>
                {!! Form::close() !!}
