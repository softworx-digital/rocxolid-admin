<div id="{{ $component->getDomId() }}">
    <div class="x_panel ajax-overlay">
        <div class="x_title">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <h2 class="text-overflow">
                    @if (false)
                        <small class="pull-left">{{ $component->translate(sprintf('action.%s', $route_method)) }}</small>
                    @endif
                        <span>{{ $component->translate('model.title.plural') }}</span>
                    </h2>
                </div>
                {!! $component->getTable()->getController()->getModelViewerComponent()->render('include.table-controls') !!}
            </div>
        </div>
        <div class="x_content">
            {!! $component->render('include.results') !!}
        </div>
    </div>
</div>