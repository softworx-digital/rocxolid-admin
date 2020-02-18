<div class="@if ($component->hasOption('units')) input-group margin-0 @else control-group @endif">
@if ($component->getFormField()->isArray())
    {!! Form::text($component->getFormField()->getFieldName($index), $component->getFormField()->getFieldValue($index), $component->getOption('attributes')) !!}
@else
    {!! Form::text($component->getFormField()->getFieldName(), $component->getFormField()->getFieldValue(), $component->getOption('attributes')) !!}
@endif
@if ($component->hasOption('units'))
    <span class="input-group-addon">{!! $component->getOption('units') !!}</span>
@endif
</div>