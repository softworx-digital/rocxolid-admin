@if ($component->getFormField()->isArray())
    {!! Form::select($component->getFormField()->getFieldName($index), $component->getFormField()->getCollection(), $component->getFormField()->getFieldValue($index), $component->getOption('attributes')) !!}
@else
    {!! Form::select($component->getFormField()->getFieldName(), $component->getFormField()->getCollection(), $component->getFormField()->getFieldValue(), $component->getOption('attributes')) !!}
@endif