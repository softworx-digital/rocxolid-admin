@if ($component->hasItems())
<li @if ($component->isRouteActive()) class="active" @endif>
    <a data-toggle="collapse" data-parent="#sidebar-menu" href="{{ $component->getDomIdHash($section_loop->index, $loop->index, 'sub') }}" @if (!$component->isRouteActive()) class="collapsed" @endif>
        <i class="fa fa-{{ $component->getIcon() }}"></i>
        <span>{{ $component->translate($component->getTitle()) }}</span>
        <i class="fa fa-chevron-down collapse-arrow"></i>
    </a>
    <ul id="{{ $component->getDomId($section_loop->index, $loop->index, 'sub') }}" class="nav collapse @if ($component->isRouteActive()) in @endif">
    @foreach ($component->getItems() as $item)
        <li @if ($item->isRouteActive()) class="active" @endif>
            <a href="{{ $item->getRoute() }}" @if ($item->hasTarget()) target="{{ $item->getTarget() }}" @endif>
                <span>{{ $item->translate($item->getTitle()) }}{{-- {{ sprintf('%s/*', $item->getRoute()) }} --}}</span>
            </a>
        </li>
    @endforeach
    </ul>
</li>
@elseif (method_exists($component, 'getRoute'))
<li @if ($component->isRouteActive()) class="active" @endif>
    <a href="{{ $component->getRoute() }}">
        <i class="fa fa-{{ $component->getIcon() }}"></i>
        <span>{{ $component->translate($component->getTitle()) }}</span>
    </a>
</li>
@endif