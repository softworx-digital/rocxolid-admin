<div>
@if ($component->getFormField()->isArray())
    {!! Form::hidden($component->getFormField()->getFieldName($index), 0) !!}
    {!! Form::checkbox($component->getFormField()->getFieldName($index), $component->getOption('value', 1), $component->getFormField()->isFieldValue($component->getOption('value', 1), $index), $component->getOption('attributes')) !!}
@else
    {!! Form::hidden($component->getFormField()->getFieldName(), 0) !!}
    {!! Form::checkbox($component->getFormField()->getFieldName(), $component->getOption('value', 1), $component->getFormField()->isFieldValue($component->getOption('value', 1)), $component->getOption('attributes')) !!}
@endif
@if ($component->getOption('label', false) && $component->getOption('label.after', false))
    <label {!! $component->getHtmlAttributes('label') !!}>
        <span>{{ $component->translate($component->getOption('label.title')) }}</span>
    </label>
@endif
</div>