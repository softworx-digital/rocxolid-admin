<div class="row">
@if ($component->getFormField()->isArray())
    <div class="btn-group col-xs-12" data-toggle="buttons">
    <!-- @todo: not supported yet -->
    - TODO -
    </div>
@else
    <div class="btn-group col-xs-12" data-toggle="buttons">
    @foreach ($component->getFormField()->getCollection()->all() as $value => $collection_item)
        @if (is_scalar($collection_item))
        <label class="btn btn-default text-wrap @if ($component->getFormField()->isFieldValue($value)) active @endif" data-toggle-visibility-hide="{{ $component->getDomIdHash($component->getFormField()->getName(), 'other-options') }}">
            {!! Form::radio($component->getFormField()->getFieldName(), $value, $component->getFormField()->isFieldValue($value), $component->getOption('attributes')) !!}
            <span>{!! $collection_item !!}</span>
        </label>
        @else
        <label class="btn btn-default text-wrap @if ($component->getFormField()->isFieldValue($collection_item->id)) active @endif" data-toggle-visibility-hide="{{ $component->getDomIdHash($component->getFormField()->getName(), 'other-options') }}">
            {!! Form::radio($component->getFormField()->getFieldName(), $collection_item->id, $component->getFormField()->isFieldValue($collection_item->id), $component->getOption('attributes')) !!}
            <span>{!! $collection_item->getTitle() !!}</span>
        </label>
        @endif
    @endforeach
        @if ($component->getFormField()->isSelectFieldValue($component->getFormField()->getFieldValue()))
            <label class="btn btn-default text-wrap active" data-toggle-visibility-show="{{ $component->getDomIdHash($component->getFormField()->getName(), 'other-options') }}">
                {!! Form::radio($component->getFormField()->getFieldName(), '', $component->getFormField()->isFieldValue(null)) !!}
                <span>{!! $component->translate(sprintf('_other.%s', $component->getFormField()->getName())) !!}</span>
            </label>
            <div class="btn btn-select animate slideInLeft" id="{{ $component->getDomId($component->getFormField()->getName(), 'other-options') }}">
                {!! Form::select($component->getFormField()->getFieldName(), $component->getFormField()->getSelectCollection(), $component->getFormField()->getFieldValue(), $component->getOption('attributes')) !!}
            </div>
        @else
            <label class="btn btn-default text-wrap" data-toggle-visibility-show="{{ $component->getDomIdHash($component->getFormField()->getName(), 'other-options') }}">
                {!! Form::radio($component->getFormField()->getFieldName(), '', $component->getFormField()->isFieldValue(null)) !!}
                <span>{!! $component->translate(sprintf('_other.%s', $component->getFormField()->getName())) !!}</span>
            </label>
            <div class="btn btn-select animate slideInLeft hidden" id="{{ $component->getDomId($component->getFormField()->getName(), 'other-options') }}">
                {!! Form::select($component->getFormField()->getFieldName(), $component->getFormField()->getSelectCollection(), $component->getFormField()->getFieldValue(), $component->getOption('attributes') + ['disabled']) !!}
            </div>
        @endif
    </div>
@endif
</div>