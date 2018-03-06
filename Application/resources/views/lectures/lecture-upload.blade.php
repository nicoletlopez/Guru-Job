{!! Form::open(['action'=>['FilesController@lectureUpload',$lecture->id],'class'=>'dropzone','method'=>'POST','enctype'=>'multipart/form-data']) !!}
<div class="fallback">
    {{Form::file('file',['multiple'])}}
</div>
{!! Form::close() !!}
<br/>
<a href="" class="btn btn-success">Upload</a>