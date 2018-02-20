@extends('hr.dashboard-menu')
@section('title')- Add Subject @endsection
@section('current') Add Subject @endsection
@section('current-header') Add Subject @endsection
@section('manage-subjects-active') active @endsection

@section('dashboard-content')
    {!! Form::open(['action'=>'SubjectsController@store',
                    'method'=>'post']) !!}
    <div class="form-group">
        {{Form::label('','Subject Name',['class'=>'control-label'])}}
        {{Form::text('name','',['class'=>'form-control'])}}
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            {{Form::label('','Required Specializations',['class'=>'control-label'])}}
            <select multiple class="form-control" name="skills[]" >
                <!--<option value="volvo">DEM SPECIALIZATIOONS</option>
                <option value="saab">Saab</option>
                <option value="opel">Opel</option>
                <option value="audi">Audi</option>-->
                @foreach($skills as $skill)
                    <option value="{{$skill}}">{{$skill->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            {{Form::label('description','Description',['class'=>'control-label'])}}
            {{Form::textarea('description','',['class'=>'form-control','placeholder'=>'Subject Description'])}}
        </div>
    </div>
    <div class="form-group">
        {{Form::label('days','Work Days',['class'=>'control-label'])}}
        <div class="checkbox">
            <label style="color:black;">{{Form::checkbox('days[]',1,false,['type'=>"checkbox"])}}Monday</label>
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
            {{Form::label('time-from','Job Time From:',['class'=>'control-label'])}}
            {{Form::time('time-from','',['class'=>'form-control'])}}
        </div>
        <div class="form-group col-md-6">
            {{Form::label('time-to','Job Time To:',['class'=>'control-label'])}}
            {{Form::time('time-to','',['class'=>'form-control'])}}
        </div>
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection