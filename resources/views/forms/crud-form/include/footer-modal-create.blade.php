<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.close') }}</button>
    <button type="button" class="btn btn-success pull-right" data-ajax-submit-form="{{ $component->getDomIdHash('modal-create') }}"><i class="fa fa-save margin-right-10"></i>{{ $component->translate('button.create') }}</button>
</div>