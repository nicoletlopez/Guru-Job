@extends('base')
@section('title')- Forgot Password @endsection
@section('current') Forgot Password @endsection
@section('current-header') Forgot Password @endsection
@section('content')
    @include('inc.header')
    <div id="content" class="my-account">
        <div class="container">
            <div class="row">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 cd-user-modal">
                    <div class="my-account-form">
                        <ul class="cd-switcher">
                            <li><a class="selected">LOGIN</a></li>
                            <li><a href="{{route('register')}}" class="">REGISTER</a></li>
                        </ul>
                        <div class="page-login-form is-selected" id="cd-reset-password">
                            <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>
                            <form class="cd-form" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="ti-email"></i>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" required>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <p class="fieldset">
                                    <button class="btn btn-common log-btn" type="submit">Send Password Reset Link</button>
                                </p>
                            </form>
                            <p class="cd-form-bottom-message"><a href="{{route('login')}}">Back to log-in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
