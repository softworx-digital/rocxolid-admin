@extends('rocXolid::layouts.unauthorized')

@section('content')
<section class="login_content">
    <div>
        <h1>{{ $component->translate('text.login', false) }}</h1>
    @if ($errors->has('email'))
        <p class="alert alert-danger"><strong style="text-shadow: none;">{{ $errors->first('email') }}</strong></p>
    @endif
        <div class="ajax-overlay">
            <form method="post" action="{{ route('rocXolid.auth.login') }}" id="login-form">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="{{ $component->translate('field.username', false) }}" required="required"/>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="{{ $component->translate('field.password', false) }}" required="required"/>
                </div>
                <div class="form-group">
                    <label><input type="checkbox" name="remember"/> {{ $component->translate('field.remember-me', false) }}</label>
                </div>

                <div class="x_footer">
                    <button class="btn btn-primary" type="submit">{{ $component->translate('button.login', false) }}</button>
                </div>
            </form>
        </div>
    @if (config('rocXolid.admin.auth.registration_enabled', false))
        <div>
            <p>{{ $component->translate('text.or', false) }}<br /><a class="text-danger" href="{{ route('rocXolid.auth.registration') }}"><b>{{ $component->translate('text.register', false) }}</b></a></p>
            @if (false) <a class="reset_pass">{{ $component->translate('text.forgot-password', false) }}</a>@endif
        </div>
    @endif
    </div>
</section>
@endsection