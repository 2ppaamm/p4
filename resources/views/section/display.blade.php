<div class="portlet-body">
    <div class="tabbable-line">
      	<ul class="nav nav-tabs ">
            @if (isset($course->course_sections))
             	@foreach($course->course_sections as $section)
                    <li>
                        <a href="#tab_1_{{ $section->lesson_number }}" data-toggle="tab">
                        {{ $section->lesson_number }} </a>
                    </li>
                @endforeach
                <li class="active">
                    <a href="#tab_1_add" data-toggle="tab"> Add a lesson </a>
                </li>
            @endif
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1_add">
                @include('section.create')
            </div>
            @if (isset($course->course_sections))
                @foreach($course->course_sections as $section)
                    <div class="tab-pane" id="tab_1_{{ $section->lesson_number }}">
                        <h3>Lesson {{$section->lesson_number}} : {{ $section->title }}</h3>
                        <p>{{ $section->description }}</p>
                        @if (isset($section->notes))
                            @foreach($section->notes as $note)
                                <h4>Note: {{$note->note_order}} | {{$note->note_type->format}} | {{ $note->title }}</h4>
                                <img class="img-responsive" src="{{$note->link}}" /><br />
                            @endforeach
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>