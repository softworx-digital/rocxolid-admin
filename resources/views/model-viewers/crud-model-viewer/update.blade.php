<div class="x_panel ajax-overlay">
    {!! $component->render('include.header') !!}
    {!! $component->getFormComponent()->render($component->getFormComponent()->getOption('template', 'update')) !!}
</div>