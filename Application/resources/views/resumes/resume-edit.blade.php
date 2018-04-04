@extends('faculty.dashboard-menu')
@section('title')- Edit Resume @endsection
@section('current') Edit Resume @endsection
@section('current-header') Edit Resume @endsection
@section('manage-resumes-active') active @endsection

@section('dashboard-content')
    <link rel="stylesheet" href="{{asset('self/css/create-resume.css')}}" type="text/css">
    <a onclick="goBack()" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    @include('inc.messages')
    <hr/>
    <div class="">
        <h3>Create Resume</h3>
    </div>
    <hr/>
    {!! Form::open(['action'=>['ResumesController@update',$resume->id],'method'=>'post']) !!}
    <div class="form-group">
        {{Form::label('template','Pick a Resume Template',['class'=>'control-label'])}}<span class="required">*</span>
        <div class="row">
            @for($i=1;$i<2+1;$i++)
                <div class="option col-md-3">
                    {{Form::radio('templates[]',$i,$template == $i,['class'=>"input-hidden",'id'=>"temp".$i])}}
                    <label for="temp{{$i}}">
                        <img width="190" height="250" src="{{asset('img/resume/resume'.$i.'.png')}}"/>
                    </label>
                </div>
            @endfor
        </div>
    </div>

    <div class="form-group">
        {{Form::label('education','Education',['class'=>'control-label'])}}<span class="required">*</span>
        {{Form::textarea('education',$education,['id'=>'editor0','class'=>'form-control','required'])}}
    </div>
    <div class="form-group">
        {{Form::label('experience','Work Experience',['class'=>'control-label'])}}<span class="required">*</span>
        {{Form::textarea('experience',$experience,['id'=>'editor1','class'=>'form-control','required'])}}
    </div>
    <div class="form-group">
        {{Form::label('skill','Skills',['class'=>'control-label'])}}<span class="required">*</span>
        {{Form::textarea('skill',$skill,['id'=>'editor2','class'=>'form-control','required','placeholder'=>'Subject Description'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Update Resume',['class'=>'btn btn-success'])}}
    {!! Form::close() !!}

@endsection
