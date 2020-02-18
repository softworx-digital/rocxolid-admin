@can('view', [ $component->getModel()->$relation()->getRelated(), $attribute ])
<div id="{{ $component->getDomId() }}" class="panel panel-default">
    {!! $component->render('related.panel-heading', [ 'relation' => $relation, 'attribute' => $attribute ]) !!}
    <div class="panel-body">
        {!! $component->render('include.data') !!}
    </div>
    {!! $component->render('related.panel-footer', [ 'relation' => $relation, 'attribute' => $attribute ]) !!}
</div>
@endcan