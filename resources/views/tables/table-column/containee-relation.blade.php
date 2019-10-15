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