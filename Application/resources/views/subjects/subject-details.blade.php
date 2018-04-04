<?php use App\Http\Controllers\JobsController; ?>
@extends('hr.dashboard-menu')
@section('title')- Subject Details @endsection
@section('current') Subject Details @endsection
@section('current-header') Subject Details @endsection
@section('manage-subjects-active') active @endsection

@section('dashboard-content')
    <a onclick="goBack()" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <section class="section job-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="content-area">
                        <h2 class="medium-title" style="width:300px;">Subject Details
                            <a href="/subjects/{{$subject->id}}/edit" class="subjectTooltip" title="Edit Subject">
                                <i style="font-size:30px;" class="ti-pencil"></i>
                            </a>
                            {!! Form::open(['action'=>['SubjectsController@destroy',$subject->id],'method'=>'POST','class'=>'pull-right']) !!}
                            {{Form::hidden('_method','DELETE')}}
                            <button style="border:none;background-color:transparent;" data-toggle="confirmation" data-placement="bottom" data-title="{{in_array($subject->id,JobsController::getUsedSubjects()) ? 'Warning! the Job will be deleted':'Are you sure?'}}"
                                    type="submit">
                                <i style="font-size:30px;" class="ti-trash"></i>
                            </button>
                            {!! Form::close() !!}
                        </h2>

                        <div class="box col-md-11">
                            <div class="text-left">
                                <h3>{{$subject->name}}
                                    @if(in_array($subject->id,JobsController::getUsedSubjects()))
                                        <p><b>Job:</b> <a href="/jobs/{{$subject->job->id}}">{{$subject->job->title}}</a></p>
                                    @endif
                                </h3>
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
    @include('inc.prompt-delete')
@endsection