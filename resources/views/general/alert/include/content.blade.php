<div class="col-md-10 col-xs-12">
@foreach ($component->getText() as $text)
    @if (data_get($text, 'wrapper'))<{{ data_get($text, 'wrapper') }}>@endif
    @if (data_get($text, 'key')){!! $component->translate(data_get($text, 'key')) !!}@endif
    @if (data_get($text, 'text')){!! $component->translate(data_get($text, 'text')) !!}@endif
    @if (data_get($text, 'wrapper'))</{{ data_get($text, 'wrapper') }}>@endif
@endforeach
</div>
@if ($component->hasRoute())
<div class="col-md-2 col-xs-12">
    <a class="btn btn-primary pull-right" href="{{ $component->getRoute() }}">{{ $component->translate(sprintf('button.%s', $component->getRouteMethod())) }}</a>
</div>
@endif