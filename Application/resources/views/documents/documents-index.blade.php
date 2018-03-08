@extends('faculty.dashboard-menu')
@section('title')- My Document Files @endsection
@section('current') My Document Files @endsection
@section('current-header') My Document Files @endsection
@section('manage-documents-active') active @endsection

@section('dashboard-content')
    <a href="#" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <hr/>
    @include('inc.messages')
    <section class="section job-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="content-area">
                        <h2 class="medium-title">DocumentSpaceName Files</h2>
                        <div class="box col-md-11">
                            <div class="row">
                                <div class="col-md-3" style="height:200px;">
                                    <div class="thumbnail">
                                        <div class="pull-right">
                                            <a href="#">
                                                <img width="10" src="{{asset('img/delete.png')}}"
                                                     alt="Click me to remove the file."/>
                                            </a>
                                        </div>
                                        <img width="70" src="{{asset('img/icon/file/text.png')}}">
                                        <div class="caption">
                                            <p>
                                                <a class="btn btn-sm btn-primary btn-block"
                                                   href="#">Download</a>
                                            </p>
                                            <p style="word-wrap:break-word;">{{str_limit(preg_replace("/(_)(\d+)(?!.*(_)(\d+))/",'',"fileNamessssssssssssssssssssssss_234234234.jpg"),28,'...')}}</p>
                                        </div>
                                    </div>
                                </div>
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