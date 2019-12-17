<div class="x_panel ajax-overlay">
    {!! $component->render('include.header-panel') !!}
    {!! $component->getFormComponent()->render($component->getFormComponent()->getOption('template', 'update')) !!}
</div>