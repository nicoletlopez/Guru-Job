@extends('base')
@section('title')- Dashboard @endsection
@section('current') Dashboard @endsection
@section('current-header') Dashboard @endsection

@section('content')
    @include('inc.header')
    <div class="container">
        @if (session('status'))
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            You are logged in!

                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="right-sideabr">
                        <div class="inner-box">
                            <h4>Manage Account</h4>
                            <ul class="lest item">
                                <li><a class="" href="dashboard">Dashboard</a></li>
                                <li><a class="" href="resume">My Resume</a></li>
                                <li><a href="bookmarked.html">Bookmarked Jobs</a></li>
                                <li><a href="notifications.html">Notifications <span class="notinumber">2</span></a>
                                </li>
                            </ul>
                            <h4>Manage Job</h4>
                            <ul class="lest item">
                                <li><a href="manage-applications.html">Manage Applications</a></li>
                                <li><a href="job-alerts.html">Job Alerts</a></li>
                            </ul>
                            <ul class="lest">
                                <li><a href="change-password.html">Change Password</a></li>
                                <li><a href="index.html">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                @yield('dashboard-content',View::make('faculty.dashboard-content'))
                </div>
            </div>
        </div>
    </div>
@endsection















