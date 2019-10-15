@if ($component->getOption('wrapper', false))
<div {!! $component->getHtmlAttributes('wrapper') !!}>
@endif

    {!! $component->render(sprintf('type.%s', $component->getOption('type-template'))) !!}

@if ($component->getOption('wrapper', false))
</div>
@endif