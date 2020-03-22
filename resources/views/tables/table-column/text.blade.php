@if ($component->getOption('shorten', false))
    {{ ViewHelper::truncate($component->getModelValue(), $component->getOption('shorten')) }}
@elseif ($component->getOption('translate', false))
    <span title="{{ $component->getModelValue() }}" class="c-help text-overflow d-block">{{ $component->getOption('translate')->get($component->getModelValue()) }}</span>
@else
    <span class="text-overflow d-block">{!! $component->getModelValue() !!}</span>
@endif