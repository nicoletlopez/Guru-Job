<div class="modal fade subscription-form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Subscription form</h3>
            </div>
            <form class="login-form" method="POST" action="{{ route('register') }}">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="input-icon">
                            <i class="ti-user"></i>
                            <input id="name" type="text" class="form-control" name="name" placeholder="Full Name"
                                   value="{{ old('name') }}" required autofocus>

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
                            <input id="email" type="email" class="form-control" placeholder="E-mail" name="email"
                                   value="{{ old('email') }}" required>

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
                            <input id="password" type="password" placeholder="Password" class="form-control"
                                   name="password" required>

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
                            <input id="password-confirm" type="password" class="form-control"
                                   placeholder="Confirm password" name="password_confirmation" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-common log-btn">Subscribe Now!</button>
                </div>
            </form>

        </div>
    </div>
</div>