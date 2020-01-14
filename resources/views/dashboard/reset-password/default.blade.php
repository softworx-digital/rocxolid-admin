@extends('rocXolid::layouts.unauthenticated')

@section('content')
<section>
    <h1>{{ $component->translate('text.reset-password') }}</h1>
    <p>{!! $component->translate('text.process') !!}</p>
    <div class="ajax-overlay">
        {!! $component->getFormComponent()->render('create') !!}
    </div>
</section>
@endsection