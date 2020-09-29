@extends('rocXolid::layouts.unauthenticated')

@section('content')
<section>
    <h1>{{ $component->translate('text.login') }}</h1>
@if ($errors->has('email'))
    <p class="alert alert-danger"><strong>{{ $errors->first('email') }}</strong></p>
@elseif ($errors->has('password'))
    <p class="alert alert-danger"><strong>{{ $errors->first('password') }}</strong></p>
@endif
    <div class="ajax-overlay">
        <form id="login-form" method="post" action="{{ route('rocXolid.auth.login') }}" class="ajaxify">
            {{ csrf_field() }}

            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="{{ $component->translate('field.username') }}" required="required"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="{{ $component->translate('field.password') }}" required="required"/>
            </div>
            <div class="form-group">
                <label><input type="checkbox" name="remember"/> {{ $component->translate('field.remember-me') }}</label>
            </div>

            <div class="x_footer">
                <button class="btn btn-primary" type="submit">{{ $component->translate('button.login') }}</button>
            </div>
        </form>
    </div>
@if (config('rocXolid.admin.auth.registration_enabled', false) || config('rocXolid.admin.auth.forgot_password_enabled', false))
    <p class="margin-bottom-5">{{ $component->translate('text.or') }}</p>
    <div class="btn-group col-xs-12" role="group">
        <a type="button" class="btn btn-success col-xs-6" href="{{ route('rocXolid.auth.registration') }}">{{ $component->translate('text.register') }}</a>
        <a type="button" class="btn btn-warning col-xs-6" href="{{ route('rocXolid.auth.forgot-password') }}">{{ $component->translate('text.forgot-password') }}</a>
    </div>
@endif
</section>
@endsection