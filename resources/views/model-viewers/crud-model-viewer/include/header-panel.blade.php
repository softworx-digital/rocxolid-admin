<div class="x_title">
    <h2>
        {{ $component->translate('model.title.singular') }}
    @if ($component->getModel()->getTitle())
        <big>{!! $component->getModel()->getTitle() !!}</big>
    @endif
        <small>{{ $component->translate(sprintf('action.%s', $route_method)) }}</small>
    </h2>
    <div id="{{ $component->getDomId('output-icon') }}" class="pull-right"></div>
    <div class="clearfix"></div>
</div>