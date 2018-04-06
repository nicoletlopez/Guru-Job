@extends('faculty.dashboard-menu')
@section('title')- Assign Document Space @endsection
@section('current') Assign Document Space @endsection
@section('current-header') Assign Document Space @endsection
@section('manage-documents-active') active @endsection

@section('dashboard-content')
    <a onclick="goBack()" href="#" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <hr/>
    @include('inc.messages')
    <section class="section job-detail well">
        <div class="row">
            <div class="col-md-12 col-sm-8">
                <div class="content-area">
                    <br/>
                    <h3>Assign Document Space</h3>
                    <hr/>
                    @if(count($employers) > 0)
                        @foreach($employers as $employer)
                            <div class="box col-md-12">
                                <div class="row">
                                    <div class="col-md-1">
                                        <b style="font-size: 20px">#{{++$key}}</b>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{$employer->user->profile->picture}}" height="80"
                                             style="border-radius: 8px;"/>
                                    </div>
                                    <div class="col-md-5">
                                        <b style="font-size: 20px">{{$employer->user->name}}</b><br/>
                                        Established on <b
                                                style="font-size: 15px">{{date('F j, Y', strtotime($employer->user->profile->dob))}}</b><br/>
                                        Located at <b
                                                style="font-size:14px">{{$employer->user->profile->street_address}},</b><br/>
                                        <b style="font-size: 14px">{{$employer->user->profile->city}} City</b><br/>
                                        Contact No. <b
                                                style="font-size: 14px">{{$employer->user->profile->contact_number}}</b>
                                    </div>
                                    <div class="col-md-4">
                                        <br/>
                                        @if(!$employer->docIsAssigned($document_space->id,$employer->user_id))
                                            <a href="/document-spaces/{{$document_space->id}}/assign/{{$employer->user_id}}"
                                               class="btn btn-common btn-block">
                                                Assign
                                            </a>
                                        @else
                                            <a href="/document-spaces/{{$document_space->id}}/unassign/{{$employer->user_id}}"
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
                </div>
            </div>
        </div>
    </section>
@endsection