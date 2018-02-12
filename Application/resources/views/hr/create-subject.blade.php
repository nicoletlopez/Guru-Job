@extends('base')

@section('content')
    {!! Form::open() !!}
<div class="form-group">
    {{Form::label('','Subject Name',['class'=>'control-label'])}}
    {{Form::text('','',['class'=>'form-control'])}}
</div>
<div class="row">
<div class="form-group col-md-6">
    {{Form::label('','Required Specializations',['class'=>'control-label'])}}
    <select class="form-control" name="cars" multiple>
        <option value="volvo">DEM SPECIALIZATIOONS</option>
        <option value="saab">Saab</option>
        <option value="opel">Opel</option>
        <option value="audi">Audi</option>
    </select>
</div>
</div>
<div class="form-group">
    {{Form::label('day','Work Days',['class'=>'control-label'])}}
    <div class="checkbox">
        <label style="color:black;">{{Form::checkbox('day[]','Mon',false,['type'=>"checkbox"])}}Monday</label>
    </div>
    <div class="checkbox">
        <label style="color:black;">{{Form::checkbox('day[]','Tue',false,['type'=>"checkbox"])}}Tuesday</label>
    </div>
    <div class="checkbox">
        <label style="color:black;">{{Form::checkbox('day[]','Wed',false,['type'=>"checkbox"])}}Wednesday</label>
    </div>
    <div class="checkbox">
        <label style="color:black;">{{Form::checkbox('day[]','Thu',false,['type'=>"checkbox"])}}Thursday</label>
    </div>
    <div class="checkbox">
        <label style="color:black;">{{Form::checkbox('day[]','Fri',false,['type'=>"checkbox"])}}Friday</label>
    </div>
    <div class="checkbox">
        <label style="color:black;">{{Form::checkbox('day[]','Sat',false,['type'=>"checkbox"])}}Saturday</label>
    </div>
    <div class="checkbox">
        <label style="color:black;">{{Form::checkbox('day[]','Sun',false,['type'=>"checkbox"])}}Sunday</label>
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