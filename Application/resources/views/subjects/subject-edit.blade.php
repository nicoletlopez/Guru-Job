@extends('hr.dashboard-menu')
@section('title')- Edit Subject @endsection
@section('current') Edit Subject @endsection
@section('current-header') Edit Subject @endsection
@section('manage-subjects-active') active @endsection

@section('dashboard-content')
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <!--
                <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">×</span>
                </button>
                -->
                <h3 class="modal-title" id="myModalLabel">Edit "{{$subject->name}}" Subject</h3>
            </div>
            {!! Form::open(['action'=>['SubjectsController@update',$subject->id],'class'=>'form-ad','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            <div class="modal-body">

                <div class="form-group">
                    {{Form::label('name','Subject Name',['class'=>'control-label'])}}
                    {{Form::text('name',$subject->name,['class'=>'form-control'])}}
                </div>
                <!--
                <div class="form-group">
                    <label class="control-label">Location <span>(optional)</span></label>
                    <input type="text" class="form-control" placeholder="e.g. Manila">
                </div>
                -->
                <div class="row">
                    <div class="form-group col-md-6">
                        {{Form::label('','Required Specializations (Hold CTRL key to select several)',['class'=>'control-label'])}}
                        <select multiple class="form-control" name="skills[]" >
                            @foreach($skills as $skill)
                                <option value="{{$skill}}">{{$skill->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('description','Description',['class'=>'control-label'])}}
                    {{Form::textarea('description',$subject->desc,['id'=>'editor0','class'=>'form-control','placeholder'=>'Subject Description'])}}
                </div>
                <div class="form-group">
                    {{Form::label('days','Class Days',['class'=>'control-label'])}}
                    <div class="checkbox">
                        <label style="color:black;">{{Form::checkbox('days[]',1,in_array('MON',$daysData),['type'=>"checkbox"])}}Monday</label>
                    </div>
                    <div class="checkbox">
                        <label style="color:black;">{{Form::checkbox('days[]',2,false,['type'=>"checkbox"])}}Tuesday</label>
                    </div>
                    <div class="checkbox">
                        <label style="color:black;">{{Form::checkbox('days[]',4,false,['type'=>"checkbox"])}}Wednesday</label>
                    </div>
                    <div class="checkbox">
                        <label style="color:black;">{{Form::checkbox('days[]',8,false,['type'=>"checkbox"])}}Thursday</label>
                    </div>
                    <div class="checkbox">
                        <label style="color:black;">{{Form::checkbox('days[]',16,false,['type'=>"checkbox"])}}Friday</label>
                    </div>
                    <div class="checkbox">
                        <label style="color:black;">{{Form::checkbox('days[]',32,false,['type'=>"checkbox"])}}Saturday</label>
                    </div>
                    <div class="checkbox">
                        <label style="color:black;">{{Form::checkbox('days[]',64,false,['type'=>"checkbox"])}}Sunday</label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {{Form::label('time-from','Class Time From:',['class'=>'control-label'])}}
                        {{Form::time('time-from','',['class'=>'form-control'])}}
                    </div>
                    <div class="form-group col-md-6">
                        {{Form::label('time-to','Class Time To:',['class'=>'control-label'])}}
                        {{Form::time('time-to','',['class'=>'form-control'])}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Save Changes',['class'=>'btn btn-common'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection