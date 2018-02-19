@extends('base')
@section('title')- Log In @endsection
@section('current') Log In @endsection
@section('current-header') Log In @endsection
@section('content')
@include('inc.header')
    <div id="content" class="my-account">
        <div class="container">
            <div class="row">
                @include('inc.messages')
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 cd-user-modal">
                    <div class="my-account-form">
                        <ul class="cd-switcher">
                            <li><a class="selected">LOGIN</a></li>
                            <li><a href="{{route('register')}}" class="">REGISTER</a></li>
                        </ul>
                        <div id="cd-login" class="is-selected">
                            <div class="page-login-form">
                                <form action="{{route('login')}}" method="POST" class="login-form">
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="input-icon">
                                            <i class="ti-user"></i>
                                            <!--<input type="text" id="sender-email" class="form-control" name="email" placeholder="Username">-->
                                            <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!--PASSWORD-->
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="input-icon">
                                            <i class="ti-lock"></i>
                                            <!--<input type="password" class="form-control" placeholder="Password">-->
                                            <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <button class="btn btn-common log-btn">Login</button>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                        <p class="cd-form-bottom-message"><a href="{{ route('password.request') }}">Lost your password?</a></p>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection