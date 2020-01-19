<div class="alert alert-info clearfix">
    <p class="pull-left">{!! $component->translate($component->getTextKey()) !!}</p>
@if ($component->hasRoute())
    <a class="btn btn-primary pull-right" href="{{ $component->getRoute() }}">{{ $component->translate(sprintf('button.%s', $component->getRouteMethod())) }}</a>
@endif
</div>