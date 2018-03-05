@extends('layouts.app')


@section('content')
    {!! Form::open(['route'=>'test','method'=>'GET']) !!}
    <div class="col-md-5">
        <div class="form-group">
            {{--<input class="form-control" type="text" name="s" placeholder="job title / keywords">--}}
            {{Form::text('search','',['placeholder'=>'job title/keywords'])}}
        </div>
    </div>
    {!! Form::close() !!}
@endsection
