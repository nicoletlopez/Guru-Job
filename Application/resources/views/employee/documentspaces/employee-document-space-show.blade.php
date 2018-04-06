@extends('hr.dashboard-menu')
@section('title')- Employee Document Space @endsection
@section('current') Employee Document Space @endsection
@section('current-header') Employee Document Space @endsection
@section('manage-employees-active') active @endsection

@section('dashboard-content')
    <a onclick="goBack()" href="#" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <hr/>
    @include('inc.messages')
    <section class="section job-detail well">
        <div class="row">
            <div class="col-md-12 col-sm-8">
                <div class="content-area">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{$faculty->user->profile->picture}}" class="img-rounded" width="100%">
                        </div>
                        <div class="col-md-10">
                            <h2 class="medium-title" style="margin-bottom: 5px">{{$documentSpace->title}}</h2>
                            <strong style="font-size: 16px">Owner: {{$faculty->user->name}}</strong>
                        </div>
                    </div>
                    <p style="margin-top: 25px">{{$documentSpace->desc}}</p>
                    <br/>
                    <div class="box col-md-12">
                        <div class="row">
                            <!--repeat-->
                            @if(count($documents)>0)
                                @foreach($documents as $key=>$document)
                                    <div class="col-md-3" style="height:200px;">
                                        <div class="thumbnail">
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
                                                <p style="word-wrap:break-word;" title="{{$document->name}}">
                                                    {{str_limit(preg_replace("/(_)(\d+)(?!.*(_)(\d+))/",'',$document->name),28,'....'.$fileExts[$key][1])}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h5>&nbsp;No Documents</h5>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection