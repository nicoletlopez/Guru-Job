<ul class="nav nav-tabs col-md-11 col-sm-8">
    <li class="@yield('tab-detail-active')"><a href="/lectures/{{$lecture->id}}">Lecture Details</a></li>
    <li class="@yield('tab-file-active')"><a href="/lectures/{{$lecture->id}}/files">Lecture Files</a></li>
    <li class="@yield('tab-assign-active')"><a href="/lectures/{{$lecture->id}}/assign">Assign Lecture</a></li>
    <li class="@yield('tab-share-active')"><a href="/lectures/{{$lecture->id}}/share">Share Lecture</a></li>
</ul>