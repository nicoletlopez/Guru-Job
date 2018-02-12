@extends('hr.dashboard-menu')
@section('title')- Dashboard @endsection
@section('current') Dashboard @endsection
@section('current-header') HR Dashboard @endsection
@section('dashboard-active') active @endsection

@section('dashboard-content')
    @include('inc.dashboard-blocks')
@endsection