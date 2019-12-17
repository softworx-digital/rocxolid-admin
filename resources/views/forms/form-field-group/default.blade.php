<div id="{{ $component->getDomId($component->getFormFieldGroup()->getName()) }}">
@if ($component->getFormFields())
    @if ($component->getOption('wrapper', false))
    <fieldset {!! $component->getHtmlAttributes('wrapper') !!}>
    @endif

    @if ($component->getOption('wrapper.legend', false))
        <legend>{!! $component->translate($component->getOption('wrapper.legend.title')) !!}</legend>
    @endif

        <div {!! $component->getHtmlAttributes() !!}>
        @foreach ($component->getFormFields() as $field)
            {!! $field->render($field->getOption('template', $field->getDefaultTemplateName())) !!}
        @endforeach
        </div>

    @if ($component->getOption('wrapper', false))
    </fieldset>
    @endif
@endif
</div>