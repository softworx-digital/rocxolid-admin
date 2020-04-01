<div class="control-group">
@if ($component->getFormField()->isArray())
    {!! Form::hidden($component->getFormField()->getFieldName($index), null) !!}
    {!! Form::select($component->getFormField()->getFieldName($index), $component->getFormField()->getCollection(), $component->getFormField()->getFieldValue($index), $component->getOption('attributes')) !!}
@else
    {!! Form::select($component->getFormField()->getFieldName(), $component->getFormField()->getCollection(), $component->getFormField()->getFieldValue(), $component->getOption('attributes')) !!}
@endif
</div>