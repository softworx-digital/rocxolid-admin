@if ($component->getFormField()->getModel())
    {!! $component->getFormField()->getModel()->getModelViewerComponent()->render($component->getOption('model-template'), $component->getOption('assignments', [])) !!}
@endif