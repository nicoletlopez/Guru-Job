@extends('faculty.dashboard-menu')
@section('title')- Lecture Details @endsection
@section('current') Lecture Details @endsection
@section('current-header') Lecture Details @endsection
@section('manage-lectures-active') active @endsection

@section('dashboard-content')
    <a href="{{url()->previous()}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <section class="section job-detail">

        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="content-area">
                        <h2 class="medium-title">Lecture Details</h2>
                        <div class="box">
                            <div class="text-left">
                                <h3>lectureTitle</h3>
                            </div>
                            <div class="clearfix">
                                <h4>lectureOverview</h4>
                            </div>
                            <div class="clearfix">
                                <h4>lectureObjectives</h4>
                            </div>
                            <div class="clearfix">
                                <h4>Files</h4>
                                <p>filename.ext</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection