<div id="{{ $component->getDomId('modal-create-footer') }}">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal" tabindex="-1"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.close') }}</button>
{{-- @todo very ugly, hotfixed --}}
@if ($component->getForm()->getModel()->canBeCreated(request()))
<div class="btn-group submit-actions pull-right">
    <button type="button" class="btn btn-success" data-ajax-submit-form="{{ $component->getDomIdHash('modal-create') }}" data-submit-action="submit" tabindex="-1"><i class="fa fa-save margin-right-10"></i>{{ $component->translate('button.create') }}</button>
    <button type="button" class="btn btn-success" data-ajax-submit-form="{{ $component->getDomIdHash('modal-create') }}" data-submit-action="submit-new"><i class="fa fa-save margin-right-10"></i>{{ $component->translate('button.create-new') }}<i class="fa fa-chevron-right margin-left-10"></i></button>
</div>
@endif
</div>