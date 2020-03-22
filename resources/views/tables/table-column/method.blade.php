@if ($component->getOption('shorten', false))
    <span class="text-overflow d-block">{!! ViewHelper::truncate($component->getOption('model')->{$component->getOption('method')}(), $component->getOption('shorten')) !!}</span>
@else
    <span class="text-overflow d-block">{!! $component->getOption('model')->{$component->getOption('method')}() !!}</span>
@endif