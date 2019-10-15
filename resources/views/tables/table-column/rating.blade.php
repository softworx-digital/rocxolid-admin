<div class="text-center">
@for ($i = 1; $i <= $component->getModelValue(); $i++)
    @if ($component->getModelValue() < (($component->getOption('max', $component->getModelValue()) / 4)))
        <i class="fa fa-star text-danger fa-2x"></i>
    @elseif ($component->getModelValue() < (($component->getOption('max', $component->getModelValue()) / 4) * 2))
        <i class="fa fa-star text-warning fa-2x"></i>
    @elseif ($component->getModelValue() < (($component->getOption('max', $component->getModelValue()) / 4) * 3))
        <i class="fa fa-star text-primary fa-2x"></i>
    @else
        <i class="fa fa-star text-success fa-2x"></i>
    @endif
@endfor
@for ($j = $i; $j <= $component->getOption('max', 0); $j++)
    @if ($component->getModelValue() < (($component->getOption('max', $component->getModelValue()) / 4)))
        <i class="fa fa-star-o text-danger fa-2x"></i>
    @elseif ($component->getModelValue() < (($component->getOption('max', $component->getModelValue()) / 4) * 2))
        <i class="fa fa-star-o text-warning fa-2x"></i>
    @elseif ($component->getModelValue() < (($component->getOption('max', $component->getModelValue()) / 4) * 3))
        <i class="fa fa-star-o text-primary fa-2x"></i>
    @else
        <i class="fa fa-star-o text-success fa-2x"></i>
    @endif
@endfor
</div>