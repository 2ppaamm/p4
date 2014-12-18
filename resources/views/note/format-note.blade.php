@if ($note->note_type->format == 'Video' || $note->note_type->format == 'Slides'||$note->note_type->format == 'Link' )
    <!-- github disables iframe -->
    @if (strpos($note->link,'github') !== false)
        <a href="{{$note->link}}" target="_blank">Click to view link in new window</a>
    @else
        <div class="embed-responsive embed-responsive-4by3">
            <iframe class="embed-responsive-item" src="{{$note->link}}"></iframe>
        </div>
    @endif

<!-- display image -->
@elseif($note->note_type->format == 'Image')
    <a href="{{$note->link}}" target="_blank"><img class="img-responsive" alt="{{$note->title}}" src="{{$note->link}}" /></a><br />

<!-- display pdf file -->
@elseif($note->note_type->format == 'File')
    <div class="embed-responsive embed-responsive-4by3">
        <iframe class="embed-responsive-item" src="{{$note->link}}"></iframe>
    </div>
@endif
