@if ($component->getFormField()->isArray())
    {!! Form::hidden($component->getFormField()->getFieldName($index), $component->getOption('value')) !!}
@else
    {!! Form::hidden($component->getFormField()->getFieldName(), $component->getOption('value')) !!}
@endif