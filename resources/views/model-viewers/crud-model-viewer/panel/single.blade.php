@can ('view', $component->getModel())
<div id="{{ $component->getDomId(sprintf('panel.%s', $param)) }}" class="panel panel-{{ $class ?? 'default' }}">
    <div class="panel-heading">
        <h3 class="panel-title">
            {{ $component->translate(sprintf('panel.%s.heading', $param)) }}
            {!! $component->render('panel.snippet.link-edit-icon', [ 'param' => $param, 'template' => 'single' ]) !!}
        </h3>
    </div>
    <div class="panel-body">
        {!! $component->render('data.values', [ 'attributes' => $component->panelData($param) ]) !!}
    </div>
</div>
@endcan