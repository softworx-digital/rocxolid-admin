<div class="panel-heading">
    <h3 class="panel-title">
        {{ $component->translate('model.title.singular') }}
    @can('update', [ $component->getModel()->$relation()->getRelated(), $attribute ])
        <a data-ajax-url="{{ $component->getModel()->getControllerRoute('edit', $component->getModel()->getRouteRelationParam($attribute, $relation)) }}" class="margin-left-5 pull-right" title="{{ $component->translate('button.edit') }}"><i class="fa fa-pencil"></i></a>
    @endcan
    </h3>
</div>