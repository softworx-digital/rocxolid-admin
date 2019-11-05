<dl class="dl-horizontal">
@foreach ($component->getModel()->getShowAttributes(isset($except) ? $except : []) as $field => $value)
    <dt>{{ $component->translate(sprintf('field.%s', $field)) }}</dt><dd>{!! $component->getModel()->$field !!}</dd>
@endforeach
@foreach ($component->getModel()->getRelationshipMethods() as $method)
    <dt>{{ $component->translate(sprintf('field.%s', $method)) }}</dt>
    <dd>
    @foreach ($component->getModel()->$method()->get() as $item)
        @if ($item->userCan('read-only'))
            <a class="label label-info" data-ajax-url="{{ $item->getControllerRoute() }}">{{ $item->getTitle() }}</a>
        @else
            <span class="label label-info">{{ $item->getTitle() }}</span>
        @endif
    @endforeach
    </dd>
@endforeach
</dl>