<li class="dd-item" data-id="{{$note->id}}">
    <div class="col-md-1 pull-right">
        <!-- start: Display action bar for each note -->
        <a href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <i class="fa fa-gear"></i>
        </a>
            <ul class="dropdown-menu pull-right">
                <li id="/note/{{$note->id}}" class="note_action">
                    <a href="javascript:;"><i class="fa fa-play-circle"></i>VIEW</a>
                </li>
                <li id="/note/{{$note->id}}/duplicate" class="note_action">
                    <a href="javascript:;"><i class="fa fa-copy"></i>DUPLICATE</a>
                </li>
                <li id="/note/{{$note->id}}/edit" class="note_action">
                    <a href="javascript:;"><i class="fa fa-pencil"></i>UPDATE</a>
                </li>
                <li id="/note/{{$note->id}}/delete" class="note_action">
                    <a href="javascript:;"><i class="fa fa-minus-circle"></i>DELETE</a>
                </li>
                <li id="note/{{$note->id}}/hide" class="note_action">
                    <a href="javascript:;"><i class="fa fa-eye"></i>HIDE</a>
                </li>
            </ul>
    </div>
        <div class="dd-handle">
            <i class="fa fa-arrows"></i>{{$note->title}} : {{ $note->note_type->format }}       <!-- Display first level note -->
        </div>
</li>
