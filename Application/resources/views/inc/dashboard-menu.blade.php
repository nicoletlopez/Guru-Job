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
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="@yield('hr-profile-active')" href="{{route('hr-profile')}}">
                                        School Profile
                                    </a>
                                </li>
                            </ul>
                            <h4>Job</h4>
                            <ul class="lest item">
                                <li>
                                    <a class="@yield('manage-jobs-active')" href="{{route('manage-jobs')}}">Manage
                                        Jobs
                                    </a>
                                </li>
                            <li><a class="@yield('manage-applications-active')" href="{{route('applications.index')}}">
                                    Manage Applications
                                </a>
                            </li>

                            </ul>
                            <h4>Subject</h4>
                            <ul class="lest item">
                                <li>
                                    <a class="@yield('manage-subjects-active')" href="{{route('subjects.index')}}">
                                        Manage Subjects
                                    </a>
                                </li>
                            </ul>
                        @else
                        <!--FACULTY-->
                            <h4>Account</h4>
                            <ul class="lest item">
                                <li>
                                    <a class="@yield('dashboard-active')" href="{{route('dashboard')}}">
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="@yield('profile-active')" href="{{route('profile')}}">
                                        My Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="@yield('notifications-active')" href="{{route('notifications')}}">
                                        Notifications
                                        <span class="notinumber">2</span>
                                    </a>
                                </li>
                            </ul>
                            <h4>Lecture</h4>
                            <ul class="lest item">
                                <li>
                                    <a class="@yield('manage-lectures-active')" href="{{route('lectures.index')}}">
                                        Manage Lectures
                                    </a>
                                </li>
                            </ul>
                            <h4>Repository</h4>
                            <ul class="lest item">
                                <li>
                                    <a class="@yield('manage-documents-active')" href="{{route('document-spaces.index')}}">
                                        My Guru Drive
                                    </a>
                                </li>
                            </ul>

                            <h4>Resume</h4>
                            <ul class="lest item">
                                <li>
                                    <a class="@yield('manage-resumes-active')" href="{{route('resumes.index')}}">
                                        My Resumes
                                    </a>
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