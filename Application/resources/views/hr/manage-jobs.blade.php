@extends('hr.dashboard-menu')
@section('title')- Manage Jobs @endsection
@section('current') Manage Jobs @endsection
@section('current-header') Manage Jobs @endsection
@section('manage-jobs-active') active @endsection

@section('dashboard-content')

    <div class="job-alerts-item candidates">
        <h3 class="alerts-title">Manage
            Jobs <!--<a class="btn btn-success" href="{{route('jobs.create')}}">Post a Job</a>--></h3>
        <table class="table">
            @if(count($jobs)>0)
                <thead class="">
                <tr>
                    <th>Job Title</th>
                    <th># of Applicants</th>
                    <th>Applicants</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($jobs as $key=>$job)
                    <tr>
                        <td><a href="/jobs/{{$job->id}}"><h3>{{$job->title}}</h3></a></td>
                        <td><span class="badge">{{$job->applicants->count()}}</span></td>
                        <td>
                            @if(count($job->applicants) > 0)
                                <a href="#" class="btn btn-success">
                                    View
                                </a>
                                <!--
                                <div class="can-img">


                                    @foreach($job->applicants as $applicant)
                                        <a href="#"><img class="img-circle"
                                                         src="{{$applicant->user->profile->picture}}"/></a>
                                    @endforeach

                                </div>
                                -->
                                @else
                                <p class="text-center">None</p>
                            @endif
                        </td>
                        <td>
                            <a href="/jobs/{{$job->id}}/edit" class="btn btn-primary">Update</a>
                            <a href="#" data-target=".delete-job{{$key}}" data-toggle="modal" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <!--MODAL-->
                    @include('jobs.job-delete')
                @endforeach
                @else
                    <h4>No Jobs Posted. <a href="{{route('jobs.create')}}" class="btn btn-common">
                            <i class="ti-pencil-alt"></i> Post A Job
                        </a></h4>

                @endif
                </tbody>
        </table>
    </div>

@endsection