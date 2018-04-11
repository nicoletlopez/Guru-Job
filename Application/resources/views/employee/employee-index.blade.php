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
                        <hr/>
                        @if(count($employees) > 0)
                            @foreach($employees as $employee)
                                <div class="box col-md-12">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <b style="font-size: 20px">#{{++$key}}</b>
                                        </div>
                                        <div class="col-md-2">
                                            <img src="{{$employee->user->profile->picture}}" width="100%" style="border-radius: 8px;"/>
                                        </div>
                                        <div class="col-md-5">
                                            <b style="font-size: 20px">{{$employee->user->name}}</b><br/>
                                            Born on <b style="font-size: 15px">{{date('F j, Y', strtotime($employee->user->profile->dob))}}</b><br/>
                                            Lives in <b style="font-size:14px">{{$employee->user->profile->street_address}},</b><br/>
                                            <b style="font-size: 14px">{{$employee->user->profile->city}} City</b><br/>
                                            Contact No. <b style="font-size: 14px">{{$employee->user->profile->contact_number}}</b>
                                        </div>
                                        <div class="col-md-4">
                                            <b style="font-size: 14px">Actions:</b><br/>
{{--                                            <b style="font-size: 14px">{{date('F j, Y \a\t g:i a', strtotime($employee->pivot->created_at))}}</b><br/>--}}
                                            {{--                    <b style="font-size: 12px">{{date('g:i a', strtotime($applicant->pivot->created_at))}}</b>--}}
                                            <br/>
                                            <a href="/employees/{{$employee->user_id}}/profile" class="employeeTooltip" title="View Profile">
                                                <span class="ti-user" style="font-size: 40px"></span>
                                            </a>
                                            <a target="_blank" href="/employees/{{$employee->user_id}}/resume/{{$employee->mainTemplate($employee->user_id)}}" class="employeeTooltip" title="View Résumé">
                                                <span class="ti-envelope" style="font-size: 40px"></span>
                                            </a>
                                            <a href="/employees/{{$employee->user_id}}/document-spaces" class="employeeTooltip" title="View Documents">
                                                <span class="ti-briefcase" style="font-size: 40px"></span>
                                            </a>
                                            <a href="/employees/{{$employee->user_id}}/lectures" class="employeeTooltip" title="View Lectures">
                                                    <span class="ti-blackboard" style="font-size: 40px"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-1 col-md-11">
                                        <hr/>
                                        <table class="table" style="margin-top: 0; width: 100%">
                                            <colgroup>
                                                <col span="1" style="width: 65%;">
                                                <col span="1" style="width: 35%;">
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th>Subject Name</th>
                                                <th style="width:190px;">Schedule</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($employee->subjects as $subject)
                                                <tr>
                                                    <td>
                                                        <a href="/subjects/{{$subject->id}}">
                                                            <strong style="font-size: 16px">{{$subject->name}}</strong>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <table>
                                                            @foreach($subject->schedules as $schedule)
                                                                <tr>
                                                                    <td><b>{{$schedule->day}}</b></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>{{date("h:i A",strtotime($schedule->start))}}</td>
                                                                    <td>-</td>
                                                                    <td>{{date("h:i A",strtotime($schedule->end))}}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                            {{ $employees->links() }}
                        @else
                            <h3 style="text-align: center; margin-top: 20px; margin-bottom: 20px">&nbsp;No employees hired yet</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="{{asset('js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('self/js/tooltips.js')}}"></script>
@endsection