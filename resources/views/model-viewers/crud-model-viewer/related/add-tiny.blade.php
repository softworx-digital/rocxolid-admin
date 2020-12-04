@can ('create', [ $related, $attribute ])
<a class="pull-right margin-left-5" data-ajax-url="{{ $component->getModel()->getControllerRoute('create', $component->getModel()->getRouteRelationParam($attribute, $relation, $related)) }}" title="{{ $component->translate('button.create') }}"><i class="fa fa-plus"></i></a>
@endcan