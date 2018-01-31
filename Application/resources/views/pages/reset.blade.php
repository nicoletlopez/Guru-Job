@extends('base')
@section('title')- My Account @endsection
@section('current') My Account @endsection
@section('current-header') My Account @endsection
@section('content')
    @include('inc.header')
<div id="content" class="my-account">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-6 cd-user-modal">
                <div class="my-account-form">
                    <ul class="cd-switcher">
                        <li><a class="selected">LOGIN</a></li>
                        <li><a href="{{route('register')}}" class="">REGISTER</a></li>
                    </ul>
                    <div class="page-login-form is-selected" id="cd-reset-password">
                        <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>
                        <form class="cd-form">
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="ti-email"></i>
                                    <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email">
                                </div>
                            </div>
                            <p class="fieldset">
                                <button class="btn btn-common log-btn" type="submit">Reset password</button>
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
