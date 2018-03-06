@extends('hr.dashboard-menu')
@section('title')- Manage Jobs @endsection
@section('current') Manage Jobs @endsection
@section('current-header') Manage Jobs @endsection
@section('manage-jobs-active') active @endsection

@section('dashboard-content')
    @include('inc.messages')
    @include('jobs.jobs-index')
@endsection