<div class="x_footer no-border padding-top-0 padding-left-5 padding-right-5">
    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <div class="btn-group">
            @if (($backlink = \Softworx\RocXolid\Services\CrudRouterService::backlink($component->getModel())) && ([ $model, $url ] = $backlink))
                @if ($model->exists())
                    <a class="btn btn-default" href="{{ $url }}"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.back-to') }} {{ $model->getTitle() }}</a>
                @else
                    <a class="btn btn-default" href="{{ $url }}"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.back') }}</a>
                @endif
            @endif
            @can ('backAny', $component->getModel())
                <a class="btn btn-default" href="{{ $component->getController()->getRoute('index') }}"><i class="fa fa-list margin-right-10"></i>{{ $component->translate('button.back-index') }}</a>
            @endcan
            </div>
        </div>
        <div class="col-lg-8 col-xs-6">
            {!! $component->render('include.actions') !!}
        </div>
    </div>
</div>