@extends('hr.dashboard-menu')
@section('title')- Subject Details @endsection
@section('current') Subject Details @endsection
@section('current-header') Subject Details @endsection
@section('manage-subjects-active') active @endsection

@section('dashboard-content')
    <a href="{{url()->previous()}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <section class="section job-detail">

        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="content-area">
                        <h2 class="medium-title">Subject Details</h2>
                        <div class="box">
                            <div class="text-left">
                                <h3>{{$subject->name}}</h3>
                            </div>
                            <div class="clearfix">
                                <h4>Description</h4>
                                <p>{!! $subject->desc !!}</p>
                            </div>
                            <div class="clearfix">
                                <h4>Schedule</h4>

                                @foreach($schedules as $schedule)
                                    <p><b>{{$schedule->day}}</b> {{date("h:i:s A",strtotime($schedule->start))}}
                                        - {{date("h:i:s A",strtotime($schedule->end))}}</p>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection