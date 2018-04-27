@extends('hr.dashboard-menu')
@section('title')- Send a Notification @endsection
@section('current') Send a Notification @endsection
@section('current-header') Send a Notification @endsection
@section('manage-notifications-active') active @endsection

@section('dashboard-content')
    @include('inc.messages')
    <div class="">
        <h3>Send a Notification to Employees</h3>
    </div>
    <hr/>
    {!! Form::open(['action'=>'NotificationsController@store','method'=>'post']) !!}
    <div class="form-group">
        {{Form::label('notification','Message',['class'=>'control-label'])}} <span class="required" style="color:red;">*</span>
        <p>This will be sent as SMS, e-mail, and alert to the employees</p>
        {{Form::textarea('notification','',['class'=>'form-control','required','maxlength'=>'120','rows'=>'2','id'=>''])}}
        <div id="charNum">120 characters left</div>
        <script>
            var textarea = document.querySelector("textarea");

            textarea.addEventListener("input", function(){
                var maxlength = this.getAttribute("maxlength");
                var currentLength = this.value.length;
                if( currentLength >= maxlength ){
                    $('#charNum').text('You have reached the maximum number of characters');
                }else{
                    $('#charNum').text(maxlength - currentLength + " characters left");
                }
            });
        </script>
    </div>
    {{Form::submit('Send Notification',['class'=>'btn btn-success'])}}
    {!! Form::close() !!}
@endsection