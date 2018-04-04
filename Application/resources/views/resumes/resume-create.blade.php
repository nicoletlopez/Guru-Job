@extends('faculty.dashboard-menu')
@section('title')- Create Resume @endsection
@section('current') Create Resume @endsection
@section('current-header') Create Resume @endsection
@section('manage-resumes-active') active @endsection

@section('dashboard-content')
    <link rel="stylesheet" href="{{asset('self/css/create-resume.css')}}" type="text/css">
    @include('inc.messages')
    <a href="{{route('resumes.index')}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <hr/>
    <div class="">
        <h3>Create Resume</h3>
    </div>
    <hr/>
    {!! Form::open(['action'=>'ResumesController@store','method'=>'post']) !!}
    <div class="form-group">
        {{Form::label('template','Pick a Resume Template',['class'=>'control-label'])}}<span class="required">*</span>
        <div class="row">
            @for($i=1;$i<2+1;$i++)
                <div class="option col-md-3">
                    {{Form::radio('templates[]',$i,false,['class'=>"input-hidden",'id'=>"temp".$i])}}
                    <label for="temp{{$i}}">
                        <img width="190" height="250" src="{{asset('img/resume/resume'.$i.'.png')}}"/>
                    </label>
                </div>
            @endfor
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
