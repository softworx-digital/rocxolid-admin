@can ('view', [ $component->getModel()->$relation()->getRelated(), $attribute ])
<div id="{{ $component->getDomId($relation, $attribute) }}" class="panel panel-default">
    {!! $component->render('related.include.panel-heading', [
        'relation' => $relation,
        'attribute' => $attribute,
        'read_only' => $read_only ?? false,
    ]) !!}
    <div class="panel-body">
        {!! $component->render('related.include.panel-body', [
            'relation' => $relation,
            'attribute' => $attribute,
            'read_only' => $read_only ?? false,
        ]) !!}
    </div>
    {!! $component->render('related.include.panel-footer', [
        'relation' => $relation,
        'attribute' => $attribute,
        'read_only' => $read_only ?? false,
    ]) !!}
</div>
@endcan