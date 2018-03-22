@extends('faculty.dashboard-menu')
@section('title')- Create Resume @endsection
@section('current') Create Resume @endsection
@section('current-header') Create Resume @endsection
@section('manage-resumes-active') active @endsection

@section('dashboard-content')
    <link rel="stylesheet" href="{{asset('self/css/create-resume.css')}}" type="text/css">
    <a href="{{route('resumes.index')}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    @include('inc.messages')
    <hr/>
    <div class="">
        <h3>Create Resume</h3>
    </div>
    <hr/>
    {!! Form::open(['action'=>'ResumesController@store','method'=>'post']) !!}
    <div class="form-group">
        {{Form::label('template','Pick a Resume Template',['class'=>'control-label'])}}<span class="required">*</span>
        <div class="row">
        <div class="option col-md-3">
            {{Form::radio('templates[]','1',false,['class'=>"input-hidden",'id'=>'first'])}}
            <label for="first">
                <img width="190" height="250" src="{{asset('img/resume/resume1.png')}}" />
            </label>
        </div>
        <div class="option col-md-3">
            {{Form::radio('templates[]','2',false,['class'=>"input-hidden",'id'=>'second'])}}
            <label for="second">
                <img width="190" height="250" src="{{asset('img/resume/resume2.png')}}"/>
            </label>
        </div>
        </div>
    </div>

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
    {{Form::submit('Create Resume',['class'=>'btn btn-success'])}}
    {!! Form::close() !!}

@endsection
