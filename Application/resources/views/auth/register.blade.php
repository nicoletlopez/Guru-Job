@extends('base')
@section('title')- Register @endsection
@section('current') Register @endsection
@section('current-header') Register @endsection
@section('content')
    @include('inc.header')
    <div id="content" class="my-account">
        <div class="container">
            <div class="row">
                @include('inc.messages')
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 cd-user-modal">
                    <div class="my-account-form">
                        <ul class="cd-switcher">
                            <li><a class="selected" href="{{route('login')}}">LOGIN</a></li>
                            <li><a>REGISTER</a></li>
                        </ul>
                        <div id="cd-signup" style="border:3px solid #FF4F57;" class="is-selected">
                            <div class="page-login-form register">
                                <form class="login-form" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <div class="input-icon">
                                            <i class="ti-user"></i>
                                            <input id="name" type="text" class="form-control" name="name" placeholder="Full Name" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="input-icon">
                                            <i class="ti-email"></i>
                                            <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="input-icon">
                                            <i class="ti-lock"></i>
                                            <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="ti-lock"></i>
                                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <button class="btn btn-common log-btn">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
