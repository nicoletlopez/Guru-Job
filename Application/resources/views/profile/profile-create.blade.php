@extends('base')
@section('title')- Create Profile @endsection
@section('current') Create Profile @endsection
@section('current-header') Create Profile @endsection

@section('content')
    @include('inc.header')
    <div class="modal-dialog modal-lg">
        @include('inc.messages')
        <div class="modal-content">

            <div class="modal-header">
                <!--
                <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">×</span>
                </button>
                -->
                <h3 class="modal-title" id="myModalLabel">Create Your Profile</h3>
            </div>
            {!! Form::open(['action'=>'ProfileController@store','class'=>'form-ad','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            <div class="modal-body">
                <div class="form-group">
                {{Form::label('dob','Date of Birth',['class'=>'control-label'])}}
                {{Form::date('dob','',['class'=>'form-control'])}}
                </div>
                <div class="row">
                <div class="form-group col-md-6">
                    {{Form::label('address','Address',['class'=>'control-label'])}}
                    {{Form::text('address','',['class'=>'form-control'])}}
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('city','City',['class'=>'control-label'])}}
                    {{Form::text('city','',['class'=>'form-control'])}}
                </div>
                </div>
                <div class="form-group">
                    {{Form::label('contact','Contact Number',['class'=>'control-label'])}}
                    {{Form::text('contact','',['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description','About',['class'=>'control-label'])}}
                    {{Form::textarea('description','',['id'=>'editor0','class'=>'form-control','placeholder'=>''])}}
                </div>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                {{Form::submit('Create your Profile',['class'=>'btn btn-common'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection