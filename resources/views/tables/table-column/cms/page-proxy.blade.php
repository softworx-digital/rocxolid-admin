@if ($component->getTableColumn()->hasModelUrl($component->getOption('model')))
    <a href="{{ $component->getTableColumn()->getModelUrl($component->getOption('model')) }}" target="_blank"><i class="fa fa-external-link margin-right-5"></i>{{ $component->getTableColumn()->getModelUrl($component->getOption('model')) }}</a>
@else
@forelse ($component->getTableColumn()->getRelationItems($component->getOption('model')) as $item)
    @if ($item->userCan('read-only'))
        <a class="label label-info" data-ajax-url="{{ $item->getControllerRoute() }}">
    @else
        <span class="label label-info">
    @endif
        {!! $item->getTitle() !!}
    @if ($item->userCan('read-only'))
        </a>
    @else
        </span>
    @endif
@empty
<i class="fa fa-exclamation-triangle text-danger" title="@lang('rocXolid::general.text.undefined')"></i>
@endforelse
@endif