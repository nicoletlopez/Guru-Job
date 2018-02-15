@extends('base')
@section('active-home') active @endsection
@section('searchbar')
    <div class="search-container">
        @include('inc.searchbar')
    </div>
@endsection
@section('content')
    @include('layouts.jobs')
    @include('layouts.specializations')
    @include('layouts.pricing')
@endsection