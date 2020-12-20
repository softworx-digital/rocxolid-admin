<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.close') }}</button>
    <div class="btn-group" role="group">
    @can ('view', $component->getModel())
        <a href="{{ $component->getModel()->getControllerRoute('show') }}" class="btn btn-default"><i class="fa fa-eye margin-right-10"></i>{{ $component->translate('button.show') }}</a>
    @endcan
    {{-- @can ('update', $component->getModel())
        <a href="{{ $component->getModel()->getControllerRoute('edit') }}" class="btn btn-primary"><i class="fa fa-pencil margin-right-10"></i>{{ $component->translate('button.edit') }}</a>
    @endcan --}}
    </div>
</div>