@if ($component->getFormField()->isArray())
    {!! Form::hidden($component->getFormField()->getFieldName($index), $component->getFormField()->getFieldValue($index)) !!}
@else
    {!! Form::hidden($component->getFormField()->getFieldName(), $component->getFormField()->getFieldValue()) !!}
@endif