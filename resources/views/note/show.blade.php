<!-- BEGIN Portlet for each note-->
<div class="portlet light bg-inverse">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-paper-plane font-green-haze"></i>
			<span class="caption-subject bold font-green-haze uppercase"></span>
            <span>Note: {{$note->note_order}}</span>
			<span class="caption-helper">{!! $note->title !!}</span>
		</div>
		<div class="tools">
			<a href="" class="reload"></a>
			<a href="" class="remove"></a>
			<a href="javascript:;" class="fullscreen"></a>
		</div>
	</div>
	<div class="portlet-body">
		<h4>{!! $note->description !!}</h4>
	    @include('note.format-note')
	</div>
</div>
<!-- END note Portlet -->