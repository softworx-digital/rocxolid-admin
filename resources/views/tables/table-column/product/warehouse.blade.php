@foreach ($component->getTableColumn()->getRelationItems($component->getOption('model')) as $item)
@if ($component->getOption('ajax', false))
    @if ($component->getOption('model')->getPivot($item)->is_check_stock)
        @if ($component->getOption('model')->getPivot($item)->stock_count > $component->getOption('model')->getPivot($item)->stock_count_below_alert)
        <a class="label label-success d-block" data-ajax-url="{{ $item->getControllerRoute() }}" title="Dostatočný počet na sklade">
        @else
        <a class="label label-danger d-block" data-ajax-url="{{ $item->getControllerRoute() }}" title="Nedostatočný počet na sklade (min. {{ $component->getOption('model')->getPivot($item)->stock_count_below_alert }})">
        @endif
            {{ $item->getTitle() }} - {{ $component->getOption('model')->getPivot($item)->stock_count }}
        </a>
    @else
        <a class="label label-success d-block" data-ajax-url="{{ $item->getControllerRoute() }}" title="Dostatočný počet na sklade">{{ $item->getTitle() }} - <i class="fa fa-check"></i></a>
    @endif
@else
    @if ($component->getOption('model')->getPivot($item)->is_check_stock)
        @if ($component->getOption('model')->getPivot($item)->stock_count > $component->getOption('model')->getPivot($item)->stock_count_below_alert)
        <a class="label label-success d-block" href="{{ $item->getControllerRoute() }}" title="Dostatočný počet na sklade">
        @else
        <a class="label label-danger d-block" href="{{ $item->getControllerRoute() }}" title="Nedostatočný počet na sklade (min. {{ $component->getOption('model')->getPivot($item)->stock_count_below_alert }})">
        @endif
            {{ $item->getTitle() }} - {{ $component->getOption('model')->getPivot($item)->stock_count }}
        </a>
    @else
        <a class="label label-success d-block" href="{{ $item->getControllerRoute() }}" title="Dostatočný počet na sklade">{{ $item->getTitle() }} - <i class="fa fa-check"></i></a>
    @endif
@endif
@endforeach