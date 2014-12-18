@foreach($subject_list as $subject)
    <li>
        <a href="layout_click_dropdowns.html" class="iconify">
            <i class=" {{ $subject->icon }}"></i>
            {{ $subject ->description }}
        </a>
    </li>
@endforeach
