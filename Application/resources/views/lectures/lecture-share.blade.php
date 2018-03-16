@extends('faculty.dashboard-menu')
@section('title')- Share Lecture @endsection
@section('current') Share Lecture @endsection
@section('current-header') Share Lecture @endsection
@section('manage-lectures-active') active @endsection
@section('tab-share-active') active @endsection

@section('dashboard-content')
    <a href="{{route('lectures.index')}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <hr/>
    @include('inc.messages')
    <section class="section job-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="content-area">
                        @include('lectures.lecture-tabs')
                        <div class="box col-md-11">
                            <br/>
                            <h3>Share Lecture</h3>
                            <hr/>
                            <h1>This section is to be filled by Justin! :D</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection