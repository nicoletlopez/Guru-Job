@extends('base')
@section('title')- Dashboard @endsection
@section('current') Dashboard @endsection
@section('current-header') Dashboard @endsection
@section('content')
    @include('inc.header')
    <div class="container">
        @if (session('status'))
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            You are logged in!

                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@include('inc.dashboard-menu')

@endsection
