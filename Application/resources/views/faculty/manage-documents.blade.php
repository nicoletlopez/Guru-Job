@extends('faculty.dashboard-menu')
@section('title')- My Guru Drive @endsection
@section('current') My Guru Drive @endsection
@section('current-header') My Guru Drive @endsection
@section('manage-documents-active') active @endsection

@section('dashboard-content')
    @include('inc.messages')
    @include('documentspace.documentspace-index')
@endsection