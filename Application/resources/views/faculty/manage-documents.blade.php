@extends('faculty.dashboard-menu')
@section('title')- My Documents @endsection
@section('current') My Documents @endsection
@section('current-header') My Documents @endsection
@section('manage-documents-active') active @endsection

@section('dashboard-content')
    @include('inc.messages')
    @include('documentspace.documentspace-index')
@endsection