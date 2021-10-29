@can ('create', [ $related, $attribute ])
    <a class="btn btn-{{ $color ?? 'primary' }} btn-{{ $display ?? 'block' }} btn-{{ $size ?? 'lg' }}" data-ajax-url="{{ $component->getModel()->getControllerRoute('create', $component->getModel()->getRouteRelationParam($attribute, $relation, $related) + ($params ?? [])) }}"><i class="fa fa-plus margin-right-10"></i>{{ $component->translate('model.title.singular') }}</a>
@endcan