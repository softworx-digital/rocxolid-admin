@if ($component->getOption('wrapper', false))
<div {!! $component->getHtmlAttributes('wrapper') !!}>
@endif
    <button {!! $component->getHtmlAttributes() !!} disabled="disabled">
    @if ($component->getOption('label.icon', false))
        <i class="{{ $component->getOption('label.icon') }}@if ($component->getOption('label.title', false)) margin-right-5 @endif"></i>
    @endif
    @if ($component->getOption('label.title', false))
        {{ $component->getOption('label.title') }}
    @endif
    </button>
@if ($component->getOption('wrapper', false))
</div>
@endif