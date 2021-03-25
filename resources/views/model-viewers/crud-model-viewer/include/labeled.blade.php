<dl class="dl-horizontal">
@foreach ($component->getModel()->getShowAttributes($except ?? []) as $attribute => $value)
    <dt>{{ $component->translate(sprintf('field.%s', $attribute)) }}</dt>
    <dd>
    @if ($component->getModel()->isBooleanAttribute($attribute))
        @if ($component->getModel()->$attribute)
            <i class="fa fa-check text-success"></i>
        @else
            <i class="fa fa-close text-danger"></i>
        @endif
    @elseif ($component->getModel()->isJsonAttribute($attribute))
        JSON - // @todo
    @elseif ($component->getModel()->isColorAttribute($attribute))
        <span class="label" style="background-color: {{ $component->getModel()->$attribute }};">{{ $component->getModel()->$attribute }}</span>
    @else
        {!! $component->getModel()->getAttributeViewValue($attribute) !!}
    @endif
    </dd>
@endforeach
@foreach ($component->getModel()->getRelationshipMethods() as $method)
@canany(['view', 'update', 'assign' ], [ $component->getModel(), $method ])
    <dt>{{ $component->translate(sprintf('field.%s', $method)) }}</dt>
    <dd>
    @foreach ($component->getModel()->$method()->get() as $item)
        @can ('update', $item)
            <a class="label label-info" data-ajax-url="{{ $item->getControllerRoute() }}">{{ $item->getTitle() }}</a>
        @elsecan('view', $item)
            <span class="label label-info">{{ $item->getTitle() }}</span>
        @endcan
    @endforeach
    </dd>
@endcan
@endforeach
</dl>