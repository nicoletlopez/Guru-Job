@extends('hr.dashboard-menu')
@section('title')- School Profile @endsection
@section('current') School Profile @endsection
@section('current-header') School Profile @endsection
@section('hr-profile-active') active @endsection

@section('dashboard-content')
    @include('inc.profile-info')
@endsection