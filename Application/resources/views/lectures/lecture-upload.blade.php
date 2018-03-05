<h4>Files</h4>
<hr/>
<div class="row">
    @foreach($lecture->files as $file)
        <div class="col-md-6">
        <div class="card">
            <div class="card-block">
                <p class="card-text">{{$file->name}}</p>
                {!! Form::open(['action'=>['FilesController@deleteLectureFile',$file->id],'method'=>'POST']) !!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-sm btn-danger pull-right'])}}
                {!! Form::close() !!}
                <a class="btn btn-sm btn-primary pull-right"
                   href="/lectures/{{$lecture->id}}/download/{{$file->name}}">Download</a>
            </div>
        </div>
            <hr/>
        </div>
    @endforeach
</div>
<hr/>



{!! Form::open(['action'=>['FilesController@lectureUpload',$lecture->id],'class'=>'dropzone','method'=>'POST','enctype'=>'multipart/form-data']) !!}
<div class="fallback">
    {{Form::file('file',['multiple'])}}
</div>
{!! Form::close() !!}
<br/>
<a href="" class="btn btn-success">Upload</a>