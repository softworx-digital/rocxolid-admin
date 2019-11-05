<div class="x_title">
    <h2>
        {{ $component->translate('model.title.singular') }}
    @if ($component->getModel()->getTitle())
        <span class="text-big">{!! $component->getModel()->getTitle() !!}</span>
    @endif
    @if (false)
        <small>{{ $component->translate(sprintf('action.%s', $route_method)) }}</small>
    @endif
    </h2>
    <div id="{{ $component->getDomId('output-icon') }}" class="pull-right"></div>
    <div class="clearfix"></div>
</div>