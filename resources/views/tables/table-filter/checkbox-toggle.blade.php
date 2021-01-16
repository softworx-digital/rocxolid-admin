<label {!! $component->getHtmlAttributes('label') !!}>
    {!! Form::hidden($component->getTableFilter()->getFieldName(), 0) !!}
    {!! Form::checkbox($component->getTableFilter()->getFieldName(), $component->getOption('value', 1), $component->getTableFilter()->getValue() == 1, $component->getOption('attributes')) !!}
@if ($component->getOption('label', false) && $component->getOption('label.after', false))
    <span class="margin-left-10" style="top: 4px;">
    @if ($component->hasOption('label.title-translated'))
        {{ $component->getOption('label.title-translated') }}
    @else
        {{ $component->translate($component->getOption('label.title')) }}
    @endif
    </span>
@endif
</label>