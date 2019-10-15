@if ($component->hasSubItems())
<div class="menu_section">
    <h3>{{ $component->translate(sprintf('%s._heading', $component->getTitlePath()), false) }}</h3>
@if ($component->hasItems())
    <ul class="nav side-menu">
    @foreach ($component->getItems() as $item)
        {!! $item->render('section-group') !!}
    @endforeach
    </ul>
@endif
</div>
@endif