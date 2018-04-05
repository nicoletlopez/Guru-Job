@extends('hr.dashboard-menu')
@section('title')- Manage Notifications @endsection
@section('current') Manage Notifications @endsection
@section('current-header') Manage Notifications @endsection
@section('manage-subjects-active') active @endsection

@section('dashboard-content')
    @include('inc.messages')
    @include('notifications.notifications-index')
@endsection