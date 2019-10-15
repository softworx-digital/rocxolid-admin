@if ($component->getButtons())
    @if ($component->getOption('wrapper', false))
    <div {!! $component->getHtmlAttributes('wrapper') !!}>
    @endif

        <div {!! $component->getHtmlAttributes() !!}>
        @foreach ($component->getButtons() as $button)
            {!! $button->render($button->getOption('template', $button->getDefaultTemplateName())) !!}
        @endforeach
        </div>

    @if ($component->getOption('wrapper', false))
    </div>
    @endif
@endif