@if ($component->getModel()->trashed())
    <span class="label label-default">{{ $component->getModel()->getTitle() }}</span>
@else
    @can ('view', $component->getModel())
        <a class="label label-info" data-ajax-url="{{ $component->getModel()->getControllerRoute('show') }}" @if (isset($class))class="{{ $class }}"@endif>{{ $component->getModel()->getTitle() }}</a>
    @else
        <span class="label label-default">{{ $component->getModel()->getTitle() }}</span>
    @endcan
@endif