@can ('create', [ $related, $attribute ])
<a class="btn btn-default btn-sm pull-right" data-ajax-url="{{ $component->getModel()->getControllerRoute('create', $component->getModel()->getRouteRelationParam($attribute, $relation, $related)) }}"><i class="fa fa-plus margin-right-5"></i> {{ $component->translate('model.title.singular') }}</a>
@endcan