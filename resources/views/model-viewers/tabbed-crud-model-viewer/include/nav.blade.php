<ul class="nav nav-tabs nav-justified">
@foreach ($component->tabs() as $_tab)
    <li role="presentation" @if (($component->isDefaultTab($_tab) && !isset($tab)) || ($tab === $_tab))class="active"@endif>
        <a @if ($ajax ?? false) data-ajax-url="{{ $component->tabRoute($_tab, [], true) }}"@else href="{{ $component->tabRoute($_tab) }}"@endif>{!! $component->tabTitle($_tab) !!}</a>
    </li>
@endforeach
</ul>