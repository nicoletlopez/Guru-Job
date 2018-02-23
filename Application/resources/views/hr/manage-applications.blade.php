@extends('hr.dashboard-menu')
@section('title')- Manage Applications @endsection
@section('current') Manage Applications @endsection
@section('current-header') Manage Applications @endsection
@section('manage-applications-active') active @endsection

@section('dashboard-content')
    @foreach($jobs as $job)
        @foreach($job->applicants as $applicant)
            <div class="job-alerts-item candidates">
                <h3 class="alerts-title">Manage applications</h3>
                <table class="table">
                    <thead class="">
                    <tr>
                        <th>Job Title</th>
                        <th>Applicant</th>
                        <th>Name</th>
                        <th>Date Applied</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><a href="#"><h3>{{$job->title}}</h3></a></td>
                        <td>
                            <div class="can-img"><a href="#"><img class="img-rounded"
                                                                  src="{{$applicant->user->profile->picture}}"
                                                                  alt=""></a>
                            </div>
                        </td>
                        <td>{{$applicant->user->name}}</td>
                        <td>{{$applicant->pivot->created_at}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
    @endforeach
@endsection