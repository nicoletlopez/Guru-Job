<div class="row">
    <div class="col-md-12">
        <div class="col-md-3 col-sm-3 col-xs-12 f-category">
            <div class="icon">
                <i class="ti-time"></i>
            </div>
            <h3>{{ Carbon\Carbon::now()->toFormattedDateString() }}</h3>
        </div>
        <!--HR-->
        @if(Auth::user()->type == 'HR')
            <a href="{{route('hr-profile')}}">
                <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                    <div class="icon">
                        <i class="ti-layout-sidebar-2"></i>
                    </div>
                    <h3>School Profile</h3>
                </div>
            </a>
        @if(count(auth()->user()->hr->employees)>0)
            <a href="{{route('notifications.create')}}">
                <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                    <div class="icon">
                        <i class="ti-bolt"></i>
                    </div>
                    <h3>Send a Notification</h3>
                </div>
            </a>
            @endif
            <a href="{{route('subjects.index')}}">
                <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                    <div class="icon">
                        <i class="ti-book"></i>
                    </div>
                    <h3>Manage Subjects</h3>
                </div>
            </a>
            <a href="{{route('manage-jobs')}}">
                <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                    <div class="icon">
                        <i class="ti-email"></i>
                    </div>
                    <h3>Manage Jobs</h3>
                </div>
            </a>
            <a href="{{route('applications.index')}}">
                <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                    <div class="icon">
                        <i class="ti-bookmark"></i>
                    </div>
                    <h3>Manage Applications</h3>
                </div>
            </a>
            <a href="{{route('employees.index')}}">
                <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                    <div class="icon">
                        <i class="ti-id-badge"></i>
                    </div>
                    <h3>Manage Employees</h3>
                </div>
            </a>
        @else
            <a href="{{route('profile')}}">
                <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                    <div class="icon">
                        <i class="ti-user"></i>
                    </div>
                    <h3>Profile</h3>
                </div>
            </a>
            <a href="{{route('notifications.index')}}">
                <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                    <div class="icon">
                        <i class="ti-bolt"></i>
                    </div>
                    <h3>Notifications</h3>
                    <p><span class="badge">2</span></p>
                </div>
            </a>
            <a href="{{route('lectures.index')}}">
                <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                    <div class="icon">
                        <i class="ti-blackboard"></i>
                    </div>
                    <h3>Manage Lectures</h3>
                </div>
            </a>
            <a href="{{route('document-spaces.index')}}">
                <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                    <div class="icon">
                        <i class="ti-folder"></i>
                    </div>
                    <h3>My Guru Drive</h3>
                </div>
            </a>
            <a href="{{route('resumes.index')}}">
                <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                    <div class="icon">
                        <i class="ti-envelope"></i>
                    </div>
                    <h3>My Résumés</h3>
                </div>
            </a>
        @endif
        <a href="{{ route('change-pass') }}">
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <div class="icon">
                    <i class="ti-key"></i>
                </div>
                <h3>Change Password</h3>
            </div>
        </a>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <div class="icon">
                    <i class="ti-filter"></i>
                </div>
                <h3>Log Out</h3>
            </div>
        </a>
    </div>
</div>