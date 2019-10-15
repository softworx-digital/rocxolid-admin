@if ($component->getFormFields())
    @if ($component->getOption('wrapper', false))
    <div {!! $component->getHtmlAttributes('wrapper') !!}>
    @endif

        <div {!! $component->getHtmlAttributes() !!}>
        @foreach ($component->getFormFields() as $field)
            {!! $field->render($field->getOption('template', $field->getDefaultTemplateName())) !!}
        @endforeach
        </div>

    @if ($component->getOption('wrapper', false))
    </div>
    @endif
@endif