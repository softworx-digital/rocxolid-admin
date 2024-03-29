<div id="{{ $component->getDomId(sprintf('modal-%s', $component->getFormComponent()->getForm()->getParam())) }}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ajax-overlay">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <h4 class="modal-title">{{ $component->translate('model.title.singular') }}@if (false) <small>{{ $component->translate(sprintf('action.%s', $route_method)) }}</small>@endif</h4>
            </div>
        @can ('create', $component->getModel())
            {!! $component->getFormComponent()->render('modal.create') !!}
        @else
            <div class="modal-body">
                <p class="text-center"><i class="fa fa-hand-stop-o text-danger fa-5x"></i></p>
                <p class="text-center"><span class="text-big">{{ $component->translate('text.no-access') }}</span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.close') }}</button>
            </div>
        @endcan
        </div>
    </div>
</div>