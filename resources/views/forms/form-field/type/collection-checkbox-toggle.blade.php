@foreach ($component->getFormField()->getCollection() as $id => $title)
<div class="form-group">
        {!! Form::checkbox($component->getFormField()->getFieldName(), $id, $component->getFormField()->isFieldValue($id), $component->getOption('attributes')) !!}
    @if ($component->getOption('label.collection', false) && $component->getOption('label.collection.after', false))
        <label {!! $component->getHtmlAttributes('label.collection') !!}>
            {{ $title }}
        </label>
    @endif
</div>
@endforeach