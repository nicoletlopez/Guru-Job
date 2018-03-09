@extends('faculty.dashboard-menu')
@section('title')- Lecture Details @endsection
@section('current') Lecture Details @endsection
@section('current-header') Lecture Details @endsection
@section('manage-lectures-active') active @endsection

@section('dashboard-content')
    <a href="{{route('lectures.index')}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <hr/>
    @include('inc.messages')
    <section class="section job-detail">

        <div class="container">

            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="content-area">
                        <h2 class="medium-title">Lecture Details</h2>
                        <a href="/lectures/{{$lecture->id}}/edit" class="btn btn-primary btn-sm">Edit
                            Lecture</a>
                        <div class="box col-md-11">
                            <div class="text-left">
                                <h3>{{$lecture->title}}</h3>
                            </div>
                            <div class="clearfix">
                                <h4>Lecture Overview</h4>
                                {!! $lecture->overview !!}
                            </div>
                            <div class="clearfix">
                                <h4>Lecture Objectives</h4>
                                {!! $lecture->objectives !!}
                            </div>
                            <div class="clearfix">
                            </div>
                            <h4>Files</h4>
                            <hr/>
                                @if(count($lecture->files)>0)
                                    <div class="row">
                                        @foreach($files as $file)
                                            <div class="col-md-3" style="height:200px;">
                                                <div class="thumbnail">
                                                    <div class="pull-right">
                                                        {!! Form::open(['action'=>['FilesController@deleteLectureFile',$lecture->id,$file->id],'method'=>'POST']) !!}
                                                        {{Form::hidden('_method','DELETE')}}
                                                        {{Form::submit('&times;',['style'=>'border:none;background-color:transparent','class'=>'pull-right','data-toggle'=>'confirmation'])}}
                                                        {!! Form::close() !!}
                                                    </div>
                                                    <img width="70" src="{{asset('img/icon/file/text.png')}}">
                                                    <div class="caption">
                                                        <p>
                                                            <a class="btn btn-sm btn-primary btn-block"
                                                               href="/lectures/{{$lecture->id}}/download/{{$file->name}}">Download</a>
                                                        </p>
                                                        <p style="word-wrap:break-word;">{{str_limit(preg_replace("/(_)(\d+)(?!.*(_)(\d+))/",'',$file->name),28,'...')}}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                @else
                                    <h5>No Files Uploaded.</h5>
                                @endif
                            <hr/>
                            @include('lectures.lecture-upload')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @include('inc.prompt-delete')
@endsection