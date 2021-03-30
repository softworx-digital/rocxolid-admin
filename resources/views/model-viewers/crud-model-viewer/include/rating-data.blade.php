@can ('view', $component->getModel())
<div id="{{ $component->getDomId('rating-data') }}" class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            {{ $component->translate('text.rating-data') }}
        @can ('update', $component->getModel())
            <a data-ajax-url="{{ $component->getController()->getRoute('edit', $component->getModel(), ['_section' => 'rating-data']) }}" class="margin-left-5 pull-right" title="{{ $component->translate('button.edit') }}"><i class="fa fa-pencil"></i></a>
        @endcan
        </h3>
    </div>
    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ $component->translate(sprintf('field.%s', $component->getModel()->getRatingColumn())) }}</dt>
            <dd>{{ round($component->getModel()->getRating(), 2) }}</dd>
            <dt>{{ $component->translate(sprintf('field.%s', $component->getModel()->getRatingCountColumn())) }}</dt>
            <dd>{{ $component->getModel()->getRatingCount() }}</dd>
        </dl>
    </div>
</div>
@endcan