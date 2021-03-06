<div class="panel-heading">
    <h3 class="panel-title">
        {{ $component->translate('model.title.singular') }}
    @if (!($read_only ?? false) && $user->can('update', [ $component->getModel()->$relation, $attribute ]))
        <a data-ajax-url="{{ $component->getModel()->getControllerRoute('edit', $component->getModel()->getRouteRelationParam($attribute, $relation)) }}" class="margin-left-5 pull-right" title="{{ $component->translate('button.edit') }}"><i class="fa fa-pencil"></i></a>
    @endif
    </h3>
</div>