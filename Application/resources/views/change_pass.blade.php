@extends('base')

@section('content')
    @include('inc.messages')
    {!! Form::open(['action'=>'UsersController@changePassword',
                        'method'=>'post']) !!}
    {{Form::label('current-password','Current Password')}}
    {{Form::text('current-password','',['class' => 'form-control',
                            'placeholder'=>'Current Password'])}}
    {{Form::label('new-password','New Password')}}
    {{Form::text('new-password','',['class' => 'form-control',
                                'placeholder'=>'Old Password'])}}

    {{Form::label('confirm-new-password','Confirm New Password')}}
    {{Form::text('confirm-new-password','',['class' => 'form-control',
                                'placeholder'=>'Confirm New Password'])}}

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection