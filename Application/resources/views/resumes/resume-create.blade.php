@extends('faculty.dashboard-menu')
@section('title')- Create Resume @endsection
@section('current') Create Resume @endsection
@section('current-header') Create Resume @endsection
@section('manage-subjects-active') active @endsection

@section('dashboard-content')
    <a href="{{route('resumes.index')}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    @include('inc.messages')
    <hr/>
    <div class="">
        <h3>Create Resume</h3>
    </div>
    <hr/>
    {!! Form::open(['method'=>'post']) !!}
    <div class="form-group">
        {{Form::label('education','Education',['class'=>'control-label'])}}<span class="required">*</span>
        {{Form::textarea('education','',['id'=>'editor0','class'=>'form-control','required'])}}
    </div>
    <div class="form-group">
        {{Form::label('experience','Work Experience',['class'=>'control-label'])}}<span class="required">*</span>
        {{Form::textarea('experience','',['id'=>'editor1','class'=>'form-control','required'])}}
    </div>
    <div class="form-group">
        {{Form::label('skill','Skills',['class'=>'control-label'])}}<span class="required">*</span>
        {{Form::textarea('skill','',['id'=>'editor2','class'=>'form-control','required','placeholder'=>'Subject Description'])}}
    </div>
    {{Form::submit('',['class'=>'btn btn-success'])}}
    {!! Form::close() !!}

@endsection
