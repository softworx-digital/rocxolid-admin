<div class="control-group col-xs-12">
@if ($component->getFormField()->isArray())
    {!! Form::text($component->getFormField()->getFieldName($index), $component->getFormField()->getFieldValue($index), $component->getOption('attributes')) !!}
@else
    {!! Form::text($component->getFormField()->getFieldName(), $component->getFormField()->getFieldValue(), $component->getOption('attributes')) !!}
@endif
</div>