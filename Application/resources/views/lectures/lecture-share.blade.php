@extends('layouts.lectures')
@section('title')- Share Lecture @endsection
@section('current') Share Lecture @endsection
@section('current-header') Share Lecture @endsection
@section('tab-share-active') active @endsection

@section('active-tab-content')
    <br/>
    <h3>Share Lecture</h3>
    <hr/>
    @if(count($coworkers) > 0)
        @foreach($coworkers as $coworker)
            <div class="box col-md-12">
                <div class="row">
                    <div class="col-md-1">
                        <b style="font-size: 20px">#{{++$key}}</b>
                    </div>
                    <div class="col-md-2">
                        <img src="{{$coworker->user->profile->picture}}" height="80" style="border-radius: 8px;"/>
                    </div>
                    <div class="col-md-5">
                        <b style="font-size: 20px">{{$coworker->user->name}}</b><br/>
                        Established on <b
                                style="font-size: 15px">{{date('F j, Y', strtotime($coworker->user->profile->dob))}}</b><br/>
                        Located at <b style="font-size:14px">{{$coworker->user->profile->street_address}},</b><br/>
                        <b style="font-size: 14px">{{$coworker->user->profile->city}} City</b><br/>
                        Contact No. <b style="font-size: 14px">{{$coworker->user->profile->contact_number}}</b>
                    </div>
                    <div class="col-md-4">
                        <br/>
                        @if(!$coworker->isAssigned($lecture->id,$coworker->user_id))
                            <a href="/lectures/{{$lecture->id}}/share/{{$coworker->user_id}}"
                               class="btn btn-common btn-block">
                                Share
                            </a>
                        @else
                            <a href="/lectures/{{$lecture->id}}/unshare/{{$coworker->user_id}}"
                               class="btn btn-common btn-block">
                                Remove
                            </a>
                        @endif
                    </div>
                </div>
                <hr/>
                <p style="margin-bottom: 10px"><strong style="font-size: 20px">This person works at:</strong></p>
                @foreach($coworker->employers as $employer)
                    <img width="30" class="img-circle" src="{{$employer->user->profile->picture}}" style="margin-left:30px"/>
                    <strong style="font-size: 16px">{{$employer->user->name}}</strong>
                @endforeach
            </div>
        @endforeach
        {{ $coworkers->links() }}
    @else
        <br/>
        <h2 style="text-align: center">You're not hired yet.</h2>
        <br/>
        <br/>
    @endif
@endsection