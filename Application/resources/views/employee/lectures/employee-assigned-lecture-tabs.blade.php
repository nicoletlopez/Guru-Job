<ul class="nav nav-tabs">
    <li class="@yield('tab-detail-active') assignedLectureTabs">
        <a href="/employees/{{$lecture->faculty_id}}/lectures/{{$lecture->id}}/details" style="text-align: center">
            Lecture Details
        </a>
    </li>
    <li class="@yield('tab-file-active') assignedLectureTabs">
        <a href="/employees/{{$lecture->faculty_id}}/lectures/{{$lecture->id}}/files" style="text-align: center">
            Lecture Files
        </a>
    </li>
</ul>