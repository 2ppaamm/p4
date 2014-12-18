<!--  Modify Note modal -->
<div id="note-edit-{{$note->id}}" class="modal fade modal-scroll" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <div class="col-md-12 col-sm-12">
                    <div class="todo-taskbody-user">
                        <img class="todo-userpic pull-right" src="{{ $user->image }}" width="50px" height="50px">
                        <span class="todo-username pull-right">{{ $user->username }}</span>
                    </div>
                </div>
          		<h4 class="modal-title">View {{$note->note_type->format}} {{$note->title}}</h4>
				@include('note.show')
				<h4 class="modal-title">Editting {{$note->note_type->format}} Note</h4>
			</div>
			<div class="modal-body">
			    <!-- Form validation errors -->
			    <div class="form-errors" style="color: red">
	                 @foreach ($errors->all() as $error)
                        <p class="error">{{ $error }}</p>
                    @endforeach
                </div>
                <!-- Section Create Form starts -->
                {!! Form::open([
                    'url' => '/note/'.$note->id,
                    'id' => 'note_edit',
                    'name'=>'note_edit',
                    'class' => 'form-horizontal',
                    'files' => 'true',
                    'method' => 'PUT'
                ]) !!}
                <!-- Section Create Form ends -->
                    <!-- Course_section_id form input -->
                        {!! Form::hidden('course_section_id', $note->course_section_id) !!}
                        </div>
                     <!-- end: text input Course_section_id -->
                    <div class="form-group">
                        <div class="col-md-4 col-sm-4">
                            <div style="display: none" class="todo-taskbody-date pull-right">
     					    	<input type="checkbox" class="make-switch" name="privacy" data-on-color='danger' data-off-color="warning" data-on-text="&nbsp;Private&nbsp;" data-off-text="&nbsp;Public&nbsp;">
                                <div id="comment">Choose if you want to make note public or private.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        @if ($note->note_type->format == 'Video' || $note->note_type->format == 'Slides' || $note->note_type->format == 'Link' )
                            {!! Form::text('link', $note->link,[
                                'class' => 'form-control',
                                'placeholder' => $note->link
                            ]) !!}
                        @elseif($note->note_type->format == 'File')
                            {!! Form::file('link', [
                               'class' => 'form-control todo-taskbody-taskdesc']) !!}
                        @elseif($note->note_type->format == 'Image')
                            {!! Form::file('link', [
                                'class' => 'image-file form-control todo-taskbody-taskdesc']) !!}
                        @endif
                    </div>
                        <!-- Url form input -->
                    <div class="form-group">
                        <div class="col-md-12">
                            <!-- Note title form input -->
                            {!! Form::text('title', $note->title,[
                                'class' => 'form-control todo-taskbody-tasktitle',
                                'id' => 'note_title_$note->id',
                                'placeholder' => $note->title
                            ]) !!}
                            <!-- end: text input Section_title -->
                        </div>
                    </div>
                    <!-- NOTE DESC -->
                    <div class="form-group">
                        <div class="col-md-12">
                        <!-- Note description form input -->
                            {!! Form::textarea('description', $note->description,[
                               'class' => 'form-control todo-taskbody-taskdesc',
                               'id' => 'note_description_$note->id',
                               'placeholder' => $note->description
                            ]) !!}
                            <!-- end: text input Note description -->
                        </div>
                    </div>
                    <!-- CREATE NOTE FORM BUTTONS -->
                    <div class="form-actions todo-form-actions">
                        <!-- Create Note button -->
                        {!! Form::button('Save Changes',[
                            'class' => 'btn btn-circle btn-sm green-haze',
                            'type' => 'submit',
                        ])!!}
                        <!-- Cancel button -->
                        {!! Form::button('Cancel', [
                            'class' => 'btn btn-circle btn-sm btn-default',
                            'data-dismiss'=>'modal',
                        ]) !!}
                        <!-- end: submit button -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<div id="note-delete-{{$note->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Delete Confirmation</h4>
			</div>
			<div class="modal-body">
			<p> Are you sure you want to delete this note?</p>
    		</div>
	    	<div class="modal-footer">
		        <!--  Form starts -->
		        {!! Form::open([
                    'url' => '/note/'.$note->id,
                    'method'=>'DELETE',
                ]) !!}
                    <!-- Delete button -->
                        {!! Form::submit('Yes Delete It',['class'=>'btn green','data-dismss'=>'modal']) !!}
                        <button type="button" data-dismiss="modal" class="btn default">No</button>
                    <!-- end: submit button -->
                {!! Form::close() !!}
                <!--  Form ends -->
	        </div>
	    </div>
    </div>
</div>
