<div id="{{ $component->getDomId() }}">
    <div class="x_panel ajax-overlay">
        <div class="x_title">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <h2 class="text-overflow">
                        <small class="pull-left">{{ $component->translate(sprintf('action.%s', $route_method)) }}</small>
                        <span>{{ $component->translate('model.title.plural') }}</span>
                    </h2>
                </div>
                <div class="col-md-4 col-xs-12 text-right">
                @can ('create', $component->getTable()->getController()->getRepository()->getModel())
                    <a class="btn btn-primary margin-top-10" href="{{ $component->getTable()->getController()->getRoute('create') }}"><i class="fa fa-plus margin-right-5"></i> {{ $component->translate('model.title.singular') }}</a>
                @endcan
                </div>
            </div>
        </div>
        <div class="x_content">
            {!! $component->render('include.results') !!}
        </div>
    </div>
</div>