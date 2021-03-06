<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="right-sidebar">
                    <div class="inner-box">
                        <!--HR-->
                        @if(Auth::user()->type == 'HR')
                            <h4>Account</h4>
                            <ul class="lest item">
                                <li>
                                    <a class="@yield('dashboard-active')" href="{{route('hr-dashboard')}}">
                                        <span class="ti-layout-grid2"></span>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="@yield('hr-profile-active')" href="{{route('hr-profile')}}">
                                        <span class="ti-layout-sidebar-2"></span>
                                        School Profile
                                    </a>
                                </li>
                            </ul>
                            @if(count(auth()->user()->hr->employees)>0)
                            <h4>Notifications</h4>
                            <ul class="lest item">
                                <li>
                                    <a class="@yield('manage-notifications-active')" href="{{route('notifications.create')}}">
                                        <span class="ti-bolt"></span>
                                        Send a Notification
                                    </a>
                                </li>
                            </ul>
                            @endif
                            <h4>Subject</h4>
                            <ul class="lest item">
                                <li>
                                    <a class="@yield('manage-subjects-active')" href="{{route('subjects.index')}}">
                                        <span class="ti-book"></span>
                                        Manage Subjects
                                    </a>
                                </li>
                            </ul>
                            <h4>Job</h4>
                            <ul class="lest item">
                                <li>
                                    <a class="@yield('manage-jobs-active')" href="{{route('manage-jobs')}}">
                                        <span class="ti-email"></span>
                                        Manage Jobs
                                    </a>
                                </li>
                            <li><a class="@yield('manage-applications-active')" href="{{route('applications.index')}}">
                                    <span class="ti-bookmark"></span>
                                    Manage Applications
                                </a>
                            </li>

                            </ul>
                            <h4>Employee</h4>
                            <ul class="lest item">
                                <li>
                                    <a class="@yield('manage-employees-active')" href="{{route('employees.index')}}">
                                        <span class="ti-id-badge"></span>
                                        Manage Employees
                                    </a>
                                </li>
                            </ul>
                        @else
                        <!--FACULTY-->
                            <h4>Account</h4>
                            <ul class="lest item">
                                <li>
                                    <a class="@yield('dashboard-active')" href="{{route('dashboard')}}">
                                        <span class="ti-layout-grid2"></span>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="@yield('profile-active')" href="{{route('profile')}}">
                                        <span class="ti-user"></span>
                                        My Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="@yield('notifications-active')" href="{{route('notifications.index')}}">
                                        <span class="ti-bolt"></span>
                                        Notifications
                                        @if(count(auth()->user()->unreadNotifications)>0)
                                        <span class="notinumber">{{count(auth()->user()->unreadNotifications)}}</span>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                            <h4>Lecture</h4>
                            <ul class="lest item">
                                <li>
                                    <a class="@yield('manage-lectures-active')" href="{{route('lectures.index')}}">
                                        <span class="ti-blackboard"></span>
                                        Manage Lectures
                                    </a>
                                </li>
                            </ul>
                            <h4>Repository</h4>
                            <ul class="lest item">
                                <li>
                                    <a class="@yield('manage-documents-active')" href="{{route('document-spaces.index')}}">
                                        <span class="ti-folder"></span>
                                        My Guru Drive
                                    </a>
                                </li>
                            </ul>

                            <h4>Resume</h4>
                            <ul class="lest item">
                                <li>
                                    <a class="@yield('manage-resumes-active')" href="{{route('resumes.index')}}">
                                        <span class="ti-envelope"></span>
                                        My Résumés
                                    </a>
                                </li>
                            </ul>
                        @endif
                        <ul class="lest">
                            <li>
                                <a class="@yield('change-pass-active')" href="{{route('change-pass')}}">
                                    <span class="ti-key"></span>
                                    Change Password
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="ti-filter"></span>
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