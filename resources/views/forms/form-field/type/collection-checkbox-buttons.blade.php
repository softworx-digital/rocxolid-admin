<div class="row">
    <ul id="{{ $component->getDomId('append-custom-value-target', $component->getFormField()->getName()) }}" class="list-group btn-group-vertical col-xs-12" data-toggle="buttons">
    @foreach ($component->getFormField()->getCollection() as $id => $title)
        <label class="list-group-item btn text-wrap text-left @if ($component->getFormField()->isFieldValue($id)) active @endif">
            {!! Form::checkbox($component->getFormField()->getFieldName(), $id, $component->getFormField()->isFieldValue($id), $component->getOption('attributes')) !!}
            <span class="margin-left-5 title">{{ $title }}</span>
        </label>
    @endforeach
@if ($component->getOption('enable-custom-values'))
    @foreach ($component->getFormField()->getCustomValues() as $title)
        <label class="list-group-item btn text-wrap text-left @if ($component->getFormField()->isFieldValue($title)) active @endif">
            {!! Form::checkbox($component->getFormField()->getFieldName(), $title, $component->getFormField()->isFieldValue($title), $component->getOption('attributes')) !!}
            <div class="row">
                <div class="col-xs-11">
                    <span class="margin-left-5 title">{{ $title }}</span>
                </div>
                <div class="col-xs-1">
                    <button class="btn btn-danger btn-xs pull-right" title="{{ $component->translate('_remove') }}" data-remove-parent=".list-group-item"><i class="fa fa-minus"></i></button>
                </div>
            </div>
        </label>
    @endforeach
        <label class="list-group-item btn text-wrap text-left append-template hidden">
            {!! Form::checkbox($component->getFormField()->getFieldName(), null, true, $component->getOption('attributes') + [ 'disabled' => true ]) !!}
            <div class="row">
                <div class="col-xs-11">
                    <span class="margin-left-5 title"></span>
                </div>
                <div class="col-xs-1">
                    <button class="btn btn-danger btn-xs pull-right" title="{{ $component->translate('_remove') }}" data-remove-parent=".list-group-item"><i class="fa fa-minus"></i></button>
                </div>
            </div>
        </label>
        <div class="list-group-item no-top-border">
            <div class="row">
                <div class="col-xs-11">
                    {!! Form::text(null, null, [ 'id' => $component->getDomId('append-custom-value', $component->getFormField()->getName()), 'class' => 'form-control input-sm no-border no-shadow', 'placeholder' => $component->translate('_custom-value') ]) !!}
                </div>
                <div class="col-xs-1">
                    <button
                        class="btn btn-primary btn-xs pull-right"
                        title="{{ $component->translate('_add') }}"
                        data-append-custom-value="{{ $component->getDomIdHash('append-custom-value', $component->getFormField()->getName()) }}"
                        data-append-custom-value-target="{{ $component->getDomIdHash('append-custom-value-target', $component->getFormField()->getName()) }}"
                    ><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
@endif
    </ul>
</div>