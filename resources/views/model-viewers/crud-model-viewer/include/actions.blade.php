<div class="btn-group pull-right">
@can ('update', $component->getModel())
    <a href="{{ $component->getModel()->getControllerRoute('edit') }}" class="btn btn-primary"><i class="fa fa-pencil margin-right-10"></i>{{ $component->translate('button.edit') }}</a>
@endcan
</div>