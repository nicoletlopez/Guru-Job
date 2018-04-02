@extends('hr.dashboard-menu')
@section('title')- Employee Profile @endsection
@section('current') Employee Profile @endsection
@section('current-header') Employee Profile @endsection
@section('manage-employees-active') active @endsection

@section('dashboard-content')
    <div class="author-resume">
        <div class="thumb">
            <img height="128" width="128" src="{{$profile->picture}}" alt="">
        </div>
        <div class="author-info">
            <h3>{{$user->name}}
            <!--<p class="sub-title">UI/UX Designer</p>-->
            <p><span class="address"><i class="ti-home"></i> {{$profile->street_address}}</span></p>
            <p><span class="address"><i class="ti-location-pin"></i> {{$profile->city}}</span></p>
            <p><span class="address"><i class="ti-mobile"></i> {{$profile->contact_number}}</span></p>
            <!--
            <div class="social-link">
                <a class="twitter" target="_blank" data-original-title="twitter" href="#"
                   data-toggle="tooltip" data-placement="top"><i class="fa fa-twitter"></i></a>
                <a class="facebook" target="_blank" data-original-title="facebook" href="#"
                   data-toggle="tooltip" data-placement="top"><i class="fa fa-facebook"></i></a>
                <a class="google" target="_blank" data-original-title="google-plus" href="#"
                   data-toggle="tooltip" data-placement="top"><i class="fa fa-google"></i></a>
                <a class="linkedin" target="_blank" data-original-title="linkedin" href="#"
                   data-toggle="tooltip" data-placement="top"><i class="fa fa-linkedin"></i></a>
            </div>
            -->
        </div>
    </div>
    <div class="about-me item">
        <h3>About</h3>
        {!! $profile->description !!}
    </div>
@endsection