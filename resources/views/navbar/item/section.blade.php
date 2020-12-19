@if ($component->hasItems() || $component->hasSubItems())
<div class="menu-section">
    <h3 class="margin-0">{{ $component->translate($component->getTitle()) }}</h3>
    @if ($component->hasItems())
    <ul class="nav side-menu">
    @foreach ($component->getItems() as $item)
        {!! $item->render('section-group', [ 'section_loop' => $section_loop, 'loop' => $loop ]) !!}
    @endforeach
    </ul>
    @endif
</div>
@endif