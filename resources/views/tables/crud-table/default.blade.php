<div id="{{ $component->getDomId() }}">
    <div class="x_panel ajax-overlay">
        <div class="x_title">
            <h2 class="pull-left"><span>{{ $component->translate('model.title.plural') }}</span><small>{{ $component->translate(sprintf('action.%s', $route_method)) }}</small></h2>
        @can('create', $component->getRepository()->getModel())
            <a class="btn btn-primary pull-right margin-top-5" href="{{ $component->getRepository()->getController()->getRoute('create') }}"><i class="fa fa-plus margin-right-5"></i> {{ $component->translate('model.title.singular') }}</a>
        @endcan
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            {!! $component->render('include.results') !!}
        </div>
    </div>
</div>