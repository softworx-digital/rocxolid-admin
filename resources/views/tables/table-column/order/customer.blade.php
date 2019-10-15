@forelse ($component->getTableColumn()->getRelationItems($component->getOption('model')) as $item)
@if ($item->userCan('read-only'))
    @if ($component->getOption('ajax', false))
        <strong style="font-size: 16px;"><a class="label label-info" data-ajax-url="{{ $item->getControllerRoute() }}">{{ $item->getNameSurname() }}</a></strong>
    @else
        <strong style="font-size: 16px;"><a class="label label-info" href="{{ $item->getControllerRoute() }}">{{ $item->getNameSurname() }}</a></strong>
    @endif
@else
    <strong style="font-size: 16px;"><span class="label label-info">{{ $item->getNameSurname() }}</span></strong>
@endif
    @if ($item->isCustomerOrderAddressDifferent($component->getOption('model')))
        <i class="fa fa-exclamation-triangle text-danger" title="Našli sa rozdiely v adresách v karte zákazníka a objednávke"></i>
    @endif
@empty
    <strong style="font-size: 16px;">{{ $component->getOption('model')->getCustomerNameSurname() }}</strong>
@endforelse

<address class="margin-top-5 margin-bottom-no">
{!! $component->getOption('model')->getCustomerAddressLabel() !!}
</address>