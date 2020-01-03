@extends('rocXolid::layouts.unauthorized')

@section('content')
<section class="login_content">
    <div>
        <h1>{{ $component->translate('text.registration') }}</h1>

        <div class="ajax-overlay">
            {!! $component->getFormComponent()->render('create') !!}
        </div>

        <div>
            <p>{{ $component->translate('text.or') }}<br /><a class="text-danger" href="{{ route('rocXolid.auth.login') }}"><b>{{ $component->translate('text.login') }}</b></a></p>
        </div>
    </div>
</section>
@endsection