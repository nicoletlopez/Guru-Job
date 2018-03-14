@extends('faculty.dashboard-menu')
@section('title')- My Document Files @endsection
@section('current') My Document Files @endsection
@section('current-header') My Document Files @endsection
@section('manage-documents-active') active @endsection

@section('dashboard-content')
    <a href="{{route('document-spaces.index')}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <hr/>
    @include('inc.messages')
    <section class="section
     job-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="content-area">
                        <h2 class="medium-title">{{$documentSpace->title}}</h2>
                        <p>{{$documentSpace->desc}}</p>
                        <br/>
                        <div class="box col-md-11">
                            <div class="row">
                                <!--repeat-->
                                @if(count($documents)>0)
                                    @foreach($documents as $key=>$document)
                                        <div class="col-md-3" style="height:200px;">
                                            <div class="thumbnail">
                                                <div class="pull-right">
                                                    {!! Form::open(['action'=>['DocumentsController@destroy',$documentSpace->id,$document->id],'method'=>'POST']) !!}
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
                                                           href="/documents/{{$documentSpace->id}}/download/{{$document->name}}">Download</a>
                                                    </p>
                                                    <p style="word-wrap:break-word;">{{str_limit(preg_replace("/(_)(\d+)(?!.*(_)(\d+))/",'',$document->name),28,'....'.$fileExts[$key][1])}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h5>&nbsp;No Documents</h5>
                            @endif
                            <!--end-->
                            </div>
                            <hr/>
                            @include('documents.document-upload')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('inc.prompt-delete')
@endsection