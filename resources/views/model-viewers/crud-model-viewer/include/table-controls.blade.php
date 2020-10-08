
<div class="col-md-4 col-xs-12 text-right">
@can ('create', $component->getModel())
    <a class="btn btn-primary margin-top-10" href="{{ $component->getModel()->getControllerRoute('create') }}"><i class="fa fa-plus margin-right-5"></i> {{ $component->translate('model.title.singular') }}</a>
@endcan
</div>