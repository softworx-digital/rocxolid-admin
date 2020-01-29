@can('view', [ $component->getModel()->$relation()->getRelated(), $attribute ])
<div id="{{ $component->getDomId() }}">
    <h2>
        {{ $component->translate('model.title.singular') }}
    @can('update', [ $component->getModel()->$relation()->getRelated(), $attribute ])
        <a data-ajax-url="{{ $component->getModel()->getControllerRoute('edit', $component->getModel()->getRouteRelationParam($attribute, $relation)) }}" class="margin-left-5"><i class="fa fa-pencil"></i></a>
    @endcan
    </h2>
    <div>
        {!! $component->getModel()->getModelViewerComponent()->render('include.data') !!}
    </div>
</div>
@endcan