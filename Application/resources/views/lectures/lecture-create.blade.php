@extends('hr.dashboard-menu')
@section('title')- Add Lecture @endsection
@section('current') Add Lecture @endsection
@section('current-header') Add Lecture @endsection
@section('manage-subjects-active') active @endsection

@section('dashboard-content')
    <a onclick="goBack()" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    @include('inc.messages')
    <hr/>
    <div class="">
        <h3>Add Lecture</h3>
    </div>
    <hr/>
    {!! Form::open(['action'=>'LecturesController@store','method'=>'post']) !!}
    <div class="form-group">
        {{Form::label('title','Lecture Title',['class'=>'control-label'])}}<span class="required">*</span>
        {{Form::text('title','',['class'=>'form-control','required'])}}
    </div>
    <div class="form-group">
        {{Form::label('overview','Lecture Overview',['class'=>'control-label'])}}<span class="required">*</span>
        {{Form::textarea('overview','',['id'=>'editor0','class'=>'form-control','required'])}}
    </div>
    <div class="form-group">
        {{Form::label('objectives','Lecture Objectives',['class'=>'control-label'])}}<span class="required">*</span>
        {{Form::textarea('objectives','',['id'=>'editor1','class'=>'form-control','required','placeholder'=>'Subject Description'])}}
    </div>
    {{Form::submit('Add Lecture',['class'=>'btn btn-success'])}}
    {!! Form::close() !!}
@endsection