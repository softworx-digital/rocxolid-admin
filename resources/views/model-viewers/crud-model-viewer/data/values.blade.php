@foreach ($attributes as $attribute)
@if ($component->getModel()->isRelationAttribute($attribute))
    {!! optional($component->getModel()->getRelationAttributeModel($attribute))->getModelViewerComponent()->render('snippet.label') !!}
@elseif ($component->getModel()->isBooleanAttribute($attribute))
    {!! $component->getModel()->$attribute ? '<i class="fa fa-check"></i>' : '<i class="fa fa-close"></i>' !!}
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
@endforeach