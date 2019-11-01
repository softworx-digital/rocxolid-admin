<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.close', false) }}</button>

    <div class="btn-group pull-right">
        <button type="button" class="btn btn-success" data-ajax-submit-form="{{ $component->getDomIdHash('modal-update') }}"><i class="fa fa-save margin-right-10"></i>{{ $component->translate('button.save', false) }}</button>
    @if ($component->getForm()->getModel()->canBeDeleted())
        <button data-dismiss="modal" data-ajax-url="{{ $component->getForm()->getModel()->getControllerRoute('destroyConfirm') }}" class="btn btn-danger"><i class="fa fa-trash margin-right-10"></i>{{ $component->translate('button.delete', false) }}</button>
    @endif
    </div>
</div>