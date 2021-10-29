{{-- @todo "hotfixed" --}}
<div id="{{ $component->getDomId('modal-upload-footer') }}">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.close') }}</button>
    <button type="button" class="btn btn-success pull-right" data-action="upload"><i class="fa fa-upload margin-right-10"></i>{{ $component->translate('button.upload') }}</button>
</div>