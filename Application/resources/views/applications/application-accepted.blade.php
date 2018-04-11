@extends('layouts.applications')
@section('title')- Accepted Applicants @endsection
@section('current') Accpeted Applicants @endsection
@section('current-header') Manage Applications @endsection
@section('tab-accepted-active') active @endsection

@section('active-tab-content')
    <br/>
    @if(count($applicants) > 0)
        @foreach($applicants as $applicant)
            <div class="box col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <p style="margin-bottom: 15px">
                            <b style="font-size: 20px;">#{{++$key}}</b>
                        </p>
                        <a target="_blank" href="/applications/{{$applicant->user_id}}/resume/{{$applicant->mainTemplate($applicant->user_id)}}">
                            <span class="ti-envelope" style="font-size: 40px" title="Resume"></span>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <img src="{{$applicant->user->profile->picture}}" width="100%" style="border-radius: 8px;"/>
                    </div>
                    <div class="col-md-5">
                        <b style="font-size: 20px">{{$applicant->user->name}}</b><br/>
                        Born on <b style="font-size: 15px">{{date('F j, Y', strtotime($applicant->user->profile->dob))}}</b><br/>
                        Lives in <b style="font-size:14px">{{$applicant->user->profile->street_address}},</b><br/>
                        <b style="font-size: 14px">{{$applicant->user->profile->city}} City</b><br/>
                        Contact No. <b style="font-size: 14px">{{$applicant->user->profile->contact_number}}</b>
                    </div>
                    <div class="col-md-4">
                        <b style="font-size: 14px">Date Accepted:</b><br/>
                        <b style="font-size: 14px">{{date('F j, Y \a\t g:i a', strtotime($applicant->pivot->created_at))}}</b><br/>
                        {{--                    <b style="font-size: 12px">{{date('g:i a', strtotime($applicant->pivot->created_at))}}</b>--}}
                        <br/>
                        <a href="/applications/{{$applicant->pivot->job_id}}/{{$applicant->pivot->faculty_id}}/hire"
                           class="btn btn-common btn-block">
                            Hire Applicant
                        </a>
                    </div>
                </div>
                <hr/>
                <p style="font-size:16px;">
                    Applied for Job:
                    <a href="/jobs/{{$applicant->pivot->job_id}}/applicants">
                        <b>{{$applicant->job_title}}</b>
                    </a>
                </p>
            </div>
        @endforeach
        {{ $applicants->links() }}
    @else
        <h3 style="text-align: center; margin-top: 20px; margin-bottom: 20px">&nbsp;No accepted applicant yet</h3>
    @endif
@endsection