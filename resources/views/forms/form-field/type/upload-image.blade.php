<div class="control-group row ajax-overlay">
    {!! $component->render('include.images') !!}
    <div class="btn-group col-xs-12">
        <div class="btn btn-primary fileinput-button col-md-4 col-xs-4">
            <i class="fa fa-upload fa-2x"></i>
        @if ($component->getFormField()->isArray())
            <input type="file" name="{{ $component->getFormField()->getFieldName($index) }}[]" data-upload-url="{{ $component->getFormField()->getForm()->getModel()->getControllerRoute('imageUpload') }}" @if ($component->getOption('attributes.multiple', false)) multiple="multiple" @endif>
        @else
            <input type="file" name="{{ $component->getFormField()->getFieldName() }}[]" data-upload-url="{{ $component->getFormField()->getForm()->getModel()->getControllerRoute('imageUpload') }}" @if ($component->getOption('attributes.multiple', false)) multiple="multiple" @endif>
        @endif
        </div>
        <div class="btn progress progress-file col-md-8 col-xs-8" style="padding: 0;">
            <div class="progress-bar progress-bar-success"></div>
        </div>
    </div>
    <div class="files"></div>
</div>