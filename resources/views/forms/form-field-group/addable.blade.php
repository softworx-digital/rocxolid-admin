<div id="{{ $component->getDomId($component->getFormFieldGroup()->getName()) }}" class="form-field-group form-field-group-addable">
@if ($component->getFormFields())
    <fieldset {!! $component->getHtmlAttributes('wrapper') !!}>
    @if ($component->getOption('wrapper.legend', false))
        <legend>{!! $component->translate($component->getOption('wrapper.legend.title')) !!}</legend>
    @endif
        <div class="sortable" data-sortable-group="{{ $component->getFormFieldGroup()->getName() }}" data-reindex-item=".form-field-group-addable">
        @for ($i = 0; $i < $component->getFormFieldGroup()->getGroupCount(); $i++)
            <div {!! $component->getHtmlAttributes('row') !!}>
                <div class="form-field-group form-inline col-md-10 col-sm-9 col-xs-8">
                @foreach ($component->getFormFields() as $field)
                    {!! $field->render($field->getOption('template', $field->getDefaultTemplateName()), [ 'index' => $i ]) !!}
                @endforeach
                </div>
                <div class="col-md-2 col-sm-3 col-xs-4">
                    <div class="btn-group margin-top-24" role="group">
                        <span class="btn btn-default drag-handle"><i class="fa fa-arrows"></i></span>
                    @if ($i == 0)
                        @if ($component->getOption('button-add', false))
                            {!! $component->getOption('button-add')->setOption('attributes', [
                                'class' => 'btn btn-primary',
                                'data-add-form-field-group' => '.form-field-group-addable',
                                'data-add-form-field-group-container' => '.form-field-group-addable-wrapper > .sortable'
                            ])->render() !!}
                        @endif
                        @if ($component->getOption('button-remove', false))
                            {!! $component->getOption('button-remove')->setOption('attributes', [
                                'class' => 'btn btn-danger hidden',
                                'data-remove-form-field-group' => '.form-field-group-addable',
                                'data-remove-form-field-group-container' => '.form-field-group-addable-wrapper > .sortable',
                            ])->render() !!}
                        @endif
                    @else
                        @if ($component->getOption('button-remove', false))
                            {!! $component->getOption('button-remove')->setOption('attributes', [
                                'class' => 'btn btn-danger',
                                'data-remove-form-field-group' => '.form-field-group-addable',
                                'data-remove-form-field-group-container' => '.form-field-group-addable-wrapper > .sortable',
                            ])->render() !!}
                        @endif
                    @endif
                    </div>
                </div>
            </div>
        @endfor
        </div>
    </fieldset>
@endif
</div>