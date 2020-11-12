<div id="{{ $component->getDomId('modal-create-footer') }}">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.close') }}</button>
{{-- @todo: very ugly, hotfixed --}}
@if ($component->getForm()->getModel()->canBeCreated(request()))
    <button type="button" class="btn btn-success pull-right" data-ajax-submit-form="{{ $component->getDomIdHash('modal-create') }}"><i class="fa fa-save margin-right-10"></i>{{ $component->translate('button.create') }}</button>
@endif
</div>