@extends('hr.dashboard-menu')
@section('title')- Manage Subjects @endsection
@section('current') Manage Subjects @endsection
@section('current-header') Manage Subjects @endsection
@section('manage-subjects-active') active @endsection

@section('dashboard-content')

    @include('subjects.subjects-index')
@endsection