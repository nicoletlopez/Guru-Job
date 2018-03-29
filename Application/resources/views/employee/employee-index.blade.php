@extends('hr.dashboard-menu')
@section('title')- Manage Employees @endsection
@section('current') Manage Employees @endsection
@section('current-header') Manage Employees @endsection
@section('manage-employees-active') active @endsection

@section('dashboard-content')
    @include('inc.messages')
    <section class="section job-detail well">
        <div class="row">
            <div class="col-md-12">
                <div class="content-area">
                    <div class="box col-md-12">
                        <h2>Employees</h2>
                        <br/>
                        @if(count($employees) > 0)
                            @foreach($employees as $employee)
                                <div class="box col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <b style="font-size: 20px">#{{++$key}}</b>
                                        </div>
                                        <div class="col-md-2">
                                            <img src="{{$employee->user->profile->picture}}" height="80" style="border-radius: 8px;"/>
                                        </div>
                                        <div class="col-md-5">
                                            <b style="font-size: 20px">{{$employee->user->name}}</b><br/>
                                            Born on <b style="font-size: 15px">{{date('F j, Y', strtotime($employee->user->profile->dob))}}</b><br/>
                                            Lives in <b style="font-size:14px">{{$employee->user->profile->street_address}},</b><br/>
                                            <b style="font-size: 14px">{{$employee->user->profile->city}} City</b><br/>
                                            Contact No. <b style="font-size: 14px">{{$employee->user->profile->contact_number}}</b>
                                        </div>
                                        <div class="col-md-4">
                                            <b style="font-size: 14px">Date Hired:</b><br/>
                                            <b style="font-size: 14px">{{date('F j, Y \a\t g:i a', strtotime($employee->pivot->created_at))}}</b><br/>
                                            {{--                    <b style="font-size: 12px">{{date('g:i a', strtotime($applicant->pivot->created_at))}}</b>--}}
                                            <br/>
                                            <a href="#"
                                               class="btn btn-common btn-block">
                                                View Profile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                            @endforeach
                            {{ $employees->links() }}
                        @else
                            <br/>
                            <h2 style="text-align: center">No Employees Hired Yet</h2>
                            <br/>
                            <br/>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection