@extends('faculty.dashboard-menu')
@section('title')- Notifications @endsection
@section('current') Notifications @endsection
@section('current-header') Notifications @endsection
@section('notifications-active') active @endsection

@section('dashboard-content')
    <div class="job-alerts-item notification">
        <h3 class="alerts-title">Your Notifications</h3>
        @foreach($notifications as $notification)
            <div class="notification-item">
                <div class="text-left">
                    <p>{{$notification->data}}</p>
                    <!--<span class="time"><i class="ti-time"></i>3 Hours ago</span>-->
                </div>
            </div>
        @endforeach
    </div>
@endsection