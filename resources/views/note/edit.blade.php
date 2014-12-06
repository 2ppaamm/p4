<div class="col-md-12"> <!-- style="display: none"-->
    <!-- Arrange Notes Form starts -->
        {!! Form::open([
            'url' => '/section/notes_order',
            'id' => 'section_edit',
            'name'=>'section_edit',
            'method' => 'post'
        ]) !!}
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
            {!! Form::submit('Enter') !!}
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
	        // Load the results recieved from process.php into the results div\\
	        location.reload();
//	        $('#output').html(response);
	    }
	};
	$('#section_edit').ajaxForm(options);
/*  $(document).ready(function() {
       $('.section_display').change( function() {
           $.ajax({ // create an AJAX call...
               type: $('#section_display').attr('method'), // GET or POST from the form
               url: $('#section_display').attr('url'), // the file to call from the form
               success: function(response) { // on success..
               alert('page updated');
	        $('#output').html(response);
//               location.reload();
//                   $('#output').html('page updated'); // update the DIV
               }
           });
        });
    });
*/
</script>