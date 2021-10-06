<div class="@if ($component->hasOption('prefix') || $component->hasOption('suffix')) input-group margin-0 @else control-group @endif width-100">
@if ($component->hasOption('prefix'))
    <span class="input-group-addon">{!! $component->getOption('prefix') !!}</span>
@endif
@if ($component->getFormField()->isArray())
    {!! Form::text($component->getFormField()->getFieldName($index), $component->getFormField()->getFieldValue($index), $component->getOption('attributes')) !!}
@else
    {!! Form::text($component->getFormField()->getFieldName(), $component->getFormField()->getFieldValue(), $component->getOption('attributes')) !!}
@endif
@if ($component->hasOption('suffix'))
    <span class="input-group-addon">{!! $component->getOption('suffix') !!}</span>
@endif
</div>