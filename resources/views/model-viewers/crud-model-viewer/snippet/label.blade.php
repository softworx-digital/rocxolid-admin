@if ($component->getModel()->trashed())
    <span class="label label-default">{{ $component->getModel()->getTitle() }}</span>
@else
    @can ('view', $component->getModel())
        <span class="label label-info" @if (isset($sort) && $sort && $user->can('update', $component->getModel())) data-item-id="{{ $component->getModel()->getKey() }}" style="padding: .75rem 0 .5rem .5rem; margin-left: 5px;" @endif>
            <a data-ajax-url="{{ $component->getModel()->getControllerRoute('show') }}" @if (isset($class))class="{{ $class }}"@endif style="color: #fff;">{{ $component->getModel()->getTitle() }}</a>
        @if (isset($sort) && $sort && $user->can('update', $component->getModel()))
            <span class="btn btn-default btn-xs drag-handle margin-left-10 margin-right-0"><i class="fa fa-arrows"></i></span>
        @endif
        </span>
    @else
        <span class="label label-default">{{ $component->getModel()->getTitle() }}</span>
    @endcan
@endif