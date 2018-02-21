<div class="modal fade edit-description" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Edit About Me</h4>
            </div>
            {!! Form::open(['action'=>'ProfileController@updateDescription','class'=>'form-ad','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('description','About Me',['class'=>'control-label'])}}
                    {{Form::textarea('description',$profile->description,['id'=>'editor0','class'=>'form-control'])}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                </button>
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Save Changes',['class'=>'btn btn-common'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>