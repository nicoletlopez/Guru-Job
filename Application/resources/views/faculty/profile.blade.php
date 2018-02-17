@extends('faculty.dashboard-menu')
@section('title')- Profile @endsection
@section('current') Profile @endsection
@section('current-header') Profile @endsection
@section('profile-active') active @endsection

@section('dashboard-content')
    @include('inc.profile-info')
@endsection