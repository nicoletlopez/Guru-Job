<div class="modal fade subscription-form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title" id="myModalLabel">Subscription form</h3>
            </div>
            {!! Form::open(['action'=>'SubscriptionsController@store','class'=>'form-ad','method'=>'POST']) !!}
            <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="pull-left" for="name" style="font-size: 16px; padding-top: 15px">Full
                                Name: </label>
                        </div>
                        <div class="col-md-10">
                            <div class="input-icon">
                                <i class="ti-user"></i>
                                <input id="name" type="text" class="form-control" name="name"
                                       value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                         <strong>{{ $errors->first('name') }}</strong>
                                     </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="pull-left" for="email" style="font-size: 16px; padding-top: 15px">
                                E-mail:
                            </label>
                        </div>
                        <div class="col-md-10">
                            <div class="input-icon">
                                <i class="ti-email"></i>
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                         <strong>{{ $errors->first('email') }}</strong>
                                     </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="pull-left" for="credit_card" style="font-size: 16px; padding-top: 15px">
                                Credit Card:
                            </label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-icon">
                                <i class="ti-credit-card"></i>
                                <input id="password-confirm" type="text" class="form-control"
                                       name="credit_card" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class="pull-left" for="expiry_date" style="font-size: 16px; padding-top: 15px">
                                Expiry Date:
                            </label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-icon">
                                <i class="ti-calendar"></i>
                                <input id="expiry-date" type="date" class="form-control"
                                       placeholder="Expiry Date" name="expiry_date" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="row">
                        <div class="col-md-2">
                            <label class="pull-left" for="password" style="font-size: 16px; padding-top: 15px">
                                Password:
                            </label>
                        </div>
                        <div class="col-md-4">
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
                        <div class="col-md-2">
                            <label class="pull-left" for="password-confirm" style="font-size: 16px; padding-top: 15px">
                                Confirm:
                            </label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-icon">
                                <i class="ti-lock"></i>
                                <input id="password-confirm" type="password" class="form-control"
                                       placeholder="Confirm password" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-common log-btn">Subscribe Now!</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>