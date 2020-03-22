@if ($component->getOption('orderable', false))
@if ($component->getTableColumn()->getRepository()->isOrderColumn($component->getTableColumn()))
    <th class="column-title text-center ordered-by" @if ($component->getOption('width', false)) style="width: {{ $component->getOption('width') }}px;" @endif>
    @if ($component->getTableColumn()->getRepository()->isOrderDirection('asc'))
        <i class="fa fa-caret-up margin-right-10"></i>
    @else
        <i class="fa fa-caret-down margin-right-10"></i>
    @endif
        <a data-ajax-url="{{ $component->getOrderRoute() }}">{!! $component->translate($component->getOption('label.title')) !!}</a>
    </th>
@else
    <th class="column-title text-center" @if ($component->getOption('width', false)) style="width: {{ $component->getOption('width') }}px;" @endif>
        <a data-ajax-url="{{ $component->getOrderRoute() }}">{!! $component->translate($component->getOption('label.title')) !!}</a>
    </th>
@endif
@else
<th class="column-title text-center" @if ($component->getOption('width', false)) style="width: {{ $component->getOption('width') }}px;" @endif>
    {!! $component->translate($component->getOption('label.title')) !!}
</th>
@endif