@extends('hr.dashboard-menu')
@section('title')- Subject Details @endsection
@section('current') Subject Details @endsection
@section('current-header') Subject Details @endsection
@section('manage-subjects-active') active @endsection

@section('dashboard-content')
    <a href="{{route('subjects.index')}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <section class="section job-detail">

        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="content-area">
                        <h2 class="medium-title">Subject Details</h2>
                        <div class="box col-md-11">
                            <div class="text-left">
                                <h3>{{$subject->name}}</h3>
                            </div>
                            <div class="clearfix">
                                <h4>Specializations</h4>

                                <ol>
                                    @foreach($specializations as $specialization)
                                        <li>{{$specialization->name}}</li>
                                    @endforeach
                                </ol>

                            </div>
                            <div class="clearfix">
                                <h4>Description</h4>
                                <p>{!! $subject->desc !!}</p>
                            </div>
                            <div class="clearfix">
                                <h4>Schedule</h4>

                                <table>
                                    @foreach($subject->schedules as $schedule)
                                        <tr>
                                            <td><b>{{$schedule->day}}</b></td>
                                            <td>&nbsp;</td>
                                            <td>{{date("h:i A",strtotime($schedule->start))}}</td>
                                            <td>-</td>
                                            <td>{{date("h:i A",strtotime($schedule->end))}}</td>
                                        </tr>
                                    @endforeach
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection