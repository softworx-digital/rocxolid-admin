<div id="{{ $component->getDomId() }}">
    <div class="x_panel ajax-overlay">
        <div class="x_title">
            <h2>{{ $component->translate('model.title.plural') }}<small>{{ $component->translate(sprintf('action.%s', $route_method)) }}</small></h2>
        @if ($component->getRepository()->getController()->userCan('write'))
            <p><a class="btn btn-primary pull-right margin-right-no" href="{{ $component->getRepository()->getController()->getRoute('create') }}"><i class="fa fa-plus margin-right-5"></i> {{ $component->translate('model.title.singular') }}</a></p>
        @endif
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            {!! $component->render('include.results') !!}
        </div>
    </div>
</div>