{{-- @todo "hotfixed" --}}
<div id="{{ $component->getDomId('modal-update-footer') }}">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.close') }}</button>

    <div class="btn-group pull-right">
    @if ($component->getForm()->hasButtons() && $user->can('update', $component->getForm()->getModel()))
        <button type="button" class="btn btn-primary" data-ajax-submit-form="{{ $component->getDomIdHash('modal-update') }}"><i class="fa fa-refresh margin-right-10"></i>{{ $component->translate('button.submit-reload') }}</button>
    @endcan
    </div>
</div>