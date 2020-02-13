@if ($component->getOption('shorten', false))
    {{ ViewHelper::truncate($component->getModelValue(), $component->getOption('shorten')) }}
@elseif ($component->getOption('translate', false))
    <span title="{{ $component->getModelValue() }}" class="c-help">{{ $component->getOption('translate')->get($component->getModelValue()) }}</span>
@else
    {!! $component->getModelValue() !!}
@endif