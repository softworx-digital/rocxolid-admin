<div id="{{ $component->getDomId('results') }}">
@if ($component->getTableFiltersComponents()->count())
    {!! $component->render('include.filter') !!}
@endif

    <div class="table-responsive">
        <table class="table table-crud table-striped jambo_table bulk_action">
            <thead>
                <tr class="headings">
                {{-- <th class="check"><input type="checkbox" id="check-all" class="flat"></th> --}}
                @foreach ($component->getTableColumnsComponents() as $field => $column)
                    {!! $column->render('table-head') !!}
                @endforeach
                @if ($component->getTableButtonsComponents()->count() > 0)
                    <th class="column-title no-link last">&nbsp;</th>
                @endif
                {{-- <th class="bulk-actions" colspan="7"><a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a></th>--}}
                </tr>
            </thead>
            <tbody>
            @foreach ($component->getRepository()->paginate($component->getRepository()->getPageLimit()) as $i => $model)
                <tr class="pointer {{ $model->getRowClass() }}">
                {{-- <td class="a-center"><input type="checkbox" class="flat" name="table_records"></td> --}}
                @foreach ($component->getTableColumnsComponents() as $field => $column)
                    {!! $column->setOption('model', $model)->render('table-cell') !!}
                @endforeach
                @if ($component->getTableButtonsComponents()->count() > 0)
                    <td class="last text-right">
                        <div class="btn-group">
                    @foreach ($component->getTableButtonsComponents() as $button)
                        @if ($button->hasOption('controller-method'))
                            @if ($component->getRepository()->getController()->isModelActionAvailable($model, $button->getOption('controller-method')))
                                {!! $button->setPreRenderProperties($component, $model)->render($button->getOption('type-template')) !!}
                            @else
                                {!! $button->render('disabled') !!}
                            @endif
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
                    @endforeach
                        </div>
                    </td>
                @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="pull-right">
        {{ $component->getRepository()->getPaginator()->links($component->getPaginationLinksViewPath()) }}
    </div>
</div>