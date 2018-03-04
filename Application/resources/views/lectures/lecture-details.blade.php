@extends('faculty.dashboard-menu')
@section('title')- Lecture Details @endsection
@section('current') Lecture Details @endsection
@section('current-header') Lecture Details @endsection
@section('manage-lectures-active') active @endsection

@section('dashboard-content')

    <a href="{{route('lectures.index')}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <hr/>
    @include('inc.messages')
    <section class="section job-detail">

        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="content-area">
                        <h2 class="medium-title">Lecture Details</h2>
                        <div class="box">
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
                            @include('lectures.lecture-upload')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection