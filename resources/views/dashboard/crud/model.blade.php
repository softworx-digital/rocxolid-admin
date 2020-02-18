@extends('rocXolid::layouts.default')

@section('content')

{!! $component->getModelViewerComponent()->render($model_viewer_template, [ 'tab' => $tab ?? null ]) !!}

@endsection