<div class="row">
@if ($component->getFormField()->isArray())
    <div class="btn-group col-xs-12" data-toggle="buttons">
    @foreach ($component->getFormField()->getCollection()->all() as $collection_item)
        <label class="btn btn-default text-wrap col-xs-6">
            <input type="checkbox" name="{{ $component->getFormField()->getFieldName($index) }}" value="{{ $collection_item->id }}"/>
            {!! $collection_item->getModelViewerComponent()->render('include.data', [ 'except' => $component->getOption('except-attributes', null) ]) !!}
        </label>
    @endforeach
    </div>
@else
    <div class="btn-group col-xs-12" data-toggle="buttons">
    @foreach ($component->getFormField()->getCollection()->all() as $collection_item)
        <label class="btn btn-default text-wrap col-xs-6">
            <input type="checkbox" name="{{ $component->getFormField()->getFieldName() }}" value="{{ $collection_item->id }}"/>
            {!! $collection_item->getModelViewerComponent()->render('include.data', [ 'except' => $component->getOption('except-attributes', null) ]) !!}
        </label>
    @endforeach
    </div>
@endif
</div>