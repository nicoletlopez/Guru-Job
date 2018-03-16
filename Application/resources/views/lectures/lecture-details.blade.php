@extends('layouts.lectures')
@section('title')- Lecture Details @endsection
@section('current') Lecture Details @endsection
@section('current-header') Lecture Details @endsection
@section('tab-detail-active') active @endsection

@section('active-tab-content')
    <div class="text-left">
        <h3>{{$lecture->title}}</h3>
    </div>
    <div class="clearfix">
        <h4>Lecture Overview</h4>
        {!! $lecture->overview !!}
    </div>
    <div class="clearfix">
        <h4>Lecture Objectives</h4>
        {!! $lecture->objectives !!}
    </div>
    <div class="clearfix">
    </div>
    </div>
@endsection