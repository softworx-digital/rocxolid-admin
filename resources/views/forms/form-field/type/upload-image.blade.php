<div class="control-group row ajax-overlay">
@if ($component->getOption('image-preview', true))
    {!! $component->render('include.images') !!}
@endif
    <div class="btn-group col-xs-12">
        <div class="btn btn-primary fileinput-button col-md-4 col-xs-4">
            <i class="fa fa-upload fa-2x"></i>
            <input
                type="file"
                name="{{ $component->getFormField()->isArray() ? $component->getFormField()->getFieldName($index) : $component->getFormField()->getFieldName() }}[]"
                data-upload-url="{{ $component->getFormField()->getForm()->getModel()->getControllerRoute('imageUpload') }}"
                @if ($component->getOption('attributes.multiple', false)) multiple="multiple" @endif
                @if ($component->getOption('attributes.accept', false)) accept="{{ $component->getOption('attributes.accept') }}" @endif
                @if ($component->getOption('attributes.data-maxsize', false)) data-maxsize="{{ $component->getOption('attributes.data-maxsize') }}" @endif />
        </div>
        <div class="btn progress progress-file col-md-8 col-xs-8" style="padding: 0;">
            <div class="progress-bar progress-bar-success"></div>
        </div>
    </div>
    <div class="files"></div>
</div>