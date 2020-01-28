@can ('viewAny', [ $component->getTableColumn()->getRelationModelClass($component->getOption('model')), $component->getTableColumn()->getRelationModelClass($component->getOption('model')) ])
@if ($component->getTableColumn()->getRelationItems($component->getOption('model'))->count() > $component->getTableColumn()->getOption('relation.max-count', 5))
<button data-toggle="collapse" data-target="{{ $component->getDomIdHash($component->getTableColumn()->getName()) }}" class="btn btn-default btn-labeled collapse-toggle collapsed" data-label-hidden="{{ $component->translate('collapse-hidden') }} ({{ $component->getTableColumn()->getRelationItems($component->getOption('model'))->count() }})" data-label-shown="{{ $component->translate('collapse-shown') }}">
    <span class="title">{{ $component->translate('collapse-hidden') }} ({{ $component->getTableColumn()->getRelationItems($component->getOption('model'))->count() }})</span>
    <span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
</button>
<div id="{{ $component->getDomId($component->getTableColumn()->getName()) }}" class="collapse">
@endif
@foreach ($component->getTableColumn()->getRelationItems($component->getOption('model')) as $item)
    @canany ([ 'view', 'update' ], $item)
        @can ('update', $item)
            <a class="label label-info @if (isset($item->is_label_with_flag) && $item->is_label_with_flag && $item->country() && $item->country->exists() && $item->country->flag) has-image @endif" @if ($component->getOption('ajax', false)) data-ajax-url="{{ $item->getControllerRoute() }}" @else href="{{ $item->getControllerRoute() }}" @endif @if (isset($item->is_label_with_color) && $item->is_label_with_color && $item->color) style="background: {{ $item->color }};" @endif>
        @else
            <span class="label label-info @if (isset($item->is_label_with_flag) && $item->is_label_with_flag && $item->country() && $item->country->exists() && $item->country->flag) has-image @endif" @if (isset($item->is_label_with_color) && $item->is_label_with_color && $item->color) style="background: {{ $item->color }};" @endif>
        @endcan
        @if (isset($item->is_label_with_flag) && $item->is_label_with_flag && $item->country() && $item->country->exists() && $item->country->flag)
            {{ Html::image(sprintf('vendor/softworx/rocXolid/images/flags/%s', $item->country->flag), $item->country->flag, [ 'class' => 'country-flag' ]) }}
        @endif
        @if (!isset($item->is_label_with_name) || $item->is_label_with_name)
            {!! $item->getTitle() !!}
            @if ($component->getTableColumn()->getOption('relation.pivot', false))
                - {{ $component->getOption('model')->getPivot($item)->{$component->getTableColumn()->getOption('relation.pivot.attribute')} }}
            @endif
        @endif
        @can ('update', $item)
            </a>
        @else
            </span>
        @endcan
    @endcan
@endforeach
@if ($component->getTableColumn()->getRelationItems($component->getOption('model'))->count() > $component->getTableColumn()->getOption('relation.max-count', 5))
</div>
@endif
@endcan