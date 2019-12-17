<div class="control-group">
@if ($component->getFormField()->isArray())
    <div class="btn-group" data-toggle="buttons">
    @foreach ($component->getFormField()->getCollection()->all() as $value => $collection_item)
        <label class="btn btn-default text-wrap @if ($component->getFormField()->isFieldValue($value, $index)) active @endif">
        @if (is_scalar($value))
            {!! Form::radio($component->getFormField()->getFieldName($index), $value, $component->getFormField()->isFieldValue($value, $index), $component->getOption('attributes')) !!}
            <span>{!! $collection_item !!}</span>
        @else
            {!! Form::radio($component->getFormField()->getFieldName($index), $collection_item->id, $component->getFormField()->isFieldValue($collection_item->id, $index), $component->getOption('attributes')) !!}
            {!! $collection_item->getModelViewerComponent()->render('include.data', [ 'except' => $component->getOption('except-attributes', null) ]) !!}
        @endif
        </label>
    @endforeach
    </div>
@else
    <div class="btn-group" data-toggle="buttons">
    @foreach ($component->getFormField()->getCollection()->all() as $value => $collection_item)
        <label class="btn btn-default text-wrap @if ($component->getFormField()->isFieldValue($value)) active @endif">
        @if (is_scalar($collection_item))
            {!! Form::radio($component->getFormField()->getFieldName(), $value, $component->getFormField()->isFieldValue($value), $component->getOption('attributes')) !!}
            <span>{!! $collection_item !!}</span>
        @else
            {!! Form::radio($component->getFormField()->getFieldName(), $collection_item->id, $component->getFormField()->isFieldValue($collection_item->id), $component->getOption('attributes')) !!}
            {!! $collection_item->getModelViewerComponent()->render('include.data', [ 'except' => $component->getOption('except-attributes', null) ]) !!}
        @endif
        </label>
    @endforeach
    </div>
@endif
</div>