@extends('layouts.lectures')
@section('title')- Assign Lecture @endsection
@section('current') Assign Lecture @endsection
@section('current-header') Assign Lecture @endsection
@section('tab-assign-active') active @endsection

@section('active-tab-content')
    <br/>
    <h3>Assign Lecture</h3>
    <hr/>
    @if(count($employers) > 0)
        @foreach($employers as $employer)
            <div class="box col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <b style="font-size: 20px">#{{++$key}}</b>
                    </div>
                    <div class="col-md-2">
                        <img src="{{$employer->user->profile->picture}}" height="80" style="border-radius: 8px;"/>
                    </div>
                    <div class="col-md-5">
                        <b style="font-size: 20px">{{$employer->user->name}}</b><br/>
                        Established on <b
                                style="font-size: 15px">{{date('F j, Y', strtotime($employer->user->profile->dob))}}</b><br/>
                        Located at <b style="font-size:14px">{{$employer->user->profile->street_address}},</b><br/>
                        <b style="font-size: 14px">{{$employer->user->profile->city}} City</b><br/>
                        Contact No. <b style="font-size: 14px">{{$employer->user->profile->contact_number}}</b>
                    </div>
                    <div class="col-md-4">
                        <br/>
                        @if(!$employer->isAssigned($lecture->id,$employer->user_id))
                            <a href="/lectures/{{$lecture->id}}/assign/{{$employer->user_id}}"
                               class="btn btn-common btn-block">
                                Assign
                            </a>
                        @else
                            <a href="/lectures/{{$lecture->id}}/unassign/{{$employer->user_id}}"
                               class="btn btn-common-inverse btn-block">
                                Remove
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        {{ $employers->links() }}
    @else
        <br/>
        <h2 style="text-align: center">You're not hired yet.</h2>
        <br/>
        <br/>
    @endif
@endsection