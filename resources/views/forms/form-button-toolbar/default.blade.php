@if ($component->getButtonGroups())
    @if ($component->getOption('wrapper', false))
    <div {!! $component->getHtmlAttributes('wrapper') !!}>
    @endif

        <div class="ln_solid"></div>
        <div {!! $component->getHtmlAttributes() !!}>
        @foreach ($component->getButtonGroups() as $buttongroup)
            {!! $buttongroup->render($buttongroup->getOption('template', $buttongroup->getDefaultTemplateName())) !!}
        @endforeach
        </div>

    @if ($component->getOption('wrapper', false))
    </div>
    @endif
@endif