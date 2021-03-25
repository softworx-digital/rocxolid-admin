@if ($component->getModelValue())
    <i class="fa fa-calendar margin-right-5"></i>{{ $component->getModelAttributeViewValue() }}
@else
    <i class="fa fa-circle-o"></i>
@endif