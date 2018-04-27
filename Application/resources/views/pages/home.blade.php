@extends('base')
@section('active-home') active @endsection
@section('searchbar')
    <div class="search-container">
        @include('inc.tagline')
    </div>
@endsection
@section('content')
    @include('layouts.specializations')
    @include('layouts.pricing')
@endsection