@extends('rocXolid::layouts.default')

@section('content')

@foreach ($component->getAlertComponents() as $alert)
    {!! $alert->render($alert->getType()) !!}
@endforeach

{!! $component->getTableComponent()->render() !!}

@endsection