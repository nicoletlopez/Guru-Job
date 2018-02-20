@extends('hr.dashboard-menu')
@section('title')- Manage Subjects @endsection
@section('current') Manage Subjects @endsection
@section('current-header') Manage Subjects @endsection
@section('manage-subjects-active') active @endsection

@section('dashboard-content')

    <div class="job-alerts-item candidates">
        <h3 class="alerts-title">Manage Subjects <a class="btn btn-success" href="{{route('subjects.create')}}">Add a Subject</a></h3>
        <table class="table">
            @if(count($subjects)>0)
                <thead class="">
                <tr>
                    <th><p>Subject Name</p></th>
                    <th><p>Schedule</p></th>
                    <th><p>Action</p></th>
                </tr>
                </thead>
                <tbody>

                @foreach($subjects as $subject)
                    <tr>
                        <td><a href="/subjects/{{$subject->id}}"><h3>{{$subject->name}}</h3></a></td>
                        <td>Day - time</td>
                        <td>
                            <a href="/subjects/{{$subject->id}}/edit" class="btn btn-primary">Edit</a>
                            {!! Form::open(['action'=>['SubjectsController@destroy',$subject->id],'method'=>'POST']) !!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                @else
                    <h4>No Jobs Posted. <a href="{{route('jobs.create')}}" class="btn btn-common">
                            <i class="ti-pencil-alt"></i> Post A Job
                        </a></h4>

                @endif
                </tbody>
        </table>
    </div>

    <!--
    <div class="job-alerts-item candidates">
        <h3 class="alerts-title">Manage Jobs</h3>
        <div class="alerts-list">
            <div class="row">
                <div class="col-md-4">
                    <p class="center">Name</p>
                </div>
                <div class="col-md-1">
                    <p class="center">#</p>
                </div>
                <div class="col-md-5">
                    <p class="center">Applicants</p>
                </div>
                <div class="col-md-2">
                    <p class="center">Action</p>
                </div>
            </div>
        </div>
        <div class="alerts-content">

            <div class="row">
                <div class="col-md-4">
                    <h3>Web Designer</h3>
                </div>
                <div class="col-md-1">
                    <p><span class="badge">1</span></p>
                </div>
                <div class="col-md-5">
                    <div class="can-img"><a href="#"><img src="{{asset('/img/jobs/candidates.png')}}"></a></div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <button class="btn btn-block btn-primary">Edit</button>
                    </div>
                    <div class="row">
                        <button class="btn btn-block btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
@endsection