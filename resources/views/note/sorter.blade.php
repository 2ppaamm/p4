<div class="portlet box white" id="output">
    <div class="portlet-body">
    <!-- start List Sections -->
        @if(count($course->course_sections)<1)
            <div>No lessons created yet.</div>
        @else
        <!-- start: Display the course sections -->
            @for($i=0; $i<count($course->course_sections); $i++)
                <div class="todo-tasklist-item todo-tasklist-item-border-purple">
                    <img class="todo-userpic pull-left" src="{{ $course->course_sections[$i]->guid }}" width="27px" height="27px">
                    <div class="todo-tasklist-item-title">
                       Lesson: {{ $course->course_sections[$i]->lesson_number }}|{{ $course->course_sections[$i]->title }}
                    </div>
                    <div class="todo-tasklist-item-text">
                        {{ $course->course_sections[$i]->description}}
                    </div>
                    <div class="todo-tasklist-controls pull-left">
                        <span class="todo-tasklist-date"><i class="fa fa-calendar"></i> {{ $course->course_sections[$i]->lesson_date }} </span>

                        <!-- Allows adding of notes when clicked. Sows a form -->
                        <a class="todo-tasklist-badge badge badge-roundless" data-toggle="modal" data-section-id ="{{ $course->course_sections[$i]->id }}" href="#responsive">
                            Add a Note </a>
                    </div>
                </div>

                <!-- end: Display course sections -->

                <!-- Arrange notes in each section in order determined by instructor -->
                <div class='section_display' id="{{$course->course_sections[$i]->id}}">
                    <div class="dd" id="nestable_list_{{$i+1}}">
                        @if (count($course->course_sections[$i]->notes)<1)
                            <li class="dd-item">
                                <div class="dd-empty"></div>
                            </li>
                        @else
                            <ol class="dd-list">
                                @foreach ($course->course_sections[$i]->notes as $note)
                                    @include('note.display')
                                @endforeach
                            </ol>
                        @endif
                    </div>
                </div>
            @endfor
        @endif
    </div>
</div>