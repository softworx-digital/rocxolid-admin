@if ($component->getOption('shorten', false))
    {{ ViewHelper::truncate($component->getModelValue(), $component->getOption('shorten')) }}
@else
    {{ $component->getModelValue() }}
@endif