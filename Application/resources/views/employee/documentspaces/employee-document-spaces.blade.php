@extends('hr.dashboard-menu')
@section('title')- Employee Document Spaces @endsection
@section('current') Employee Document Spaces @endsection
@section('current-header') Employee Document Spaces @endsection
@section('manage-employees-active') active @endsection

@section('dashboard-content')
    <div class="job-alerts-item candidates">
        <h3 class="alerts-title">Employee Document Spaces</h3>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                @if(count($documentSpaces)>0)
                    @foreach($documentSpaces as $documentSpace)
                        <a href="/employees/{{$faculty_id}}/document-spaces/{{$documentSpace->id}}">
                            <div style="" class="col-md-3 col-sm-3 col-xs-12 f-category">
                                {!! Form::close() !!}
                                <div class="icon">
                                    <i class="ti-folder"></i>
                                </div>
                                <div style="word-wrap:break-word;" class="">
                                    <h3>{!! str_limit($documentSpace->title,28,'...') !!}</h3>
                                </div>
                                <span class="badge">{{count($documentSpace->documents)}} Files</span>
                            </div>
                        </a>
                    @endforeach
                @else
                    <h3 style="text-align: center; margin-top: 20px; margin-bottom: 20px">&nbsp;No folder assigned to you yet</h3>
            @endif
            </div>
        </div>
     </div>
@endsection