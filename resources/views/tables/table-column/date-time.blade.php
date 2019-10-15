@if ($component->getModelValue())
    {{ \Carbon\Carbon::parse($component->getModelValue())->format($component->getOption('format')) }}
@else
    <i class="fa fa-circle-o"></i>
@endif