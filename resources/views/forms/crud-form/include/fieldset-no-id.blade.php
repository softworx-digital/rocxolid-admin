<fieldset class="step-content">
@foreach ($component->getFormFieldGroupsComponents() as $fieldgroup)
    {{-- @if (!in_array($field->getName(), $exclude)) --}}
        {!! $fieldgroup->render($fieldgroup->getOption('template', $fieldgroup->getDefaultTemplateName())) !!}
    {{-- @endif --}}
@endforeach

@foreach ($component->getFormFieldsComponents() as $field)
    {{-- @if (!in_array($field->getName(), $exclude)) --}}
        {!! $field->render($field->getOption('template', $field->getDefaultTemplateName())) !!}
    {{-- @endif --}}
@endforeach
</fieldset>