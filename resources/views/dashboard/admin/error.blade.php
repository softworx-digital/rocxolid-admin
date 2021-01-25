@extends('rocXolid::layouts.default')

@section('content')

<div class="x_panel ajax-overlay">
    <div class="x_content">
        <div class="alert alert-danger row margin-0">
            <div class="col-xs-12 padding-20 text-center">
                <i class="fa fa-info fa-4x"></i>
            </div>
            <div class="col-xs-12 padding-50">
                {!! $web->error_exception_message !!}
            </div>
        </div>
    @if (($backlink = \Softworx\RocXolid\Services\CrudRouterService::backlink()) && ([ $model, $url ] = $backlink))
        <div class="margin-top-10 margin-bottom-10">
        @if ($model->exists())
            <a class="btn btn-default" href="{{ $url }}"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.back-to') }} {{ $model->getTitle() }}</a>
        @else
            <a class="btn btn-default" href="{{ $url }}"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.back') }}</a>
        @endif
        </div>
    @endif
    </div>
</div>

@endsection