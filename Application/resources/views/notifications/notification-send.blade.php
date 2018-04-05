@extends('hr.dashboard-menu')
@section('title')- Send a Notification @endsection
@section('current') Send a Notification @endsection
@section('current-header') Send a Notification @endsection
@section('manage-notifications-active') active @endsection

@section('dashboard-content')
    @include('inc.messages')
    <div class="">
        <h3>Send a Notification</h3>
    </div>
    <hr/>
    {!! Form::open(['action'=>'NotificationsController@store','method'=>'post']) !!}
    <div class="form-group">
        {{Form::label('notification','Notification',['class'=>'control-label'])}} <span class="required" style="color:red;">*</span>
        {{Form::textarea('notification','',['class'=>'form-control','required','maxlength'=>'150','rows'=>'2'])}}
    </div>
    {{Form::submit('Send Notification',['class'=>'btn btn-success'])}}
    {!! Form::close() !!}
@endsection