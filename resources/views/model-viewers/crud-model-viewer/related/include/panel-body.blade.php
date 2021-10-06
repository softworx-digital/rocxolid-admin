{!! $component->render('include.data', [
    'relation' => $relation,
    'attribute' => $attribute,
    'read_only' => $read_only ?? false,
]) !!}