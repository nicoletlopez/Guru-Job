@extends('faculty.dashboard-menu')
@section('title')- Notifications @endsection
@section('current') Notifications @endsection
@section('current-header') Notifications @endsection
@section('notifications-active') active @endsection

@section('dashboard-content')
    <div class="job-alerts-item notification">
        <h3 class="alerts-title">Your Notifications</h3>
        @foreach($notifications as $key=>$notification)
            <div class="notification-item">
                <div class="thums">
                    <img src="{{$images[$key]}}"/>
                </div>
                <div class="text-left">
                    <p><b>{{$notification->data['hr']['name']}}</b> {{$notification->data['message']}}</p>
                    <!--<span class="time"><i class="ti-time"></i>3 Hours ago</span>-->
                </div>
            </div>
        @endforeach
    </div>
@endsection