<div class="control-group">
    {{ Form::file($component->getFormField()->isArray() ? $component->getFormField()->getFieldName($index) : $component->getFormField()->getFieldName(), collect([
        'data-browse-on-zone-click' => 'true',
        'data-show-close' => 'false',
        'data-show-caption' => 'false',
        'data-show-browse' => 'false',
        'data-show-remove' => 'false',
        'data-show-upload' => 'false',
        'data-show-cancel' => 'false',
        'data-allowed-file-types' => $component->getOption('attributes.accept', false) ? sprintf('[%s]', collect($component->getOption('attributes.accept'))->join(',')) : null,
        'accept' => $component->getOption('attributes.accept', false) ? sprintf('%s/*', collect($component->getOption('attributes.accept'))->join('/*,')) : null,
        'multiple' => $component->getOption('attributes.multiple', false) ? 'multiple' : null,
    ])->filter()->toArray()) }}
</div>
{{-- data-upload-url="{{ $component->getFormField()->getForm()->getModel()->getControllerRoute('imageUpload') }}" --}}