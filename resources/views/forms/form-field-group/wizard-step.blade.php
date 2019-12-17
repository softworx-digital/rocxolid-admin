<fieldset
    id="{{ $component->getDomId($component->getFormFieldGroup()->getName()) }}"
    role="tabpanel"
    data-form-field-group="{{ $component->getFormFieldGroup()->getName() }}"
    data-form-field-group-validation-url="{{ $component->getOption('validation-url') }}"
    class="form-group step-tab-panel @if (isset($show) && $show) active @elseif ($component->getOption('attributes.disabled', false)) disabled @endif">
@if ($component->getFormFields())
    @if ($component->getOption('wrapper.legend', false))
        <legend>{!! $component->translate($component->getOption('wrapper.legend.title')) !!}</legend>
    @endif

    <div {!! $component->getHtmlAttributes() !!}>
    @foreach ($component->getFormFields() as $field)
        {!! $field->render($field->getOption('template', $field->getDefaultTemplateName())) !!}
    @endforeach
    </div>
@endif
</fieldset>