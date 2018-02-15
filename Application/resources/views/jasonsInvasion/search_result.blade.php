@extends('layouts.app')


@section('content')
    <div class="well">
        @if(count($jobs) > 0)
            @foreach($jobs as $job)
                <div class="well">
                    <h3>{{$job->title}}</h3>
                    <p>{{$job->desc}}</p>
                </div>
            @endforeach
        @else
            <p>No Subjects Available</p>
        @endif
    </div>
@endsection
