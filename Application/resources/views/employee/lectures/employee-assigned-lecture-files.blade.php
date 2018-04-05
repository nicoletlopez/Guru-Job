@extends('hr.dashboard-menu')
@section('title')- Employee Assigned Lecture Files @endsection
@section('current') Employee Assigned Lecture Files @endsection
@section('current-header') Employee Assigned Lecture Files @endsection
@section('manage-employees-active') active @endsection
@section('tab-file-active') active @endsection

@section('dashboard-content')
    <a href="#" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <hr/>
    @include('inc.messages')
    <section class="section job-detail well">
        <div class="row">
            <div class="col-md-12">
                <div class="content-area">
                    @include('employee.lectures.employee-assigned-lecture-tabs')
                    <div class="box col-md-12">
                        <br/>
                        <h3>Files</h3>
                        <hr/>
                        @if(count($files)>0)
                            <div class="row">
                                @foreach($files as $key=>$file)
                                    <div class="col-md-3" style="height:200px;">
                                        <div class="thumbnail">
                                            <div class="pull-right">
                                                {!! Form::open(['action'=>['FilesController@deleteLectureFile',$lecture->id,$file->id],'method'=>'POST']) !!}
                                                @include('inc.button-delete')
                                                {!! Form::close() !!}
                                            </div>
                                            @if(in_array($fileExts[$key][1],$image))
                                                <div style="height:90px;"><span
                                                            style="display:inline-block;height:26%;vertical-align:middle;"></span><img
                                                            width="70" style="margin:auto;display:block;"
                                                            src="{{asset('img/icon/file/image.png')}}"></div>
                                            @elseif(in_array($fileExts[$key][1],$video))
                                                <div style="height:90px;"><span
                                                            style="display:inline-block;height:26%;vertical-align:middle;"></span><img
                                                            width="70" style="margin:auto;display:block;"
                                                            src="{{asset('img/icon/file/video.png')}}">
                                                </div>
                                            @elseif(in_array($fileExts[$key][1],$audio))
                                                <div style="height:90px;"><span
                                                            style="display:inline-block;height:26%;vertical-align:middle;"></span><img
                                                            width="70" style="margin:auto;display:block;"
                                                            src="{{asset('img/icon/file/audio.png')}}">
                                                </div>
                                            @elseif(in_array($fileExts[$key][1],$word))
                                                <div style="height:90px;"><span
                                                            style="display:inline-block;height:26%;vertical-align:middle;"></span><img
                                                            width="85" style="margin:auto;display:block;"
                                                            src="{{asset('img/icon/file/word.png')}}">
                                                </div>
                                            @elseif(in_array($fileExts[$key][1],$excel))
                                                <div style="height:90px;"><span
                                                            style="display:inline-block;height:26%;vertical-align:middle;"></span><img
                                                            width="70" style="margin:auto;display:block;"
                                                            src="{{asset('img/icon/file/excel.png')}}">
                                                </div>
                                            @elseif(in_array($fileExts[$key][1],$ppt))
                                                <div style="height:90px;"><span
                                                            style="display:inline-block;height:26%;vertical-align:middle;"></span><img
                                                            width="70" style="margin:auto;display:block;"
                                                            src="{{asset('img/icon/file/ppt.png')}}">
                                                </div>
                                            @elseif(in_array($fileExts[$key][1],$pdf))
                                                <div style="height:90px;"><span
                                                            style="display:inline-block;height:26%;vertical-align:middle;"></span><img
                                                            width="58" style="margin:auto;display:block;"
                                                            src="{{asset('img/icon/file/pdf.png')}}">
                                                </div>
                                            @else
                                                <div style="height:90px;"><span
                                                            style="display:inline-block;height:26%;vertical-align:middle;"></span><img
                                                            width="70" style="margin:auto;display:block;"
                                                            src="{{asset('img/icon/file/text.png')}}">
                                                </div>
                                            @endif
                                            <div class="caption">
                                                <p>
                                                    <a class="btn btn-sm btn-primary btn-block"
                                                       href="/lectures/{{$lecture->id}}/files/download/{{$file->name}}">Download</a>
                                                </p>
                                                <p style="word-wrap:break-word;">{{str_limit(preg_replace("/(_)(\d+)(?!.*(_)(\d+))/",'',$file->name),28,'....'.$fileExts[$key][1])}}</p>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        @else
                            <h5>No Files Uploaded.</h5>
                        @endif
                        <hr/>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection