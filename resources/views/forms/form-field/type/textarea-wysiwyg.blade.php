@if ($component->getFormField()->isArray())
    {!! Form::textarea($component->getFormField()->getFieldName($index), $component->getFormField()->getFieldValue($index), $component->getOption('attributes')) !!}
@else
    {!! Form::textarea($component->getFormField()->getFieldName(), $component->getFormField()->getFieldValue(), $component->getOption('attributes')) !!}
@endif