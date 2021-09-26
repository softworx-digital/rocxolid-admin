<dl class="dl-horizontal">
@foreach ($component->getModel()->getShowAttributes($except ?? []) as $_attribute => $value)
    <dt>{{ $component->translate(sprintf('field.%s', $_attribute)) }}</dt>
    <dd>
    @if ($component->getModel()->isBooleanAttribute($_attribute))
        @if ($component->getModel()->$_attribute)
            <i class="fa fa-check text-success"></i>
        @else
            <i class="fa fa-close text-danger"></i>
        @endif
    @elseif ($component->getModel()->isJsonArrayAttribute($_attribute))
        @foreach (($component->getModel()->$_attribute ?? []) as $value)
            <span class="label label-default">{{ $value }}</span>
        @endforeach
    @elseif ($component->getModel()->isJsonAttribute($_attribute))
        JSON - // @todo
    @elseif ($component->getModel()->isColorAttribute($_attribute))
        <span class="label" style="background-color: {{ $component->getModel()->$_attribute }};">{{ $component->getModel()->$_attribute }}</span>
    @else
        {!! $component->getModel()->getAttributeViewValue($_attribute) !!}
    @endif
    </dd>
@endforeach
@foreach ($component->getModel()->getRelationshipMethods() as $method)
{{-- @todo ugly, extend blade --}}
@if ((isset($relation) && ($user->can('view', [ $component->getModel()->$relation()->getRelated(), $attribute ]) || $user->can('assign', [ $component->getModel()->$relation()->getRelated(), $attribute ])))
    || $user->can('view', [ $component->getModel(), $method ])
    || $user->can('update', [ $component->getModel(), $method ])
    || $user->can('assign', [ $component->getModel(), $method ]))
    <dt>{{ $component->translate(sprintf('field.%s', $method)) }}</dt>
    <dd>
    @foreach ($component->getModel()->$method()->get() as $item)
        @can ('update', $item)
            <a class="label label-info" data-ajax-url="{{ $item->getControllerRoute() }}">{{ $item->getTitle() }}</a>
        @elsecan('view', $item)
            <span>{{ $item->getTitle() }}</span>
        @elseif (isset($relation) && ($user->can('view', [ $component->getModel()->$relation()->getRelated(), $attribute ]) || $user->can('assign', [ $component->getModel()->$relation()->getRelated(), $attribute ])))
            <span>{{ $item->getTitle() }}</span>
        @endcan
    @endforeach
    </dd>
@endcan
@endforeach
</dl>