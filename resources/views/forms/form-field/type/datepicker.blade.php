<div class="control-group row">
    <div class="col-xs-12 xdisplay_inputx form-group has-feedback">
        <input class="form-control has-feedback-left datepicker" name="{{ $component->getFormField()->getFieldName() }}" value="{{ Carbon\Carbon::parse($component->getFormField()->getFieldValue())->format('j.n.Y') }}">
        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
    </div>
</div>