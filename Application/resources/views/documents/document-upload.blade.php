<p>Max upload file size: 100MB</p>
{!! Form::open(['action'=>['DocumentsController@store',$documentSpace->id],'class'=>'dropzone','method'=>'POST','enctype'=>'multipart/form-data']) !!}

{!! Form::close() !!}
<br/>
<input type="button" class="btn btn-success" value="Upload" onClick="window.location.reload()">