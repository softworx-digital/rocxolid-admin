<div>
    <h4>{{ $component->translate('model.title.singular') }}</h4>
    @if ($component->getModel()->hasTokenableProperties() || $component->getModel()->hasTokenableMethods())
        <ul class="list-group">
    @if ($component->getModel()->hasTokenableProperties())
        @foreach ($component->getModel()->getTokenableProperties() as $prop)
            <li class="list-group-item padding-0"><span class="btn btn-sm btn-primary margin-2 margin-right-10" data-add-html="${{ $param }}->{{ $prop }}"><i class="fa fa-chevron-left"></i></span>{{ $component->translate(sprintf('token.%s', $prop)) }}</li>
        @endforeach
    @endif
    @if ($component->getModel()->hasTokenableMethods())
        @foreach ($component->getModel()->getTokenableMethods() as $method)
            <li class="list-group-item padding-0"><span class="btn btn-sm btn-primary margin-2 margin-right-10" data-add-html="${{ $param }}->{{ $method }}()"><i class="fa fa-chevron-left"></i></span>{{ $component->translate(sprintf('token.%s', $method)) }}</li>
        @endforeach
    @endif
        </ul>
    @else
        <div class="alert alert-danger text-center"><i class="fa fa-exclamation-triangle fa-2x"></i></div>
    @endif
</div>