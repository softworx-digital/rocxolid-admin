@if ($component->hasSubItems())
<div class="menu_section">
    <h3>{{ $component->translate($component->getTitle()) }}</h3>
    @if ($component->hasItems())
    <ul class="nav side-menu">
    @foreach ($component->getItems() as $item)
        {!! $item->render('section-group') !!}
    @endforeach
    </ul>
    @endif
</div>
@elseif ($component->hasItems())
<div class="menu_section">
    <h3>{{ $component->translate($component->getTitle()) }}</h3>
    @if ($component->hasItems())
    <ul class="nav side-menu">
    @foreach ($component->getItems() as $item)
        {!! $item->render('section-group') !!}
    @endforeach
    </ul>
@endif
</div>
@endif