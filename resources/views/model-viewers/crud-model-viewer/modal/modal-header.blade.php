<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
    <h4 class="modal-title">{{ $component->translate('model.title.singular') }}@if ($display_action ?? true) <small>{{ $component->translate(sprintf('action.%s', $route_method)) }}</small>@endif</h4>
</div>