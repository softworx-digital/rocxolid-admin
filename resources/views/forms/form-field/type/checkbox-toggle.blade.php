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
    @if ($component->hasOption('label.title-translated'))
        {{ $component->getOption('label.title-translated') }}
    @else
        {{ $component->translate($component->getOption('label.title')) }}
    @endif
    @if ($component->getOption('label.hint-translated', false))
        <i class="fa fa-question-circle text-success" title="{{ $component->getOption('label.hint-translated') }}"></i>
    @elseif ($component->getOption('label.hint', false))
        <i class="fa fa-question-circle text-success" title="{{ $component->translate($component->getOption('label.hint')) }}"></i>
    @endif
    </label>
@endif
</div>