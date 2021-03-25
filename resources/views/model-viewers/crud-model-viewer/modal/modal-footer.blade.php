<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.close') }}</button>
    <div class="btn-group" role="group">
    @if (($display_show_button ?? true) && $user->can('view', $component->getModel()))
        <a href="{{ $component->getModel()->getControllerRoute('show') }}" class="btn btn-info"><i class="fa fa-eye margin-right-10"></i>{{ $component->translate('button.show') }}</a>
    @endif
    @if (($display_edit_button ?? false) && $user->can('update', $component->getModel()))
        <a href="{{ $component->getModel()->getControllerRoute('edit') }}" class="btn btn-primary"><i class="fa fa-pencil margin-right-10"></i>{{ $component->translate('button.edit') }}</a>
    @endif
    </div>
</div>