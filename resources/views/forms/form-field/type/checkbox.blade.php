<label {!! $component->getHtmlAttributes('label') !!}>
@if ($component->getFormField()->isArray())
    {!! Form::checkbox($component->getFormField()->getFieldName($index), $component->getOption('value', 1), $component->getFormField()->isFieldValue($component->getOption('value', 1), $index), $component->getOption('attributes')) !!}
@else
    {!! Form::checkbox($component->getFormField()->getFieldName(), $component->getOption('value', 1), $component->getFormField()->isFieldValue($component->getOption('value', 1)), $component->getOption('attributes')) !!}
@endif
@if ($component->getOption('label', false) && $component->getOption('label.after', false))
    <span>{{ $component->translate($component->getOption('label.title')) }}</span>
@endif
</label>