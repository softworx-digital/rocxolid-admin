@if ($component->getOption('wrapper', false))
<div {!! $component->getHtmlAttributes('wrapper') !!}>
@endif
    <a type="button" href="{{ $component->getOption('url') }}" {!! $component->getHtmlAttributes() !!}>
    @if ($component->getOption('label.icon', false))
        <i class="{{ $component->getOption('label.icon') }}@if ($component->getOption('label.title', false)) margin-right-5 @endif"></i>
    @endif
    @if ($component->getOption('label.title', false))
        {{ $component->translate($component->getOption('label.title')) }}
    @endif
    </a>
@if ($component->getOption('wrapper', false))
</div>
@endif