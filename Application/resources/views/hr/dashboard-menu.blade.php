@extends('base')
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
                                <li><a class="@yield('dashboard-active')" href="{{route('hr-dashboard')}}">Dashboard</a></li>
                                <li><a class="@yield('hr-profile-active')" href="{{route('hr-profile')}}">School Profile</a></li>
                            </ul>
                            <h4>Manage Job</h4>
                            <ul class="lest item">
                                <li><a class="@yield('manage-jobs-active')" href="{{route('manage-jobs')}}">Manage Jobs</a></li>
                                <li><a class="@yield('manage-applications-active')" href="{{route('manage-applications')}}">Manage Applications</a></li>

                            </ul>
                            <ul class="lest">
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
@endsection















