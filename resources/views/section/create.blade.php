<div class="scroller" style="max-height: 800px;" data-always-visible="0" data-rail-visible="0" data-handle-color="#dae3e7">
    @foreach ($errors->all() as $error)
        <p class="error">{{ $error }}</p>
    @endforeach
    <!-- Section Create Form starts -->
    {!! Form::open([
        'url' => '/section/create',
        'id' => 'section_create',
        'name'=>'section_create',
        'class' => 'form-horizontal',
        'action' => 'javascript'
    ]) !!}
    <!-- Section Create Form ends -->

    <!-- TASK HEAD -->
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
						<button type="button" class="todo-username-btn btn btn-circle btn-default btn-xs">&nbsp; Make Public &nbsp;</button>
					</div>
				</div>
			</div>
			<!-- END TASK HEAD -->
			<!-- TASK TITLE -->
		    <div class="form-group">
				<div class="col-md-12">
				    <!-- Section title form input -->
			            {!! Form::text('section_title', null,[
			                'class' => 'form-control todo-taskbody-tasktitle',
			                'id' => 'section_title',
			                'placeholder' => 'Section Title...'
		                ]) !!}
        		    <!-- end: text input Section_title -->
				</div>
			</div>
			<!-- TASK DESC -->
			<div class="form-group">
				<div class="col-md-12">
				<!-- Section description form input -->
				    {!! Form::textarea('section_description', null,[
				        'class' => 'form-control todo-taskbody-taskdesc',
				        'id' => 'section_description',
				        'placeholder' => 'Section description'
				        ]) !!}
				<!-- end: text input Section description -->
				</div>
			</div>
			<!-- END TASK DESC -->

			<!-- SET DATE SECTION IS PLANNED-->
			<div class="form-group">
			    <div class="col-md-12">
					<div class="input-icon">
						<i class="fa fa-calendar"></i>
						<input type="text" class="form-control todo-taskbody-due" placeholder="Section Date...">
					</div>
				</div>
			</div>
            <!-- CREATE SECTION FORM BUTTONS -->
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
