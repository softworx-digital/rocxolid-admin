@if ($component->getOption('wrapper', false))
<div {!! $component->getHtmlAttributes('wrapper') !!}>
@endif

    <button type="button" {!! $component->getHtmlAttributes() !!}>
    @if ($component->getOption('label.icon', false))
        <i class="{{ $component->getOption('label.icon') }}@if ($component->getOption('label.title', false)) margin-right-5 @endif"></i>
    @endif
    @if ($component->getOption('label.title', false))
        {{ $component->getOption('label.title') }}
    @else
        {{-- (no title) --}}
    @endif
    </button>

@if ($component->getOption('wrapper', false))
</div>
@endif