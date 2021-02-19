{{ Form::open([ 'id' => $component->getDomId('modal-create') ] + $component->getOptions()->except(['scripts'])->toArray()) }}
    {{ Form::hidden('_method', 'POST') }}
    {{ Form::hidden('_submit-action', $component->hasOption('submit-action') ? $component->getOption('submit-action') : null) }}
    {{ Form::hidden('_param', $component->getForm()->getParam()) }}
    {{ Form::hidden('_section', $component->hasOption('section') ? $component->getOption('section') : null) }}

    {!! $component->render('include.output') !!}

    <div class="modal-body">
        {!! $component->render('include.fieldset') !!}
    </div>

    <div class="modal-footer">
        {!! $component->render(sprintf('modal.footer.%s', $component->getOption('modal-footer-template', 'create'))) !!}
    </div>
{{ Form::close() }}

{!! $component->render('snippet.scripts') !!}