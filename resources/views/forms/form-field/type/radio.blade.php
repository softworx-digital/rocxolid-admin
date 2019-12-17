<label {!! $component->getHtmlAttributes('label') !!}>
@if ($component->getFormField()->isArray())
    {!! Form::radio($component->getFormField()->getFieldName($index), $component->getOption('value'), $component->getFormField()->isFieldValue(1, $index), $component->getOption('attributes')) !!}
@else
    {!! Form::radio($component->getFormField()->getFieldName(), $component->getOption('value'), $component->getFormField()->isFieldValue(1), $component->getOption('attributes')) !!}
@endif
@if ($component->getOption('label', false) && $component->getOption('label.after', false))
    <span>{{ $component->translate($component->getOption('label.title')) }}</span>
@endif
</label>