@if ($component->hasItems())
<li @if ($component->isRouteActive()) class="active" @endif>
    <a {{-- data-toggle="collapse" --}} href="{{ $component->getDomIdHash($loop->index, 'sub') }}">
        <i class="fa fa-{{ $component->getIcon() }}"></i>
        {{ $component->translate($component->getTitle()) }}
        <span class="fa fa-chevron-right"></span>
        <span class="fa fa-chevron-down"></span>
    </a>
    <ul id="{{ $component->getDomId($loop->index, 'sub') }}" class="nav child_menu">
    @foreach ($component->getItems() as $item)
        <li @if ($item->isRouteActive()) class="active" @endif>
            <a href="{{ $item->getRoute() }}" @if ($item->hasTarget()) target="{{ $item->getTarget() }}" @endif>{{ $item->translate($item->getTitle()) }}{{-- {{ sprintf('%s/*', $item->getRoute()) }} --}}</a>
        </li>
    @endforeach
    </ul>
</li>
@elseif (method_exists($component, 'getRoute'))
<li @if ($component->isRouteActive()) class="active" @endif>
    <a href="{{ $component->getRoute() }}"><i class="fa fa-{{ $component->getIcon() }}"></i> {{ $component->translate($component->getTitle()) }}</a>
</li>
@endif