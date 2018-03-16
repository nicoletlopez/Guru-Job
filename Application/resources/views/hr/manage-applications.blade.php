@extends('hr.dashboard-menu')
@section('title')- Manage Applications @endsection
@section('current') Manage Applications @endsection
@section('current-header') Manage Applications @endsection
@section('manage-applications-active') active @endsection

@section('dashboard-content')

    <div class="job-alerts-item candidates">
        <div class="row">
            <div class="col-md-5">
                <h3 class="alerts-title">Manage applications</h3>
            </div>
            <div class="form-group col-md-offset-1 col-md-6">
                {{--<input class="form-control" type="text" name="s" placeholder="job title / keywords">--}}
                {{Form::text('search-term','',['class'=>'form-control','placeholder'=>'Search Applicants',
                                                'style' => 'height:20px'])}}
            </div>
        </div>
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
            @foreach($jobs as $job)
                @foreach($job->applicants as $applicant)
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
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>

@endsection