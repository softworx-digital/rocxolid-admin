<div class="control-group row">
@if ($component->getFormField()->isArray())
    <div class="btn-group btn-group-justified col-xs-12" data-toggle="buttons" {!! $component->getHtmlAttributes() !!}>
    @foreach ($component->getFormField()->getCollection()->all() as $value => $item)
        @if (is_scalar($value))
        <label class="btn btn-default text-wrap col-md-4 col-xs-12 @if ($component->getFormField()->isFieldValue($value, $index)) active @endif">
            {!! Form::radio($component->getFormField()->getFieldName($index), $value, $component->getFormField()->isFieldValue($value, $index), $component->getOption('attributes')) !!}
            <span>{!! $item !!}</span>
        @else
        <label class="btn btn-default text-wrap col-md-4 col-xs-12 @if ($component->getFormField()->isFieldValue($item->getKey(), $index)) active @endif">
            {!! Form::radio($component->getFormField()->getFieldName($index), $item->getKey(), $component->getFormField()->isFieldValue($item->getKey(), $index), $component->getOption('attributes')) !!}
            {!! $item->getModelViewerComponent()->render('include.data', [ 'except' => $component->getOption('except-attributes', null) ]) !!}
        @endif
        </label>
    @endforeach
    </div>
@else
    <div class="btn-group btn-group-justified col-xs-12" data-toggle="buttons" {!! $component->getHtmlAttributes() !!}>
    @foreach ($component->getFormField()->getCollection()->all() as $value => $item)
        @if (is_scalar($item))
        <label class="btn btn-default text-wrap @if ($component->getFormField()->isFieldValue($value)) active @endif">
            {!! Form::radio($component->getFormField()->getFieldName(), $value, $component->getFormField()->isFieldValue($value), $component->getOption('attributes')) !!}
            <span>{!! $item !!}</span>
        </label>
        @else
        <label class="btn btn-default text-wrap @if ($component->getFormField()->isFieldValue($item->getKey())) active @endif">
            {!! Form::radio($component->getFormField()->getFieldName(), $item->getKey(), $component->getFormField()->isFieldValue($item->getKey()), $component->getOption('attributes')) !!}
            {!! $item->getModelViewerComponent()->render($component->getOption('collection-item-template'), [ 'except' => $component->getOption('except-attributes', null) ]) !!}
        @endif
        </label>
    @endforeach
    </div>
@endif
</div>