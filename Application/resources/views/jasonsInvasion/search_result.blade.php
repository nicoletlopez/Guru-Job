@extends('layouts.app')


@section('content')
    <h2>Search Term: {{$search_term}}</h2>
    <div class="well">
        @if(count($hrs) > 0)
            @foreach($hrs as $hr)
                <div class="well">
                    <h3>{{$hr->user->name}}</h3>
                    <p>{{$hr->user->profile->dob}}</p>
                    <p>{{$hr->user->profile->street_address}}, {{$hr->user->profile->city}} City, {{$hr->user->profile->region}}</p>
                    <p>{{$hr->user->profile->contact_number}}</p>
                </div>
            @endforeach
        @else
            <p>No School With that Name</p>
        @endif
    </div>
@endsection
