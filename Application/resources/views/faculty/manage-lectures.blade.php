@extends('faculty.dashboard-menu')
@section('title')- Manage Lectures @endsection
@section('current') Manage Lectures @endsection
@section('current-header') Manage Lectures @endsection
@section('manage-lectures-active') active @endsection

@section('dashboard-content')
    @include('inc.messages')
    @include('lectures.lectures-index')
@endsection