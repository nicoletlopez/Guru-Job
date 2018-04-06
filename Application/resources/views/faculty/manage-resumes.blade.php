@extends('faculty.dashboard-menu')
@section('title')- My Resumes @endsection
@section('current') My Resumes @endsection
@section('current-header') My Resumes @endsection
@section('manage-resumes-active') active @endsection

@section('dashboard-content')
    @include('resumes.resumes-index')
@endsection