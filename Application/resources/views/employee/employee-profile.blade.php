@extends('hr.dashboard-menu')
@section('title')- Employee Profile @endsection
@section('current') Employee Profile @endsection
@section('current-header') Employee Profile @endsection
@section('manage-employees-active') active @endsection

@section('dashboard-content')
    <div class="inner-box my-resume">
        <div class="author-resume">
            <div class="thumb">
                <img height="128" width="128" src="{{$profile->picture}}" alt="">
            </div>
            <div class="author-info">
                <h3>{{$user->name}}</h3>
                <!--<p class="sub-title">UI/UX Designer</p>-->
                <p><span class="address"><i class="ti-home"></i> {{$profile->street_address}}</span></p>
                <p><span class="address"><i class="ti-location-pin"></i> {{$profile->city}}</span></p>
                <p><span class="address"><i class="ti-mobile"></i> {{$profile->contact_number}}</span></p>
            </div>
        </div>
        <div class="about-me item">
            <h3>About</h3>
            {!! $profile->description !!}
        </div>
    </div>
@endsection