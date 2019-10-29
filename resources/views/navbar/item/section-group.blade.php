@if ($component->hasItems())
<li>
    <a><i class="fa fa-{{ $component->getIcon() }}"></i> {{ $component->translate($component->getTitlePath(), false) }} <span class="fa fa-chevron-down"></span></a>
    <ul class="nav child_menu">
    @foreach ($component->getItems() as $item)
        <li @if ($item->isRouteActive()) class="active" @endif><a href="{{ $item->getRoute() }}" @if ($item->getTarget()) target="{{ $item->getTarget() }}" @endif>{{ $item->translate($item->getTitlePath(), false) }}{{-- {{ sprintf('%s/*', $item->getRoute()) }} --}}</a></li>
    @endforeach
    </ul>
</li>
@endif