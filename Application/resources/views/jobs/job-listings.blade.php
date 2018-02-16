@extends('base')
@section('title')- Job Listings @endsection
@section('current') Job Listings @endsection
@section('current-header') Job Listings @endsection

@section('active-jobs') active @endsection
@section('content')
    @include('inc.header')
    <div style="background-color:whitesmoke;">
        <br/>
        @include('inc.searchbar')
    </div>
    @include('layouts.jobs')
@endsection


