@if ($component->getFormField()->isArray())
    {!! Form::select($component->getFormField()->getFieldName($index), $component->getOption('choices', []), $component->getFormField()->getFieldValue($index), $component->getOption('attributes')) !!}
@else
    {!! Form::select($component->getFormField()->getFieldName(), $component->getOption('choices', []), $component->getFormField()->getFieldValue(), $component->getOption('attributes')) !!}
@endif