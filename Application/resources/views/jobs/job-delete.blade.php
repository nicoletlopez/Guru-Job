<div class="modal fade delete-job{{$key}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Delete Job "{{$job->title}}"?</h4>
            </div>
            {!! Form::open(['action'=>['JobsController@destroy',$job->id],'method'=>'POST']) !!}
            <div class="modal-body">
                <p>This can't be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                </button>
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>