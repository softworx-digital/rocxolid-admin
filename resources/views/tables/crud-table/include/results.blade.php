<div id="{{ $component->getDomId('results') }}">
@if ($component->getTableFiltersComponents()->count())
    {!! $component->render('include.filter') !!}
@endif

    <div class="table-responsive">
        <table class="table table-crud table-striped jambo_table bulk_action @if (isset($no_margin)) margin-bottom-0 @endif">
            <thead>
                <tr class="headings">
                {{-- <th class="check"><input type="checkbox" id="check-all" class="flat"></th> --}}
                @foreach ($component->getTableColumnsComponents() as $field => $column)
                    {!! $column->render('table-head') !!}
                @endforeach
                @if ($component->getTableButtonsComponents()->count() > 0)
                    <th class="column-title no-link last" style="width: {{ ($component->getTableButtonsComponents()->count() * 34) + 20 }}px;">&nbsp;</th>
                @endif
                {{-- <th class="bulk-actions" colspan="7"><a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a></th>--}}
                </tr>
            </thead>
            <tbody>
            @foreach ($component->getTable()->getData() as $i => $model)
                {!! $component->render('include.results-row', [ 'model' => $model ]) !!}
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="pull-right">
        {{ $component->getTable()->getData()->links($component->getPaginationLinksViewPath()) }}
    </div>
</div>