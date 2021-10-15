<dl class="dl-horizontal">
@foreach ($attributes as $attribute)
    <dt>{{ $component->translate(sprintf('field.%s', $attribute)) }}</dt>
    <dd>
    @if ($component->getModel()->isRelationAttribute($attribute))
        @if ($component->getModel()->$attribute instanceof \Traversable)
            <ul class="list-inline margin-0">
            @foreach ($component->getModel()->$attribute as $item)
                <li class="padding-0">{!! $item->getModelViewerComponent()->render('snippet.label') !!}</li>
            @endforeach
            </ul>
        @elseif ($component->getModel()->$attribute)
            {!! optional($component->getModel()->getRelationAttributeModel($attribute))->getModelViewerComponent()->render('snippet.label') !!}
        @else
            <i class="fa fa-circle-o"></i>
        @endif
    @elseif ($component->getModel()->isBooleanAttribute($attribute))
        <i class="fa {{ $component->getModel()->$attribute ? 'fa-check text-success' : 'fa-close text-danger' }}"></i>
    @elseif ($component->getModel()->isJsonArrayAttribute($attribute))
        @foreach (($component->getModel()->$attribute ?? []) as $value)
            <span class="label label-default">{{ $value }}</span>
        @endforeach
    @elseif ($component->getModel()->isJsonAttribute($attribute))
        JSON - // @todo
    @elseif ($component->getModel()->isColorAttribute($attribute))
        <span class="label" style="background-color: {{ $component->getModel()->$attribute }};">{{ $component->getModel()->$attribute }}</span>
    @else
        {!! $component->getModel()->getAttributeViewValue($attribute) !!}
    @endif
    </dd>
@endforeach
</dl>