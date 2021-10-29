@if ($user->can('assign', [ $component->getModel(), 'groups' ]) || $user->can('assign', [ $component->getModel(), 'roles' ]) || $user->can('assign', [ $component->getModel(), 'permissions' ]))
<div id="{{ $component->getDomId(sprintf('panel.%s', $param)) }}" class="panel panel-{{ $class ?? 'default' }}">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-shield margin-right-5"></i>
            {{ $component->translate(sprintf('panel.%s.heading', $param)) }}
        @if (!$component->getModel()->is($user) || $component->getModel()->hasAssignableRoles())
            {!! $component->render('panel.snippet.link-edit-icon', [ 'param' => $param, 'template' => 'authorization' ]) !!}
        @endif
        </h3>
    </div>
    <div class="panel-body">
        <dl class="dl-horizontal">
        @foreach ($component->getModel()->getRelationshipMethods('groups', 'permissions') as $attribute)
            @can ('assign', [ $component->getModel(), $attribute ])
                <dt>{{ $component->translate(sprintf('field.%s', $attribute)) }}</dt>
                <dd>
                @foreach ($component->getModel()->$attribute()->get() as $item)
                    {!! $item->getModelViewerComponent()->render('snippet.label') !!}
                @endforeach
                </dd>
            @endcan
        @endforeach
        </dl>
    </div>
</div>
@endif