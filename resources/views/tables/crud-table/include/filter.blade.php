{{ Form::open([ 'id' => $component->getDomId('filter'), 'class' => 'autosubmit', 'url' => $component->getRepository()->getRoute('filter') ]) }}
    {{ Form::hidden('_method', 'POST') }}

    <fieldset class="row">
    @foreach ($component->getTableFiltersComponents() as $field => $filter)
        {!! $filter->render('table-filter') !!}
    @endforeach
        <div class="col-md-1 col-sm-2 col-xs-4 btn-group pull-right">
            <button type="button" class="btn btn-primary col-xs-6" data-ajax-submit-form="{{ $component->getDomIdHash('filter') }}" title="{{ $component->translate('filter-button.filter') }}"><i class="fa fa-search"></i></button>
            <button type="reset" class="btn btn-danger col-xs-6" data-ajax-submit-form="{{ $component->getDomIdHash('filter') }}" title="{{ $component->translate('filter-button.clear') }}"><i class="fa fa-remove"></i></button>
        </div>
    </fieldset>
{{ Form::close() }}