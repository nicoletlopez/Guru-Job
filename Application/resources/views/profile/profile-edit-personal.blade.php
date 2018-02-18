<div class="modal fade edit-personal-details" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Edit Personal Details</h4>
            </div>
            {!! Form::open(['action'=>'ProfileController@updatePersonal','class'=>'form-ad','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('name','Name',['class'=>'control-label'])}}
                    {{Form::text('name',$user->name,['class'=>'form-control'])}}
                </div>
                <div class="form-group">

                    @if(Auth::user()->type == 'HR')
                        {{Form::label('dob','Established on',['class'=>'control-label'])}}
                        {{Form::date('dob',$profile->dob,['class'=>'form-control'])}}
                    @else
                        {{Form::hidden('dob',$profile->dob)}}
                    @endif
                </div>
                <div class="form-group">
                    {{Form::label('address','Address',['class'=>'control-label'])}}
                    {{Form::text('address',$profile->street_address,['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('city','City',['class'=>'control-label'])}}
                    {{Form::text('city',$profile->city,['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('contact','Contact Number',['class'=>'control-label'])}}
                    {{Form::text('contact',$profile->contact_number,['class'=>'form-control','data-inputmask'=>"'mask': '(99) 999-9999'"])}}
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