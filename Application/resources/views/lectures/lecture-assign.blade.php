@extends('faculty.dashboard-menu')
@section('title')- Assign Lecture @endsection
@section('current') Assign Lecture @endsection
@section('current-header') Assign Lecture @endsection
@section('manage-lectures-active') active @endsection
@section('tab-assign-active') active @endsection

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
                            <h3>Assign Lecture</h3>
                            <hr/>
                            <h1>This section is to be filled by Justin! :D</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection