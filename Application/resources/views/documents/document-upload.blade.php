{!! Form::open(['action'=>['DocumentsController@store',$documentSpace->id],'class'=>'dropzone','method'=>'POST','enctype'=>'multipart/form-data']) !!}
<div class="fallback">
    {{Form::file('document',['multiple'])}}
</div>
{!! Form::close() !!}
<br/>
<input type="button" class="btn btn-success" value="Upload" onClick="window.location.reload()">