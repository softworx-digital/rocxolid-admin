<div id="{{ $component->getDomId('modal-clone-confirm', $component->getModel()->getKey()) }}" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content ajax-overlay">
        {{ Form::open([ 'url' => $component->getController()->getRoute('clone', $component->getModel()) ]) }}
            {{ Form::hidden('_method', 'POST') }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">{{ $component->translate('model.title.singular') }} <small>{{ $component->translate(sprintf('action.%s', $route_method)) }}</small></h4>
            </div>

            <div class="modal-body">
                <p class="text-center">{{ $component->translate('text.clone-confirmation') }} {{ $component->getModel()->getTitle() }}?</p>
            @if ($component->getModel()->getCloneRelationshipMethods())
                <hr />
            @endif
            @foreach ($component->getModel()->getCloneRelationshipMethods() as $clone_relationship_method)
                {!! Form::checkbox('_data[with_relations][]', $clone_relationship_method, true, [
                    'data-toggle' => 'toggle',
                    'data-size' => 'small',
                    'data-width' => '60',
                    'data-style' => 'round',
                    'data-on' => '<i class="fa fa-check"></i>',
                    'data-off' => '<i class="fa fa-close"></i>',
                ]) !!}
                <label class="label-fit-height margin-left-10 margin-right-5">
                    <span>{{ $component->translate('text.clone') }} {{ $component->translate(sprintf('field.%s', $clone_relationship_method)) }}</span>
                </label>
            @endforeach
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.close') }}</button>
                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-clone margin-right-10"></i>{{ $component->translate('button.clone') }}</button>
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>