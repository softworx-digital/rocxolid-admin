@if ($component->hasItems())
<li @if ($component->isRouteActive()) class="active" @endif>
    <a><i class="fa fa-{{ $component->getIcon() }}"></i> {{ $component->translate($component->getTitle(), false) }}<span class="fa fa-chevron-right"></span><span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    @foreach ($component->getItems() as $item)
        <li @if ($item->isRouteActive()) class="active" @endif><a href="{{ $item->getRoute() }}" @if ($item->hasTarget()) target="{{ $item->getTarget() }}" @endif>{{ $item->translate($item->getTitle(), false) }}{{-- {{ sprintf('%s/*', $item->getRoute()) }} --}}</a></li>
    @endforeach
    </ul>
</li>
@endif