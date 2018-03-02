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
                        <div class="box">
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
                            {!! Form::open(['action'=>['FilesController@lectureUpload',$lecture->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                            <h4>Files</h4>
                                <ul class="list-group">
                                    @foreach($lecture->files as $file)
                                        <li class="list-group-item"><a href="/lectures/{{$lecture->id}}/download/{{$file->name}}">{{$file->name}}</a><a class="btn btn-sm btn-primary pull-right" href="/lectures/{{$lecture->id}}/download/{{$file->name}}">Download</a> </li>
                                    @endforeach
                                </ul>
                            {{Form::file('file')}}
                            {{Form::submit('Upload')}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection