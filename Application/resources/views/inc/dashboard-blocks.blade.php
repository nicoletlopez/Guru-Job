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
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <a href="{{route('hr-profile')}}">
                    <div class="icon">
                        <i class="ti-folder"></i>
                    </div>
                    <h3>School Profile</h3>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <a href="{{route('subjects.index')}}">
                    <div class="icon">
                        <i class="ti-book"></i>
                    </div>
                    <h3>Manage Subjects</h3>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <a href="{{route('manage-jobs')}}">
                    <div class="icon">
                        <i class="ti-email"></i>
                    </div>
                    <h3>Manage Jobs</h3>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <a href="{{route('applications.index')}}">
                    <div class="icon">
                        <i class="ti-bookmark"></i>
                    </div>
                    <h3>Manage Applications</h3>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <a href="{{route('employees.index')}}">
                    <div class="icon">
                        <i class="ti-id-badge"></i>
                    </div>
                    <h3>Manage Employees</h3>
                </a>
            </div>
        @else
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <a href="{{route('profile')}}">
                    <div class="icon">
                        <i class="ti-book"></i>
                    </div>
                    <h3>Profile</h3>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <a href="{{route('notifications')}}">
                    <div class="icon">
                        <i class="ti-email"></i>
                    </div>
                    <h3>Notifications</h3>
                    <p><span class="badge">2</span></p>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <a href="{{route('lectures.index')}}">
                    <div class="icon">
                        <i class="ti-bookmark-alt"></i>
                    </div>
                    <h3>Manage Lectures</h3>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <a href="{{route('document-spaces.index')}}">
                    <div class="icon">
                        <i class="ti-folder"></i>
                    </div>
                    <h3>My Guru Drive</h3>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <a href="{{route('resumes.index')}}">
                    <div class="icon">
                        <i class="ti-receipt"></i>
                    </div>
                    <h3>My Resumes</h3>
                </a>
            </div>
        @endif
        <div class="col-md-3 col-sm-3 col-xs-12 f-category">
            <a href="{{ route('change-pass') }}">
                <div class="icon">
                    <i class="ti-key"></i>
                </div>
                <h3>Change Password</h3>
            </a>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 f-category">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <div class="icon">
                    <i class="ti-filter"></i>
                </div>
                <h3>Log Out</h3>
            </a>
        </div>
    </div>
</div>