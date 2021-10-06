<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
    <input class="form-control datetimepicker" name="{{ $component->getFormField()->getFieldName() }}" value="{{ $component->getFormField()->getFieldValue() ? Carbon\Carbon::parse($component->getFormField()->getFieldValue())->format('j.n.Y H:i') : '' }}" @if ($component->hasOption('attributes.placeholder')) placeholder="{{ $component->getOption('attributes.placeholder') }}" @endif>
</div>