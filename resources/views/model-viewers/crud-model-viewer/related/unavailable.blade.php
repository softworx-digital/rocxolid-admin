@can('view', [ $related, $attribute ])
<div id="{{ $component->getDomId() }}">
    <h2>
        {{ $component->translate('model.title.singular') }}
    @can('create', [ $related, $attribute ])
        <a data-ajax-url="{{ $component->getModel()->getControllerRoute('create', $component->getModel()->getRouteRelationParam($attribute, $relation, $related)) }}" class="margin-left-5"><i class="fa fa-pencil"></i></a>
    @endcan
    </h2>
    <div class="alert alert-info text-center">
        <i class="fa fa-info-circle fa-2x text-vertical-align-middle margin-right-5"></i>
        {{ $component->translate('text.unfilled') }}
    </div>
</div>
@endcan