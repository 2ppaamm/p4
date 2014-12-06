        <!-- start: nesting the notes -->
        <div class="dd-handle" style="display: block">
            @if ($note->note_order * 1000 % 1000 === 0)                                                      <!-- test if note is nested -->
                <i class="fa fa-arrows"></i>{{$note->title}} : {{ $note->note_type->format }}
            @elseif ($note->note_order * 1000 % 100 === 0)
                @if ($note->note_order * 10 %10  === 1)
                    <ol class="dd-list">
                @endif
                <li class="dd-item"><i class="fa fa-arrows"></i>{{$note->title}} : {{ $note->note_type->format }}</li>
                @if ($note->lastchild)
                    </ol>
                @endif
            @elseif ($note->note_order * 1000 % 10 < 1)
                @if ($note->note_order * 100 % 100 === 1)
                    <ol class="dd-list">
                @endif
                    <li class="dd-item"><i class="fa fa-arrows"></i>{{$note->title}} : {{ $note->note_type->format }}</li>
                @if ($note->lastchild)
                    </ol>
                @endif
            @elseif ($note->note_order * 1000 % 1 < 1000)
                @if ($note->note_order * 1000 * 1000 === 1)
                    <ol class="dd-list">
                @endif
                    <li class="dd-item"><i class="fa fa-arrows"></i>{{$note->title}} : {{ $note->note_type->format }}</li>
                @if ($note->lastchild)
                    </ol>
                @endif
            @endif
        </div>
        <!-- start: nesting the notes -->
