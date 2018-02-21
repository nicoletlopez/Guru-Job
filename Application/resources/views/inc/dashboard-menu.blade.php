<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="right-sideabr">
                    <div class="inner-box">
                        @if(Auth::user()->type == 'HR')
                            <h4>Account</h4>
                            <ul class="lest item">
                                <li><a class="@yield('dashboard-active')" href="{{route('hr-dashboard')}}">Dashboard</a>
                                </li>
                                <li><a class="@yield('hr-profile-active')" href="{{route('hr-profile')}}">School
                                        Profile</a></li>
                            </ul>
                            <h4>Job</h4>
                            <ul class="lest item">
                                <li><a class="@yield('manage-jobs-active')" href="{{route('manage-jobs')}}">Manage
                                        Jobs</a></li>
                                <li><a class="@yield('manage-applications-active')"
                                       href="{{route('applications.index')}}">Manage Applications</a></li>

                            </ul>
                            <h4>Subject</h4>
                            <ul class="lest item">
                                <li><a class="@yield('manage-subjects-active')" href="{{route('subjects.index')}}">Manage Subjects</a></li>
                            </ul>
                        @else
                            <h4>Account</h4>
                            <ul class="lest item">
                                <li><a class="@yield('dashboard-active')" href="{{route('dashboard')}}">Dashboard</a></li>
                                <li><a class="@yield('profile-active')" href="{{route('profile')}}">My Profile</a></li>
                                <li><a class="@yield('notifications-active')" href="{{route('notifications')}}">Notifications <span class="notinumber">2</span></a>
                                </li>
                            </ul>
                        @endif
                        <ul class="lest">
                            <li>
                                <a class="@yield('change-pass-active')" href="{{route('change-pass')}}">
                                    Change Password
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Log Out
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                @yield('dashboard-content')
            </div>
        </div>
    </div>
</div>