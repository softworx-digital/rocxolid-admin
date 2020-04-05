{{ Form::open($component->getOptions()->except(['scripts'])->toArray()) }}
    {{ Form::hidden('_method', $component->getForm()->getOption('method')) }}
    {!! $component->render('include.output') !!}

    <div class="modal-body">
        {!! $component->render('include.fieldset') !!}
    </div>

    <div class="modal-footer">
        {!! $component->render('include.footer') !!}
    </div>
{{ Form::close() }}

{!! $component->render('snippet.scripts') !!}