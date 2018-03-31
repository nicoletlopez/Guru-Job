@extends('hr.dashboard-menu')
@section('title')- Edit Subject @endsection
@section('current') Edit Subject @endsection
@section('current-header') Edit Subject @endsection
@section('manage-subjects-active') active @endsection

@section('dashboard-content')
    @include('inc.messages')
    <a href="{{route('subjects.index')}}" class="btn btn-primary"><i class="ti-arrow-left"></i> Go Back</a>
    <div class="clearfix"><br/></div>

    <h3>Edit Subject</h3>
    <br/>
    {!! Form::open(['action'=>['SubjectsController@update',$subject->id],'method'=>'post']) !!}
    <div class="form-group">
        {{Form::label('','Subject Name',['class'=>'control-label'])}} <span class="required" style="color: red">*</span>
        {{Form::text('name',$subject->name,['class'=>'form-control','required'])}}
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <div class="search-category-container">
                {{Form::label('','Required Specializations',['class'=>'control-label'])}} <span class="required" style="color: red">*</span>
                <select multiple style="" class="selectpicker dropdown-product" data-live-search="true"
                        name="specializations[]" required>
                    @foreach($specializations as $specialization)
                        <option value="{{$specialization->id}}" {{in_array($specialization->id,$specializationData) ? 'selected':''}}>{{$specialization->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        {{Form::label('description','Description',['class'=>'control-label'])}} <span class="required" style="color: red">*</span>
        {{Form::textarea('description',$subject->desc,['id'=>'editor0','class'=>'form-control','placeholder'=>'Subject Description','required'])}}
    </div>

    {{Form::label('days','Class Schedule',['class'=>'control-label'])}} <span class="required" style="color: red">*</span>
    <div class="add-fields" data-af_base="#base-package-fields" data-af_target=".packages">
        <div class="row">
            <div class="col-md-3">
                <p>Day</p>
            </div>
            <div class="col-md-3">
                <p>Class Start</p>
            </div>
            <div class="col-md-3">
                <p>Class End</p>
            </div>
        </div>
        <hr/>
        <div class="packages">
            @foreach($schedules as $schedule)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {{Form::select('days[]',
                            ['SUN' => 'Sunday',
                             'MON' => 'Monday',
                             'TUE' => 'Tuesday',
                             'WED' => 'Wednesday',
                             'THU' => 'Thursday',
                             'FRI' => 'Friday',
                             'SAT' => 'Saturday'],$schedule->day,['class'=>'form-control','required'])}}
                        </div>
                        <div class="col-md-3">
                            {{Form::time('times-from[]',$schedule->start,['class'=>'form-control','step'=>'900','required'])}}
                        </div>
                        <div class="col-md-3">
                            {{Form::time('times-to[]',$schedule->end,['class'=>'form-control','step'=>'900','required'])}}
                        </div>
                        <div class="col-md-2">
                            <a href="#" style="border:none;background-color:transparent;" class="remove-form-field"><i class="ti-trash"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-success add-form-field"><i class="fa fa-plus"></i>&nbsp;Add New Schedule</button>

    </div>

    <br/>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Edit Subject',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <div id="base-package-fields" hidden>
        <div class="form-group">
            <div class="row">
                <div class="col-md-3">
                    {{Form::select('days[]',
                    ['SUN' => 'Sunday',
                     'MON' => 'Monday',
                     'TUE' => 'Tuesday',
                     'WED' => 'Wednesday',
                     'THU' => 'Thursday',
                     'FRI' => 'Friday',
                     'SAT' => 'Saturday'],'',['class'=>'form-control','required'])}}
                </div>
                <div class="col-md-3">
                    {{Form::time('times-from[]','00:00',['class'=>'form-control','step'=>'900','required'])}}
                </div>
                <div class="col-md-3">
                    {{Form::time('times-to[]','23:00',['class'=>'form-control','step'=>'900','required'])}}
                </div>
                <div class="col-md-2">
                    <a href="#" style="border:none;background-color:transparent;" class="remove-form-field"><i class="ti-trash"></i></a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('self/js/subjects/edit.js')}}"></script>

@endsection