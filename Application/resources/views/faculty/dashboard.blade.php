@extends('faculty.dashboard-menu')
@section('title')- Dashboard @endsection
@section('current') Dashboard @endsection
@section('current-header') Dashboard @endsection
@section('dashboard-active') active @endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <div class="icon">
                    <i class="ti-time"></i>
                </div>
                <h3>{{ Carbon\Carbon::now()->toFormattedDateString() }}</h3>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <a href="resume">
                    <div class="icon">
                        <i class="ti-book"></i>
                    </div>
                    <h3>Resume</h3>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <a href="bookmarked-jobs">
                    <div class="icon">
                        <i class="ti-bookmark"></i>
                    </div>
                    <h3>Bookmarked Jobs</h3>
                </a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 f-category">
                <a href="notifications">
                    <div class="icon">
                        <i class="ti-email"></i>
                    </div>
                    <h3>Notifications</h3>
                    <p><span class="badge">2</span></p>
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
@endsection