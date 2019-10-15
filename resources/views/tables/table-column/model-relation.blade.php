@if ($component->getTableColumn()->getRelationItems($component->getOption('model'))->count() > $component->getTableColumn()->getOption('relation.max-count', 5))
<button data-toggle="collapse" data-target="{{ $component->makeDomIdHash($component->getTableColumn()->getName()) }}" class="btn btn-default btn-labeled collapse-toggle collapsed" data-label-hidden="{{ __('rocXolid::general.button.collapse-hidden') }} ({{ $component->getTableColumn()->getRelationItems($component->getOption('model'))->count() }})" data-label-shown="{{ __('rocXolid::general.button.collapse-shown') }}">
    <span class="title">{{ __('rocXolid::general.button.collapse-hidden') }} ({{ $component->getTableColumn()->getRelationItems($component->getOption('model'))->count() }})</span>
    <span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
</button>
<div id="{{ $component->makeDomId($component->getTableColumn()->getName()) }}" class="collapse">
@endif
@foreach ($component->getTableColumn()->getRelationItems($component->getOption('model')) as $item)
@if ($component->getOption('ajax', false))
    @if ($item->userCan('read-only'))
        <a class="label label-info @if (isset($item->is_label_with_flag) && $item->is_label_with_flag && $item->country() && $item->country->exists() && $item->country->flag) has-image @endif" data-ajax-url="{{ $item->getControllerRoute() }}" @if (isset($item->is_label_with_color) && $item->is_label_with_color && $item->color) style="background: {{ $item->color }};" @endif>
    @else
        <span class="label label-info @if (isset($item->is_label_with_flag) && $item->is_label_with_flag && $item->country() && $item->country->exists() && $item->country->flag) has-image @endif" @if (isset($item->is_label_with_color) && $item->is_label_with_color && $item->color) style="background: {{ $item->color }};" @endif>
    @endif
    @if (isset($item->is_label_with_flag) && $item->is_label_with_flag && $item->country() && $item->country->exists() && $item->country->flag)
        {{ Html::image(sprintf('vendor/softworx/rocXolid/images/flags/%s', $item->country->flag), $item->country->flag, [ 'class' => 'country-flag' ]) }}
    @endif
    @if (!isset($item->is_label_with_name) || $item->is_label_with_name)
        {!! $item->getTitle() !!}
        @if ($component->getTableColumn()->getOption('relation.pivot', false))
            - {{ $component->getOption('model')->getPivot($item)->{$component->getTableColumn()->getOption('relation.pivot.attribute')} }}
        @endif
    @endif
    @if ($item->userCan('read-only'))
        </a>
    @else
        </span>
    @endif
@else
    @if ($item->userCan('read-only'))
        <a class="label label-info @if (isset($item->is_label_with_flag) && $item->is_label_with_flag && $item->country() && $item->country->exists() && $item->country->flag) has-image @endif" href="{{ $item->getControllerRoute() }}" @if (isset($item->is_label_with_color) && $item->is_label_with_color && $item->color) style="background: {{ $item->color }};" @endif>
    @else
        <span class="label label-info @if (isset($item->is_label_with_flag) && $item->is_label_with_flag && $item->country() && $item->country->exists() && $item->country->flag) has-image @endif" @if (isset($item->is_label_with_color) && $item->is_label_with_color && $item->color) style="background: {{ $item->color }};" @endif>
    @endif
    @if (isset($item->is_label_with_flag) && $item->is_label_with_flag && $item->country() && $item->country->exists() && $item->country->flag)
        {{ Html::image(sprintf('vendor/softworx/rocXolid/images/flags/%s', $item->country->flag), $item->country->flag, [ 'class' => 'country-flag' ]) }}
    @endif
    @if (!isset($item->is_label_with_name) || $item->is_label_with_name)
        {!! $item->getTitle() !!}
        @if ($component->getTableColumn()->getOption('relation.pivot', false))
            - {{ $component->getOption('model')->getPivot($item)->{$component->getTableColumn()->getOption('relation.pivot.attribute')} }}
        @endif
    @endif
    @if ($item->userCan('read-only'))
        </a>
    @else
        </span>
    @endif
@endif
@endforeach
@if ($component->getTableColumn()->getRelationItems($component->getOption('model'))->count() > $component->getTableColumn()->getOption('relation.max-count', 5))
</div>
@endif