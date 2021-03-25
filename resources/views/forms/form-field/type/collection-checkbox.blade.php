<div class="row">
@foreach ($component->getFormField()->getCollection() as $id => $title)
    <label {!! $component->getHtmlAttributes('label.collection') !!}>
        {!! Form::checkbox($component->getFormField()->getFieldName(), $id, $component->getFormField()->isFieldValue($id), $component->getOption('attributes')) !!}
        <span class="margin-left-10">{{ $title }}</span>
    </label>
@endforeach
</div>