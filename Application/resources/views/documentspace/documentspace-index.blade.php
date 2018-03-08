<div class="job-alerts-item candidates">
    <h3 class="alerts-title">My Documents</h3>
    <hr/>
    {!! Form::open(['method'=>'post']) !!}
    {{Form::text('folderName','',['class'=>'','required','placeholder'=>'Folder Name'])}}
    {{Form::submit('Create',['class'=>''])}}
    {!! Form::close() !!}
    <br/>
    <div class="row">
        <div class="col-md-12">
            <!-- this div can be repeated-->
            <div style="" class="col-md-3 col-sm-3 col-xs-12 f-category">
                <a href="#">
                    <div class="icon">
                        <i class="ti-folder"></i>
                    </div>
                    <div style="word-wrap:break-word;" class="">
                        <h3>{!! str_limit("documentSpaceTitlesssssssssssss",28,'...') !!}</h3>
                    </div>
                    <span class="badge">33 Files</span>
                </a>
            </div>
            <!--END-->
        </div>
    </div>
</div>
@include('inc.prompt-delete')