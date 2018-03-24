<ul class="nav nav-tabs">
    <li class="@yield('tab-detail-active') lectureTabs">
        <a href="/lectures/{{$lecture->id}}" style="text-align: center">
            Lecture Details
        </a>
    </li>
    <li class="@yield('tab-file-active') lectureTabs">
        <a href="/lectures/{{$lecture->id}}/files" style="text-align: center">
            Lecture Files
        </a>
    </li>
    <li class="@yield('tab-assign-active') lectureTabs">
        <a href="/lectures/{{$lecture->id}}/assign" style="text-align: center">
            Assign Lecture
        </a>
    </li>
    <li class="@yield('tab-share-active') lectureTabs">
        <a href="/lectures/{{$lecture->id}}/share" style="text-align: center">
            Share Lecture
        </a>
    </li>
</ul>