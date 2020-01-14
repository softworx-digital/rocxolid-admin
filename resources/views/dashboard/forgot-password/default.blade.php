@extends('rocXolid::layouts.unauthenticated')

@section('content')
<section>
    <h1>{{ $component->translate('text.forgot-password') }}</h1>
    <p>{!! $component->translate('text.process') !!}</p>
    <div class="ajax-overlay">
        {!! $component->getFormComponent()->render('create') !!}
    </div>
    <div>
        <p>{{ $component->translate('text.or') }}<br /><a class="text-danger" href="{{ route('rocXolid.auth.login') }}"><b>{{ $component->translate('text.login') }}</b></a></p>
    </div>
</section>
@endsection