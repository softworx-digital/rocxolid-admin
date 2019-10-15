@if ($component->getOption('wrapper', false))
<div {!! $component->getHtmlAttributes('wrapper') !!}>
@endif

@if ($component->getButton()->getRepository()->getController()->userCan($component->getOption('permissions_method_group')))
    <a type="button" href="{{ $component->getOption('url') }}" {!! $component->getHtmlAttributes() !!}>
    @if ($component->getOption('label.icon', false))
        <i class="{{ $component->getOption('label.icon') }}@if ($component->getOption('label.title', false)) margin-right-5 @endif"></i>
    @endif
    @if ($component->getOption('label.title', false))
        {{ $component->getOption('label.title') }}
    @else
        {{-- (no title) --}}
    @endif
    </a>
@endif

@if ($component->getOption('wrapper', false))
</div>
@endif