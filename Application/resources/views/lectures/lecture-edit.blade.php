@extends('hr.dashboard-menu')
@section('title')- Edit Lecture @endsection
@section('current') Edit Lecture @endsection
@section('current-header') Edit Lecture @endsection
@section('manage-subjects-active') active @endsection

@section('dashboard-content')
    <a onclick="goBack()" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    @include('inc.messages')
    <hr/>
    <div class="">
        <h3>Edit "{{$lecture->title}}" Lecture</h3>
    </div>
    <hr/>
    {!! Form::open(['action'=>['LecturesController@update',$lecture->id],'method'=>'post']) !!}
    <div class="form-group">
        {{Form::label('title','Lecture Title',['class'=>'control-label'])}}<span class="required">*</span>
        {!! Form::text('title',$lecture->title,['class'=>'form-control','required']) !!}
    </div>
    <div class="form-group">
        {{Form::label('overview','Lecture Overview',['class'=>'control-label'])}}<span class="required">*</span>
        {!! Form::textarea('overview',$lecture->overview,['id'=>'editor0','class'=>'form-control','required'])!!}
    </div>
    <div class="form-group">
        {{Form::label('objectives','Lecture Objectives',['class'=>'control-label'])}}<span class="required">*</span>
        {!! Form::textarea('objectives',$lecture->objectives,['id'=>'editor1','class'=>'form-control','required','placeholder'=>'Subject Description'])!!}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Update Lecture',['class'=>'btn btn-success'])}}
    {!! Form::close() !!}
@endsection