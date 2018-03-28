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
                        <b style="font-size: 20px">#{{++$key}}</b>
                    </div>
                    <div class="col-md-2">
                        <img src="{{$applicant->user->profile->picture}}" height="80" style="border-radius: 8px;"/>
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
                        <a href="#"
                           class="btn btn-common btn-block">
                            Hire
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
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
        @endforeach
        {{ $applicants->links() }}
    @else
        <h2>No Accepted Applicants Yet</h2>
    @endif
@endsection