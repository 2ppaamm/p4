<div class="portlet-body">
    <div class="tabbable-line">
      	<ul class="nav nav-tabs ">
            @if (isset($course->course_sections))
             	@foreach($course->course_sections as $section)
                    <li id = "tab_id_{{$section->lesson_number}}" name = 'tab_id'>
                        <a href="#tab_1_{{ $section->lesson_number }}" data-toggle="tab" id = 'section{{$section->lesson_number}}'>
                        {{ $section->lesson_number }} </a>
                    </li>
                @endforeach
                <li id="tab_id_note" style="display: block">
                    <a href="#tab_1_note" data-toggle="tab"> Notes </a>
                </li>
            @endif
        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="tab_1_note">
               {{-- @include('note.edit')--}}
               <ul>
               <li> Edit a note </li>
               <li> Delete a note </li>
               <li> Duplicate a note </li>
               <li> View a note </li>
               </ul>
            </div>
            @if (isset($course->course_sections))
                @foreach($course->course_sections as $section)
                    <div class="tab-pane" id="tab_1_{{ $section->lesson_number }}">
                        <h3>Lesson {{$section->lesson_number}} : {{ $section->title }}</h3>
                        <p>{!! $section->description !!}</p>
                        @if (isset($section->notes))
                            @foreach($section->notes as $note)
                                @include('note.show')
                            @endforeach
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>