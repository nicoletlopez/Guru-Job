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
                                    @foreach($documents as $document)
                                        <div class="col-md-3" style="height:200px;">
                                            <div class="thumbnail">
                                                <div class="pull-right">
                                                    {!! Form::open(['action'=>['DocumentsController@destroy',$document->id],'method'=>'POST']) !!}
                                                    {{Form::hidden('_method','DELETE')}}
                                                    {{Form::submit('&times;',['style'=>'border:none;background-color:transparent','class'=>'pull-right','data-toggle'=>'confirmation'])}}
                                                    {!! Form::close() !!}
                                                </div>
                                                <img width="70" src="{{asset('img/icon/file/text.png')}}">
                                                <div class="caption">
                                                    <p>
                                                        <a class="btn btn-sm btn-primary btn-block"
                                                           href="#">Download</a>
                                                    </p>
                                                    <p style="word-wrap:break-word;">{{str_limit(preg_replace("/(_)(\d+)(?!.*(_)(\d+))/",'',$document->name),28,'...')}}</p>
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