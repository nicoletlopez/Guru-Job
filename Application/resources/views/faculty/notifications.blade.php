@extends('faculty.dashboard-menu')
@section('title')- Notifications @endsection
@section('current') Notifications @endsection
@section('current-header') Notifications @endsection
@section('notifications-active') active @endsection

@section('dashboard-content')
    <div class="job-alerts-item notification">
        <h3 class="alerts-title">Your Notifications</h3>
        <div class="notification-item">
            <div class="thums">
                <img src="{{asset('img/jobs/img-1.jpg')}}" alt="">
            </div>
            <div class="text-left">
                <p>Your Bookmarked job "Web designer needed" from Banana Inc, has expired.</p>
                <span class="time"><i class="ti-time"></i>3 Hours ago</span>
            </div>
        </div>
        <div class="notification-item">
            <div class="thums">
                <img src="{{asset('img/jobs/img-2.jpg')}}" alt="">
            </div>
            <div class="text-left">
                <p>Your Bookmarked job "Web designer needed" from Banana Inc, has expired.</p>
                <span class="time"><i class="ti-time"></i>3 Hours ago</span>
            </div>
        </div>
        <div class="notification-item">
            <div class="thums">
                <img src="{{asset('img/jobs/img-3.jpg')}}" alt="">
            </div>
            <div class="text-left">
                <p>Your Bookmarked job "Web designer needed" from Banana Inc, has expired.</p>
                <span class="time"><i class="ti-time"></i>3 Hours ago</span>
            </div>
        </div>
        <div class="notification-item">
            <div class="thums">
                <img src="{{asset('img/jobs/img-4.jpg')}}" alt="">
            </div>
            <div class="text-left">
                <p>Your Bookmarked job "Web designer needed" from Banana Inc, has expired.</p>
                <span class="time"><i class="ti-time"></i>3 Hours ago</span>
            </div>
        </div>
        <div class="notification-item">
            <div class="thums">
                <img src="{{asset('img/jobs/img-5.jpg')}}" alt="">
            </div>
            <div class="text-left">
                <p>Your Bookmarked job "Web designer needed" from Banana Inc, has expired.</p>
                <span class="time"><i class="ti-time"></i>3 Hours ago</span>
            </div>
        </div>
        <div class="notification-item">
            <div class="thums">
                <img src="{{asset('img/jobs/img-4.jpg')}}" alt="">
            </div>
            <div class="text-left">
                <p>Your Bookmarked job "Web designer needed" from Banana Inc, has expired.</p>
                <span class="time"><i class="ti-time"></i>3 Hours ago</span>
            </div>
        </div>
    </div>
@endsection