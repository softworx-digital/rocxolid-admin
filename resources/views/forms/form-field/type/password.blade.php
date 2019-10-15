@if ($component->getFormField()->isArray())
    {!! Form::password($component->getFormField()->getFieldName($index), $component->getOption('attributes')) !!}
@else
    {!! Form::password($component->getFormField()->getFieldName(), $component->getOption('attributes')) !!}
@endif