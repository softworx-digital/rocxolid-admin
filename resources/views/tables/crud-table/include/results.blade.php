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
                {!! $component->render('include.results-row', [ 'model' => $model ]) !!}
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="pull-right">
        {{ $component->getRepository()->getPaginator()->links($component->getPaginationLinksViewPath()) }}
    </div>
</div>