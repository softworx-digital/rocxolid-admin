@can ('view', [ $component->getModel()->$relation()->getRelated(), $attribute ])
<div id="{{ $component->getDomId($relation, $attribute) }}" class="panel panel-default">
    {!! $component->render('related.panel-heading', [
        'relation' => $relation,
        'attribute' => $attribute,
        'read_only' => $read_only ?? false,
    ]) !!}
    <div class="panel-body">
        {!! $component->render('include.data', [
            'relation' => $relation,
            'attribute' => $attribute,
            'read_only' => $read_only ?? false,
        ]) !!}
    </div>
    {!! $component->render('related.panel-footer', [
        'relation' => $relation,
        'attribute' => $attribute,
        'read_only' => $read_only ?? false,
    ]) !!}
</div>
@endcan