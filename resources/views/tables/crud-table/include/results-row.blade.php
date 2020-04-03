<tr id="{{ $component->getDomId('row', $model->getKey()) }}" class="pointer {{ $model->getRowClass() }} ajax-overlay">
{{-- <td class="a-center"><input type="checkbox" class="flat" name="table_records"></td> --}}
@foreach ($component->getTableColumnsComponents() as $field => $column)
    {!! $column->setPreRenderProperties($component, $model)->setOption('model', $model)->render('table-cell') !!}
@endforeach
@if ($component->getTableButtonsComponents()->count() > 0)
    <td class="last text-right">
        <div class="btn-group">
    @foreach ($component->getTableButtonsComponents() as $button)
        @can ($button->getOption('policy-ability'), $model)
            @if ($button->hasOption('action'))
                {!! $button->setPreRenderProperties($component, $model)->render($button->getOption('type-template')) !!}
            @elseif ($button->hasOption('tel'))
                @if ($model->{$button->getOption('tel')})
                    {!! $button->setPreRenderProperties($component, $model)->render($button->getOption('type-template')) !!}
                @else
                    {!! $button->render('disabled') !!}
                @endif
            @elseif ($button->hasOption('mailto'))
                @if ($model->{$button->getOption('mailto')})
                    {!! $button->setPreRenderProperties($component, $model)->render($button->getOption('type-template')) !!}
                @else
                    {!! $button->render('disabled') !!}
                @endif
            @endif
        @endif
    @endforeach
        </div>
    </td>
@endif
</tr>