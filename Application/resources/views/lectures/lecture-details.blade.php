@extends('faculty.dashboard-menu')
@section('title')- Lecture Details @endsection
@section('current') Lecture Details @endsection
@section('current-header') Lecture Details @endsection
@section('manage-lectures-active') active @endsection
@section('tab-detail-active') active @endsection

@section('dashboard-content')
    <a href="{{route('lectures.index')}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <hr/>
    @include('inc.messages')
    <section class="section job-detail well">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="content-area">
                        @include('lectures.lecture-tabs')
                        <div class="box col-md-11">
                            <div class="text-left">
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

        </div>
    </section>
@endsection