@extends('layouts.applications')
@section('title')- Pending Applications @endsection
@section('current') Pending Applications @endsection
@section('current-header') Manage Applications @endsection
@section('tab-pending-active') active @endsection

@section('active-tab-content')
        <br/>
        @if(count($applicants) > 0)
            @foreach($applicants as $applicant)
                <div class="box col-md-12">
                    <div class="row">
                        <div class="col-md-1">
                            <b style="font-size: 20px">#{{++$key}}</b>
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
                            <b style="font-size: 14px">Date Applied:</b><br/>
                            <b style="font-size: 14px">{{date('F j, Y \a\t g:i a', strtotime($applicant->pivot->created_at))}}</b><br/>
                            {{--                    <b style="font-size: 12px">{{date('g:i a', strtotime($applicant->pivot->created_at))}}</b>--}}
                            <br/>
                            <a href="/applications/{{$applicant->pivot->job_id}}/{{$applicant->pivot->faculty_id}}/edit"
                               class="btn btn-common btn-block">
                                Accept Application
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
            <br/>
            <h2 style="text-align: center">No Applications Yet</h2>
            <br/>
            <br/>
        @endif
@endsection