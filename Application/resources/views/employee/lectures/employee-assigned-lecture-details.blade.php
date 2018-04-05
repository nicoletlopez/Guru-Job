@extends('hr.dashboard-menu')
@section('title')- Employee Assigned Lecture Details @endsection
@section('current') Employee Assigned Lecture Details @endsection
@section('current-header') Employee Assigned Lecture Details @endsection
@section('manage-employees-active') active @endsection
@section('tab-detail-active') active @endsection

@section('dashboard-content')
    <a href="#" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <hr/>
    @include('inc.messages')
    <section class="section job-detail well">
        <div class="row">
            <div class="col-md-12">
                <div class="content-area">
                    @include('employee.lectures.employee-assigned-lecture-tabs')
                    <div class="box col-md-12">
                        <div class="text-left medium-title">
                            <h3>{{$lecture->title}}</h3>
                        </div>
                        <div class="clearfix">
                            <h4>Lecture Overview</h4>
                            {!! $lecture->overview !!}
                        </div>
                        <div class="clearfix">
                            <h4>Lecture Objectives</h4>
                            {!! $lecture->objectives !!}
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection