@can ('update', $component->getOption('model'))
<div class="text-center">
    <a {!! $component->getHtmlAttributes() !!}>
    @if ($component->getOption('model')->{$component->getTableColumn()->getName()})
        <i class="fa fa-check-square-o text-success fa-2x"></i>
    @else
        <i class="fa fa-power-off text-danger fa-2x"></i>
    @endif
    </a>
</div>
@else
{!! $component->render('flag') !!}
@endcan