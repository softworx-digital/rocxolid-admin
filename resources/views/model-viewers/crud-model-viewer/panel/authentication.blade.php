@can ('view', $component->getModel())
<div id="{{ $component->getDomId(sprintf('panel.%s', $param)) }}" class="panel panel-{{ $class ?? 'default' }}">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-id-card-o margin-right-5"></i>
            {{ $component->translate(sprintf('panel.%s.heading', $param)) }}
            {!! $component->render('panel.snippet.link-edit-icon', [ 'param' => $param, 'template' => 'authentication' ]) !!}
        </h3>
    </div>
    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ $component->translate('field.email') }}</dt><dd>{{ $component->getModel()->email }}</dd>
            <dt>{{ $component->translate('field.password') }}</dt><dd><i class="fa fa-ellipsis-h"></i><i class="fa fa-ellipsis-h" style="margin-left: 1px;"></i></dd>
        </dl>
    </div>
</div>
@endcan