<div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content ajax-overlay">
            <form id="login-modal-form" method="POST" action="{{ route('rocXolid.auth.login') }}">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-hourglass-end text-danger margin-right-10"></i>{{ $component->translate('text.login-timeout') }}</h4>
                </div>
                <div class="modal-body">
                    <fieldset>
                    @if ($errors->has('email'))
                        <p class="alert alert-danger"><strong>{{ $errors->first('email') }}</strong></p>
                    @elseif ($errors->has('password'))
                        <p class="alert alert-danger"><strong>{{ $errors->first('password') }}</strong></p>
                    @endif
                        <div class="form-group">
                            <div class="control-group"><input type="text" name="email" class="form-control" placeholder="{{ $component->translate('field.username') }}" required="required"/></div>
                        </div>

                        <div class="form-group">
                            <div class="control-group"><input type="password" name="password" class="form-control" placeholder="{{ $component->translate('field.password') }}" required="required"/></div>
                        </div>
                        <div class="form-group"><label><input type="checkbox" name="remember"/> {{ $component->translate('field.remember-me') }}</label></div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-ajax-submit-form="#login-modal-form">{{ $component->translate('button.login') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>