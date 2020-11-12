@can ('update', $component->getModel())
    <a href="{{ $component->getModel()->getControllerRoute('edit') }}" @if (isset($class))class="{{ $class }}"@endif >{{ $component->getModel()->getTitle() }}</a>
@elsecan ('view', $component->getModel())
    <a href="{{ $component->getModel()->getControllerRoute('show') }}" @if (isset($class))class="{{ $class }}"@endif>{{ $component->getModel()->getTitle() }}</a>
@else
    {{ $component->getModel()->getTitle() }}
@endcan