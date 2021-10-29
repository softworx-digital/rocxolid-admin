@extends('rocXolid::layouts.default')

@section('content')

@if (config('app.header-logo', false))
    <div class="text-center margin-top-100">{{ Html::image(config('app.header-logo'), 'Admin', [ 'style' => 'width: 50%;' ]) }}</div>
@endif
@if (config('app.header-title', false))
    <h1 class="text-center">{{ config('app.header-title') }}</h1>
@endif
@if (config('app.header-subtitle', false))
    <h2 class="text-center">{{ config('app.header-subtitle') }}</h2>
@endif


@endsection