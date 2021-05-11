<div class="@if ($component->hasOption('prefix') || $component->hasOption('units')) input-group margin-0 @else control-group @endif width-100">
{{-- @todo "hotfixed", use prefix and suffix instead --}}
@if ($component->hasOption('prefix'))
    <span class="input-group-addon">{!! $component->getOption('prefix') !!}</span>
@endif
@if ($component->getFormField()->isArray())
    {!! Form::text($component->getFormField()->getFieldName($index), $component->getFormField()->getFieldValue($index), $component->getOption('attributes')) !!}
@else
    {!! Form::text($component->getFormField()->getFieldName(), $component->getFormField()->getFieldValue(), $component->getOption('attributes')) !!}
@endif
@if ($component->hasOption('units'))
    <span class="input-group-addon">{!! $component->getOption('units') !!}</span>
@endif
</div>