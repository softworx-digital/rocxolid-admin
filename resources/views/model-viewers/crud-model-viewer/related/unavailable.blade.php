@can('view', [ $related, $attribute ])
<div id="{{ $component->getDomId() }}" class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            {{ $component->translate('model.title.singular') }}
        @can('create', [ $related, $attribute ])
            <a data-ajax-url="{{ $component->getModel()->getControllerRoute('create', $component->getModel()->getRouteRelationParam($attribute, $relation, $related)) }}" class="margin-left-5 pull-right" title="{{ $component->translate('button.edit') }}"><i class="fa fa-pencil"></i></a>
        @endcan
        </h3>
    </div>
    <div class="panel-body text-center text-primary">
        <i class="fa fa-info-circle fa-2x text-vertical-align-middle margin-right-5"></i>{{ $component->translate('text.unfilled') }}
    </div>
</div>
@endcan