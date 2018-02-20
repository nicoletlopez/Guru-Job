@extends('hr.dashboard-menu')
@section('title')- Add Subject @endsection
@section('current') Add Subject @endsection
@section('current-header') Add Subject @endsection
@section('manage-subjects-active') active @endsection

@section('dashboard-content')

    <a href="{{url()->previous()}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>

    <div class="page-header">

    <h3>Add Subject</h3>
    </div>
    {!! Form::open(['action'=>'SubjectsController@store','method'=>'post']) !!}
    <div class="form-group">
        {{Form::label('','Subject Name',['class'=>'control-label'])}}
        {{Form::text('name','',['class'=>'form-control'])}}
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            {{Form::label('','Required Specializations (Hold CTRL key to select several)',['class'=>'control-label'])}}
            <select multiple class="form-control" name="skills[]">
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

    <div class="form-group">
        {{Form::label('description','Description',['class'=>'control-label'])}}
        {{Form::textarea('description','',['class'=>'form-control','placeholder'=>'Subject Description'])}}
    </div>
    <script type="text/javascript">
        function showForm()
        {
            //Mon
            if($('#Mon').is(":checked"))
                $("#MonTime").show();
            else
                $("#MonTime").hide();
            //Tue
            if($('#Tue').is(":checked"))
                $("#TueTime").show();
            else
                $("#TueTime").hide();
            //Wed
            if($('#Wed').is(":checked"))
                $("#WedTime").show();
            else
                $("#WedTime").hide();
            //Thu
            if($('#Thu').is(":checked"))
                $("#ThuTime").show();
            else
                $("#ThuTime").hide();
            //Fri
            if($('#Fri').is(":checked"))
                $("#FriTime").show();
            else
                $("#FriTime").hide();
            //Sat
            if($('#Sat').is(":checked"))
                $("#SatTime").show();
            else
                $("#SatTime").hide();
            //Sun
            if($('#Sun').is(":checked"))
                $("#SunTime").show();
            else
                $("#SunTime").hide();

        }
    </script>
    <div class="form-group">
        {{Form::label('days','Class Days',['class'=>'control-label'])}}
        <div class="checkbox">
            <label style="color:black;">{{Form::checkbox('days[]',1,false,['id'=>'Mon','type'=>"checkbox",'onchange'=>"showForm()"])}}Monday</label>
        </div>
        <div id="MonTime" style="display:none;" class="row">
            <div class="form-group col-md-6">
                {{Form::label('time-from','Class Time From:',['class'=>'control-label'])}}
                {{Form::time('time-from','',['class'=>'form-control'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('time-to','Class Time To:',['class'=>'control-label'])}}
                {{Form::time('time-to','',['class'=>'form-control'])}}
            </div>
        </div>
        <div class="checkbox">
            <label style="color:black;">{{Form::checkbox('days[]',2,false,['id'=>'Tue','type'=>"checkbox",'onchange'=>"showForm()"])}}Tuesday</label>
        </div>
        <div id="TueTime" style="display:none;" class="row">
            <div class="form-group col-md-6">
                {{Form::label('time-from','Class Time From:',['class'=>'control-label'])}}
                {{Form::time('time-from','',['class'=>'form-control'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('time-to','Class Time To:',['class'=>'control-label'])}}
                {{Form::time('time-to','',['class'=>'form-control'])}}
            </div>
        </div>
        <div class="checkbox">
            <label style="color:black;">{{Form::checkbox('days[]',4,false,['id'=>'Wed','type'=>"checkbox",'onchange'=>"showForm()"])}}Wednesday</label>
        </div>
        <div id="WedTime" style="display:none;" class="row">
            <div class="form-group col-md-6">
                {{Form::label('time-from','Class Time From:',['class'=>'control-label'])}}
                {{Form::time('time-from','',['class'=>'form-control'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('time-to','Class Time To:',['class'=>'control-label'])}}
                {{Form::time('time-to','',['class'=>'form-control'])}}
            </div>
        </div>
        <div class="checkbox">
            <label style="color:black;">{{Form::checkbox('days[]',8,false,['id'=>'Thu','type'=>"checkbox",'onchange'=>"showForm()"])}}Thursday</label>
        </div>
        <div id="ThuTime" style="display:none;" class="row">
            <div class="form-group col-md-6">
                {{Form::label('time-from','Class Time From:',['class'=>'control-label'])}}
                {{Form::time('time-from','',['class'=>'form-control'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('time-to','Class Time To:',['class'=>'control-label'])}}
                {{Form::time('time-to','',['class'=>'form-control'])}}
            </div>
        </div>
        <div class="checkbox">
            <label style="color:black;">{{Form::checkbox('days[]',16,false,['id'=>'Fri','type'=>"checkbox",'onchange'=>"showForm()"])}}Friday</label>
        </div>
        <div id="FriTime" style="display:none;" class="row">
            <div class="form-group col-md-6">
                {{Form::label('time-from','Class Time From:',['class'=>'control-label'])}}
                {{Form::time('time-from','',['class'=>'form-control'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('time-to','Class Time To:',['class'=>'control-label'])}}
                {{Form::time('time-to','',['class'=>'form-control'])}}
            </div>
        </div>
        <div class="checkbox">
            <label style="color:black;">{{Form::checkbox('days[]',32,false,['id'=>'Sat','type'=>"checkbox",'onchange'=>"showForm()"])}}Saturday</label>
        </div>
        <div id="SatTime" style="display:none;" class="row">
            <div class="form-group col-md-6">
                {{Form::label('time-from','Class Time From:',['class'=>'control-label'])}}
                {{Form::time('time-from','',['class'=>'form-control'])}}
            </div>
            <div class="form-group col-md-6">
                {{Form::label('time-to','Class Time To:',['class'=>'control-label'])}}
                {{Form::time('time-to','',['class'=>'form-control'])}}
            </div>
        </div>
        <div class="checkbox">
            <label style="color:black;">{{Form::checkbox('days[]',64,false,['id'=>'Sun','type'=>"checkbox",'onchange'=>"showForm()"])}}Sunday</label>
        </div>
        <div id="SunTime" style="display:none;" class="row">
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

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection