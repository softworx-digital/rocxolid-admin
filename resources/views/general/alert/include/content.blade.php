<div class="col-md-10 col-xs-12">
@foreach ($component->getText() as $text)
    <{{ data_get($text, 'wrapper') }}>
    @if (data_get($text, 'key')){!! $component->translate(data_get($text, 'key')) !!}@endif
    @if (data_get($text, 'text')){!! $component->translate(data_get($text, 'text')) !!}@endif
    @if (data_get($text, 'collection'))
        @foreach (data_get($text, 'collection') as $item)
            <{{ data_get($text, 'item_wrapper') }}>{{ $item }}</{{ data_get($text, 'item_wrapper') }}>
        @endforeach
    @endif
    </{{ data_get($text, 'wrapper') }}>
@endforeach
</div>
<div class="col-md-2 col-xs-12">
@if ($component->hasRoute())
    <a class="btn btn-primary pull-right" href="{{ $component->getRoute() }}">{{ $component->translate(sprintf('button.%s', $component->getRouteAction())) }}</a>
@endif
@foreach ($component->getButtons() as $button)
    {!! $button->render() !!}
@endforeach
</div>