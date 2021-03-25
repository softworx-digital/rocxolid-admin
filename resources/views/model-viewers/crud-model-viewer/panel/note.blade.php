<div id="{{ $component->getDomId('note') }}" class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            {{ $component->translate('text.note') }}
        @if (!($read_only ?? false) && $user->can('update', $component->getModel()))
            <a data-ajax-url="{{ $component->getController()->getRoute('edit', $component->getModel(), ['_section' => 'note']) }}" class="margin-left-5 pull-right" title="{{ $component->translate('button.edit') }}"><i class="fa fa-pencil"></i></a>
        @endif
        </h3>
    </div>
    <div class="panel-body">
        {{ $component->getModel()->getAttributeViewValue('note') }}
    </div>
</div>