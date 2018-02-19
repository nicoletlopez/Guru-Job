@extends('base')
@section('title')- Reset Password @endsection
@section('current') Reset Password @endsection
@section('current-header') Reset Password @endsection
@section('content')
    @include('inc.header')
    <div id="content" class="my-account">
        <div class="container">
            <div class="row">
                @include('inc.messages')
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 cd-user-modal">
                    <div class="my-account-form">
                        <div id="cd-signup" class="is-selected">
                            <div class="page-login-form register">
                                <form class="login-form" method="POST" action="{{ route('password.request') }}">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="input-icon">
                                            <i class="ti-email"></i>
                                            <input id="email" type="email" class="form-control" placeholder="E-mail"
                                                   name="email" value="{{ $email or old('email') }}" required autofocus>

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
                                            <input id="password" type="password" placeholder="Password"
                                                   class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <div class="input-icon">
                                            <i class="ti-lock"></i>
                                            <input id="password-confirm" type="password" class="form-control"
                                                   placeholder="Confirm password" name="password_confirmation" required>
                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <button class="btn btn-common log-btn">Reset Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
