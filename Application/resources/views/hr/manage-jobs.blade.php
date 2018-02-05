@extends('hr.dashboard-menu')
@section('title')- Jobs @endsection
@section('current') Jobs @endsection
@section('current-header') Jobs @endsection
@section('manage-jobs-active') active @endsection

@section('dashboard-content')
<div class="job-alerts-item candidates">
    <h3 class="alerts-title">Manage Jobs</h3>
    <div class="alerts-list">
        <div class="row">
            <div class="col-md-3">
                <p>Name</p>
            </div>
            <div class="col-md-3">
                <p># of Applicants</p>
            </div>
            <div class="col-md-3">
                <p>Applicants</p>
            </div>
            <div class="col-md-3">
                <p>Featured</p>
            </div>
        </div>
    </div>
    <div class="alerts-content">
        <div class="row">
            <div class="col-md-3">
                <h3>Web Designer</h3>
                <span class="location"><i class="ti-location-pin"></i> Manhattan, NYC</span>
            </div>
            <div class="col-md-3">
                <p><span class="badge">1</span></p>
            </div>
            <div class="col-md-3">
                <div class="can-img"><a href="#"><img src="{{asset('/img/jobs/candidates.png')}}" alt=""></a></div>
            </div>
            <div class="col-md-3">
                <p><i class="ti-star"></i></p>
            </div>
        </div>
    </div>
    <div class="alerts-content">
        <div class="row">
            <div class="col-md-3">
                <h3>Web Designer</h3>
                <span class="location"><i class="ti-location-pin"></i> Manhattan, NYC</span>
            </div>
            <div class="col-md-3">
                <p><span class="badge">1</span></p>
            </div>
            <div class="col-md-3">
                <div class="can-img"><a href="#"><img src="{{asset('img/jobs/candidates.png')}}" alt=""></a></div>
            </div>
            <div class="col-md-3">
                <p><i class="ti-star"></i></p>
            </div>
        </div>
    </div>
    <div class="alerts-content">
        <div class="row">
            <div class="col-md-3">
                <h3>Web Designer</h3>
                <span class="location"><i class="ti-location-pin"></i> Manhattan, NYC</span>
            </div>
            <div class="col-md-3">
                <p><span class="badge">1</span></p>
            </div>
            <div class="col-md-3">
                <div class="can-img"><a href="#"><img src="{{asset('img/jobs/candidates.png')}}" alt=""></a></div>
            </div>
            <div class="col-md-3">
                <p><i class="ti-star"></i></p>
            </div>
        </div>
    </div>
    <div class="alerts-content">
        <div class="row">
            <div class="col-md-3">
                <h3>Web Designer</h3>
                <span class="location"><i class="ti-location-pin"></i> Manhattan, NYC</span>
            </div>
            <div class="col-md-3">
                <p><span class="badge">1</span></p>
            </div>
            <div class="col-md-3">
                <div class="can-img"><a href="#"><img src="{{asset('img/jobs/candidates.png')}}" alt=""></a></div>
            </div>
            <div class="col-md-3">
                <p><i class="ti-star"></i></p>
            </div>
        </div>
    </div>
</div>
@endsection