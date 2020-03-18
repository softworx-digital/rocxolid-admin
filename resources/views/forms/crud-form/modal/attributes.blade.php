{!! Form::open([ 'id' => $component->getDomId('modal-update') ] + $component->getOptions()->except(['scripts'])->toArray()) !!}
    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::hidden('_submit-action', null) }}
    {{ Form::hidden('_section', $component->hasOption('section') ? $component->getOption('section') : null) }}

    {!! $component->render('include.output') !!}

    <div class="modal-body">
        {!! $component->render('include.fieldset') !!}
    </div>

    <div class="modal-footer">
        {!! $component->render('include.footer') !!}
    </div>
{!! Form::close() !!}

{!! $component->render('snippet.scripts') !!}