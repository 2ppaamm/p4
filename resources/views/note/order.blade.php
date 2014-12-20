<div class="col-md-12"> <!-- style="display: none"-->
    <!-- Arrange Notes Form starts -->
        {!! Form::open([
            'action' => 'SectionController@notes_order',
            'id' => 'section_edit',
            'name'=>'section_edit',
            'method' => 'post'
        ]) !!}
        <!-- Course_id form input -->
                {!! Form::hidden('course_id', $course->id,[
                    'id' => 'course_id',
                    ]) !!}
        <!-- end: text input Course_id -->
        <!-- Arrange Notes Form ends -->
            <!-- Arrange_notes form input -->
            @if(isset($course->course_sections))
                @for($i = 0; $i<count($course->course_sections); $i++)
                    <div class="form-group" style="display: none">
                        <textarea name = '{{$course->course_sections[$i]->id}}' id="nestable_list_{{$i+1}}_output" class="notes_order"></textarea>
                    </div>
                @endfor
            @endif
             <!-- end: text input Arrange_notes -->
        <!-- Enter button -->
        <div class="form-group">
            {!! Form::submit('Save note order') !!}
        </div>
        <!-- end: submit button -->

    {!! Form::close() !!}
</div>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>

<script>
	// Submits a form that
	var options = {
	    type: 'post',
	    url: '/section/notes_order',
	    success: function(response) {
	        // Load the results received from controller into the results div
	        location.reload();
	    }
	};
	$('#section_edit').ajaxForm(options);

</script>

<script>
    $(document).ready(function() {
        $("#output").change(function(){
            alert("The note order will not be changed until you save it at 'Manage Course'.");
        });
    });
</script>