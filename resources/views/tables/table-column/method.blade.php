@if ($component->getOption('shorten', false))
    {!! ViewHelper::truncate($component->getOption('model')->{$component->getOption('method')}(), $component->getOption('shorten')) !!}
@else
    {!! $component->getOption('model')->{$component->getOption('method')}() !!}
@endif