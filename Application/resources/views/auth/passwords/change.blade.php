@extends('hr.dashboard-menu')
@section('title')- Change Password @endsection
@section('current') Change Password @endsection
@section('current-header') Change Password @endsection
@section('change-pass-active') active @endsection

@section('dashboard-content')
    @include('inc.messages')
    {!! Form::open(['action'=>'UsersController@changePassword','method'=>'post']) !!}
    {{Form::label('current-password','Current Password')}}
    {{Form::password('current-password',['class' => 'form-control','placeholder'=>'Current Password'])}}
    {{Form::label('new-password','New Password')}}
    {{Form::password('new-password',['class' => 'form-control','placeholder'=>'New Password'])}}

    {{Form::label('confirm-new-password','Confirm New Password')}}
    {{Form::password('confirm-new-password',['class' => 'form-control','placeholder'=>'Confirm New Password'])}}

    {{Form::submit('Submit',['class'=>'btn btn-common'])}}
    {!! Form::close() !!}
@endsection