<div class="btn-group pull-right">
@can ('update', $component->getModel())
    <a href="{{ $component->getModel()->getControllerRoute('edit') }}" class="btn btn-primary"><i class="fa fa-pencil margin-right-10"></i>{{ $component->translate('button.edit') }}</a>
@endcan
{{-- @todo hotfixed, can cause troubles for some entities, since the back screen from delete must be handled differently --}}
@if (false)
@can ('delete', $component->getModel())
    <a data-dismiss="modal" data-ajax-url="{{ $component->getModel()->getControllerRoute('destroyConfirm') }}" class="btn btn-danger"><i class="fa fa-trash margin-right-10"></i>{{ $component->translate('button.delete') }}</a>
@endcan
@endif
</div>