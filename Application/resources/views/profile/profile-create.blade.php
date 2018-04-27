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
                {{Form::date('dob',date("Y").'-12-31',['class'=>'form-control','min'=>'1900-12-31','max'=>date("Y").'-12-31','required'])}}
                </div>
                <div class="row">
                <div class="form-group col-md-6">
                    {{Form::label('address','Address',['class'=>'control-label'])}}
                    {{Form::text('address','',['class'=>'form-control','required'])}}
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('city','City',['class'=>'control-label'])}}
                    {{Form::text('city','',['class'=>'form-control','required'])}}
                </div>
                </div>
                <div class="form-group">
                    {{Form::label('contact','Mobile Number',['class'=>'control-label'])}}
                    <div class="form-inline">
                    {{Form::label('','+63',['class'=>'control-label'])}}
                    {{Form::text('contact','',['id'=>'contact','class'=>'form-control','data-inputmask'=>'"mask":"9999999999"','required'])}}
                    </div>
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
    <script type="text/javascript" src="{{asset('js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/jquery.inputmask/dist/inputmask/phone-codes/phone.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/jquery.inputmask/dist/inputmask/phone-codes/phone-be.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/jquery.inputmask/dist/inputmask/phone-codes/phone-ru.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/jquery.inputmask/dist/min/inputmask/bindings/inputmask.binding.min.js')}}"></script>
<script>
   ////$(document).ready(function(){
   //    $("#contact").inputmask("9999999999");
   //});
</script>
@endsection