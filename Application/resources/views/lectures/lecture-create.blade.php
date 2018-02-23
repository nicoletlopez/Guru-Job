@extends('hr.dashboard-menu')
@section('title')- Add Subject @endsection
@section('current') Add Subject @endsection
@section('current-header') Add Subject @endsection
@section('manage-subjects-active') active @endsection

@section('dashboard-content')

    <a href="{{route('lectures.index')}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    @include('inc.messages')
    <hr/>
    <div class="">
        <h3>Add Lecture</h3>
    </div>
    <hr/>
    {!! Form::open(['action'=>'LecturesController@store','method'=>'post']) !!}
    <div class="form-group">
        {{Form::label('title','Lecture Title',['class'=>'control-label'])}}
        {{Form::text('title','',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('overview','Lecture Overview',['class'=>'control-label'])}}
        {{Form::textarea('overview','',['id'=>'editor0','class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('objectives','Lecture Objectives',['class'=>'control-label'])}}
        {{Form::textarea('objectives','',['id'=>'editor1','class'=>'form-control','placeholder'=>'Subject Description'])}}
    </div>
    {{Form::submit('Add Lecture',['class'=>'btn btn-success'])}}
    {!! Form::close() !!}
@endsection