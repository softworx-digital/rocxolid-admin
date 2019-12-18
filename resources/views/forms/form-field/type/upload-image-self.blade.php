@if (false)
<div class="control-group row ajax-overlay">
    <div class="col-xxl-3 col-xs-4">
        <span class="btn btn-primary fileinput-button col-xs-12">
            <i class="fa fa-upload fa-2x"></i>
        @if ($component->getFormField()->isArray())
            <input type="file" name="{{ $component->getFormField()->getFieldName($index) }}[]" data-upload-url="{{ $component->getFormField()->getForm()->getModel()->getControllerRoute('imageUpload') }}" @if ($component->getOption('attributes.multiple', false)) multiple="multiple" @endif>
        @else
            <input type="file" name="{{ $component->getFormField()->getFieldName() }}[]" data-upload-url="{{ $component->getFormField()->getForm()->getModel()->getControllerRoute('imageUpload') }}" @if ($component->getOption('attributes.multiple', false)) multiple="multiple" @endif>
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
@endif

TODO

@if (false)
<div class="row fileupload-buttonbar">
          <div class="col-lg-7">
            <!-- The fileinput-button span is used to style the file input field as button -->
            <span class="btn btn-success fileinput-button">
              <i class="glyphicon glyphicon-plus"></i>
              <span>Add files...</span>
              <input type="file" name="files[]" multiple data-upload-self="true"/>
            </span>
            <button type="submit" class="btn btn-primary start">
              <i class="glyphicon glyphicon-upload"></i>
              <span>Start upload</span>
            </button>
            <button type="reset" class="btn btn-warning cancel">
              <i class="glyphicon glyphicon-ban-circle"></i>
              <span>Cancel upload</span>
            </button>
            <button type="button" class="btn btn-danger delete">
              <i class="glyphicon glyphicon-trash"></i>
              <span>Delete selected</span>
            </button>
            <input type="checkbox" class="toggle" />
            <!-- The global file processing state -->
            <span class="fileupload-process"></span>
          </div>
          <!-- The global progress state -->
          <div class="col-lg-5 fileupload-progress fade">
            <!-- The global progress bar -->
            <div
              class="progress progress-striped active"
              role="progressbar"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              <div
                class="progress-bar progress-bar-success"
                style="width:0%;"
              ></div>
            </div>
            <!-- The extended global progress state -->
            <div class="progress-extended">&nbsp;</div>
          </div>
        </div>

<table role="presentation" class="table table-striped">
          <tbody class="files"></tbody>
        </table>

<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>

<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            {% if (window.innerWidth > 480 || !o.options.loadImageFileTypes.test(file.type)) { %}
                <p class="name">{%=file.name%}</p>
            {% } %}
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}
            <button class="btn btn-success edit" data-index="{%=i%}" disabled>
                <i class="glyphicon glyphicon-edit"></i>
                <span>Edit</span>
            </button>
            {% } %}
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
@endif