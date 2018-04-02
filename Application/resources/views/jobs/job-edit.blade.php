@extends('hr.dashboard-menu')
@section('title')- Update Job @endsection
@section('current') Update Job @endsection
@section('current-header') Update Job @endsection
@section('manage-jobs-active') active @endsection

@section('dashboard-content')
    <div class="modal-dialog modal-lg">
        <a href="{{url()->previous()}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
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
                    {{Form::text('title',$job->title,['class'=>'form-control'])}}
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
                        <div class="radio">
                            <label style="color:black;">{{Form::radio('subject',$subject->id,$jobSubject->id == $subject->id,['type'=>"radio"])}}{{$subject->name}}</label>
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
                    {{Form::textarea('description',$job->desc,['id'=>'editor0','class'=>'form-control','placeholder'=>'Job Description'])}}
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