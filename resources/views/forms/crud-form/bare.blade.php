{{ Form::open($component->getOptions()->except(['scripts'])->toArray()) }}
    {{ Form::hidden('_param', $component->getForm()->getParam()) }}
    {{ Form::hidden('_section', $component->hasOption('section') ? $component->getOption('section') : null) }}

    {!! $component->render('include.output') !!}

    <div class="x_content">
        {!! $component->render('include.fieldset') !!}
    </div>
{{ Form::close() }}

{!! $component->render('snippet.scripts') !!}