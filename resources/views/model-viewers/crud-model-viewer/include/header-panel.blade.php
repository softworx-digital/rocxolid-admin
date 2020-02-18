<div id="{{ $component->getDomId('header-panel') }}" class="x_title">
    <h2>
    @if ($component->getModel()->exists)
        <span class="text-big">{!! $component->getModel()->getTitle() !!}</span>
        <span class="pull-right model-class-title">{{ $component->translate('model.title.singular') }}</span>
        <small class="pull-right">{{ $component->translate(sprintf('action.%s', $route_method)) }}</small>
    @else
        <small class="pull-left">{{ $component->translate(sprintf('action.%s', $route_method)) }}</small>
        <span class="pull-left model-class-title">{{ $component->translate('model.title.singular') }}</span>
    @endif
    </h2>
</div>