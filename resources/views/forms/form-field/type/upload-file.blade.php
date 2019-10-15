<div class="control-group row ajax-overlay">
    {!! $component->render('include.files') !!}
    <div class="col-xxl-3 col-xs-4">
        <span class="btn btn-primary fileinput-button col-xs-12">
            <i class="fa fa-upload fa-2x"></i>
        @if ($component->getFormField()->isArray())
            <input type="file" name="{{ $component->getFormField()->getFieldName($index) }}[]" data-upload-url="{{ $component->getFormField()->getForm()->getModel()->getControllerRoute('fileUpload') }}" @if ($component->getOption('attributes.multiple', false)) multiple="multiple" @endif>
        @else
            <input type="file" name="{{ $component->getFormField()->getFieldName() }}[]" data-upload-url="{{ $component->getFormField()->getForm()->getModel()->getControllerRoute('fileUpload') }}" @if ($component->getOption('attributes.multiple', false)) multiple="multiple" @endif>
        @endif
        </span>
    </div>
    <div class="col-xxl-9 col-xs-8">
        <div class="progress progress-file">
            <div class="progress-bar progress-bar-success"></div>
        </div>
    </div>
    <div class="files"></div>
</div>