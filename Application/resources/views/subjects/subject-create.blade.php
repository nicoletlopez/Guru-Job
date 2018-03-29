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
        <div class="form-group col-md-12">
            <div class="search-category-container">
            {{Form::label('','Required Specializations',['class'=>'control-label'])}}
            <select multiple style="" class="selectpicker dropdown-product" data-live-search="true" name="specializations[]">
                @foreach($specializations as $specialization)
                    <option value="{{$specializations}}">{{$specialization->name}}</option>
                @endforeach
            </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        {{Form::label('description','Description',['class'=>'control-label'])}}
        {{Form::textarea('description','',['id'=>'editor0','class'=>'form-control','placeholder'=>'Subject Description'])}}
    </div>

        {{Form::label('days','Class Days',['class'=>'control-label'])}}
        <div class="add-fields" data-af_base="#base-package-fields" data-af_target=".packages">
            <div class="packages">

            </div>
            <button type="button" class="btn add-form-field">add new row</button>
        </div>


    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <div id="base-package-fields" hidden>
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                        {{Form::select('region',[0 => 'Sunday'],null,['class'=>''])}}
                </div>
                <div class="col-md-2">
                    <input type="time" class="form-control" name="packages[%index%][height]" placeholder="height" required>
                </div>
                <div class="col-md-2">
                    <button type="button" style="border:none;background-color:transparent;" class="remove-form-field"><i class="ti-trash"></i></button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/jquery/jquery.min.js')}}"></script>
    <script>
        $('.add-fields').each(function(index, el) {
            var warp = $(this);
            var target = $(this).data('af_target') || '.content';
            var index = $(target).children('div, tr').length;
            var baseEl =$($(this).data('af_base')) || $(target).find('.form-field-base');
            var base = baseEl.html();
            baseEl.remove();
            //alert(base);

            warp.find(target).append(base.replace(/%index%/g, index));
            index ++;

            warp.on('click', '.add-form-field', function(e) {
                e.preventDefault();
                warp.find(target).append(base.replace(/%index%/g, index));
                index++;
            });

            warp.on('click', '.remove-form-field', function(e) {
                e.preventDefault();
                $(this).parents($(this).data('target') || '.form-group').remove();
            });
        });
    </script>
@endsection
