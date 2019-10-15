<div class="text-center">
@if ($component->getOption('model')->{$component->getTableColumn()->getName()})
    <i class="fa fa-check-square-o text-success fa-2x"></i>
@else
    <i class="fa fa-square text-muted fa-2x"></i>
@endif
</div>