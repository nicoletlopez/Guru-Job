@extends('hr.dashboard-menu')
@section('title') - Assigned Lectures @endsection
@section('current') Assigned Lectures @endsection
@section('current-header') Assigned Lectures @endsection
@section('manage-employees-active') active @endsection

@section('dashboard-content')
    <div class="job-alerts-item candidates">
        <h3 class="alerts-title">
            Assigned Lectures
        </h3>
        @if(count($lectures)>0)
            <table class="table" style="width: 100%">
                <colgroup>
                    <col span="1" style="width: 50%;">
                    <col span="1" style="width: 15%;">
                    <col span="1" style="width: 35%;">
                </colgroup>
                <thead class="">
                <tr>
                    <th>Lecture Title</th>
                    <th>Number of Files</th>
                    <!--<th>Assigned to</th>-->
                    <th style="text-align: center">Creator</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lectures as $lecture)
                    <tr>
                        <td style="vertical-align: middle">
                            <a href="/employees/{{$lecture->faculty_id}}/lectures/{{$lecture->id}}/details">
                                <h3>{{$lecture->title}}</h3>
                            </a>
                        </td>
                        <td style="text-align: center; vertical-align: middle">
                            <p class="badge">{{$lecture->files->count()}}</p>
                        </td>
                        <!--<td><p>APC</p></td>-->
                        <td style="vertical-align: middle;">
                                <img width="50" height="50" class="img-circle" src="{{$lecture->faculty->user->profile->picture}}"
                                     style="margin-left:30px; margin-right: 10px"/>
                                <strong>{{$lecture->faculty->user->name}}</strong>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <br/>
            <h2 style="text-align: center">No Lecture is Assigned to you yet</h2>
            <br/>
            <br/>
        @endif
    </div>
    <script type="text/javascript" src="{{asset('js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('self/js/tooltips.js')}}"></script>
@endsection