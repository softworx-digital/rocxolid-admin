<div class="input-group">
@if ($component->getFormField()->isArray())
    {!! Form::text($component->getFormField()->getFieldName($index), $component->getFormField()->getFieldValue($index), $component->getOption('attributes')) !!}
@else
    {!! Form::text($component->getFormField()->getFieldName(), $component->getFormField()->getFieldValue(), $component->getOption('attributes')) !!}
@endif
</div>

@if (false)
<div class="input-group">
    <div class="btn-group btn-group-sm">
        <button type="button" class="btn btn-default" id="demo2"><span class="color-fill-icon dropdown-color-fill-icon" style="background-color:#000;"></span>&nbsp;<b class="caret"></b></button>
    </div>
</div>
@endif