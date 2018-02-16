@extends('hr.dashboard-menu')
@section('title')- Update Job @endsection
@section('current') Update Job @endsection
@section('current-header') Update Job @endsection
@section('manage-jobs-active') active @endsection

@section('dashboard-content')
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <!--
                <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">×</span>
                </button>
                -->
                <h3 class="modal-title" id="myModalLabel">Update "{{$job->title}}" Job</h3>
            </div>
            {!! Form::open(['action'=>['JobsController@update',$job->id],'class'=>'form-ad','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            <div class="modal-body">

                <div class="form-group">
                    {{Form::label('title','Job Title',['class'=>'control-label'])}}
                    {{Form::text('title','',['class'=>'form-control'])}}
                </div>
                <!--
                <div class="form-group">
                    <label class="control-label">Location <span>(optional)</span></label>
                    <input type="text" class="form-control" placeholder="e.g. Manila">
                </div>
                -->
                <div class="form-group">
                    {{Form::label('type','Job Type',['class'=>'control-label'])}}
                    <div class="radio">
                        <label style="color:black;">{{Form::radio('type','FT',true,['type'=>"radio"])}}Full-Time</label>
                    </div>
                    <div class="radio">
                        <label style="color:black;">{{Form::radio('type','PT',false,['type'=>"radio"])}}Part-Time</label>
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
                <div class="form-group">
                    {{Form::label('salary','Salary (PHP)',['class'=>'control-label'])}}
                    {{Form::number('salary',$job->salary,['min'=>'1','class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description','Description',['class'=>'control-label'])}}
                    {{Form::textarea('description',$job->desc,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Job Description'])}}
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