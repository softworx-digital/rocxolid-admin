<div class="alert alert-danger clearfix">
@if ($component->hasText())
    <p class="pull-left">{!! $component->getText() !!}</p>
@else
    <p class="pull-left">{!! $component->translate($component->getTextKey()) !!}</p>
@endif
@if ($component->hasRoute())
    <a class="btn btn-primary pull-right" href="{{ $component->getRoute() }}">{{ $component->translate(sprintf('button.%s', $component->getRouteMethod())) }}</a>
@endif
</div>