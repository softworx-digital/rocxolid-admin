@can('view', [ $component->getModel()->$relation()->getRelated(), $attribute ])
<div id="{{ $component->getDomId() }}" class="panel panel-default">
    {!! $component->getModel()->getModelViewerComponent()->render('related.panel-heading', [ 'relation' => $relation, 'attribute' => $attribute ]) !!}
    <div class="panel-body">
        {!! $component->getModel()->getModelViewerComponent()->render('include.data') !!}
    </div>
    {!! $component->getModel()->getModelViewerComponent()->render('related.panel-footer', [ 'relation' => $relation, 'attribute' => $attribute ]) !!}
</div>
@endcan