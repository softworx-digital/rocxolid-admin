<div class="alert alert-{{ $component->getOption('alert-type') }}" role="alert">
@if ($component->hasOption('alert-heading') && filled($component->getOption('alert-heading')))
    <h4 class="alert-heading">{!! $component->getOption('alert-heading') !!}</h4>
@endif
    {!! $component->getOption('alert-message') !!}
</div>