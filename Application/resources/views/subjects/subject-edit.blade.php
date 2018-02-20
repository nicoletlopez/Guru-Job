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
                        {{Form::label('','Required Specializations',['class'=>'control-label'])}}
                        <select multiple class="form-control" name="skills[]" >
                            @foreach($skills as $skill)
                                <option value="{{$skill}}">{{$skill->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('type','Job Type',['class'=>'control-label'])}}
                    <div class="radio">
                        <label style="color:black;">{{Form::radio('type','FT',$jobType == 'FT',['type'=>"radio"])}}
                            Full-Time</label>
                    </div>
                    <div class="radio">
                        <label style="color:black;">{{Form::radio('type','PT',$jobType == 'PT',['type'=>"radio"])}}
                            Part-Time</label>
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('subject','Subject/s',['class'=>'control-label'])}}
                    @foreach($subjects as $subject)
                        <div class="checkbox">
                            <label style="color:black;">{{Form::checkbox('subjects[]',$subject->id,in_array($subject->id,$subjectData),['type'=>"checkbox"])}}{{$subject->name}}</label>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        {{Form::label('min-salary','Minimum Salary (PHP)',['class'=>'control-label'])}}
                        {{Form::number('min-salary',$job->floor_salary,['min'=>'1.00','step'=>'.01','class'=>'form-control'])}}
                    </div>
                    <div class="form-group col-md-6">
                        {{Form::label('max-salary','Maximum Salary (PHP)',['class'=>'control-label'])}}
                        {{Form::number('max-salary',$job->ceiling_salary,['min'=>'1.00','step'=>'.01','class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('description','Description',['class'=>'control-label'])}}
                    {{Form::textarea('description',$job->desc,['class'=>'form-control','placeholder'=>'Job Description'])}}
                </div>
                <!--
                <div class="form-group">
                    <label class="control-label">Closing Date <span>(optional)</span></label>
                    <input type="text" class="form-control" placeholder="yyyy-mm-dd">
                    <p class="note">Deadline for new applicants.</p>
                </div>
                -->

            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Update Job',['class'=>'btn btn-common'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection