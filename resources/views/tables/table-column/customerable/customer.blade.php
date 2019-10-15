@forelse ($component->getTableColumn()->getRelationItems($component->getOption('model')) as $item)
@if ($item->userCan('read-only'))
    @if ($component->getOption('ajax', false))
        <a class="label label-info" data-ajax-url="{{ $item->getControllerRoute() }}">{{ $item->getNameSurname() }}</a>
    @else
        <a class="label label-info" href="{{ $item->getControllerRoute() }}">{{ $item->getNameSurname() }}</a>
    @endif
@else
    <span class="label label-info">{{ $item->getNameSurname() }}</span>
@endif
@empty
    {{ $component->getOption('model')->getCustomerNameSurname() }}
@endforelse