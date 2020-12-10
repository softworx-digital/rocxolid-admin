<div class="row masonry-panel-container masonry-panel-container-four-column">
@foreach ($component->getFormField()->getCollection() as $item)
    <div class="padding-10">
        <ul class="list-group btn-group-vertical width-100" data-toggle="buttons">
            <label class="list-group-item btn text-wrap text-left @if ($component->getFormField()->isFieldValue($item->getKey())) active @endif">
                {!! Form::checkbox(
                    $component->getFormField()->getFieldName(),
                    $item->getKey(),
                    $component->getFormField()->isFieldValue($item->getKey()),
                    $component->getOption('attributes')
                ) !!}
                <span class="margin-left-5 title">{{ $item->getTitle() }}</span>
            </label>
        </ul>
    </div>
@endforeach
</div>