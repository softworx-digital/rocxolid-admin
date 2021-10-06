<div id="{{ $component->getDomId('modal-show', $component->getModel()->getKey()) }}" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ajax-overlay">
            {!! $component->render('modal.modal-header') !!}

            <div class="modal-body">
                {!! $component->render('modal.modal-body', [ 'tab' => $tab  ?? 'default' ]) !!}
            </div>

            {!! $component->render('modal.modal-footer') !!}
        </div>
    </div>
</div>