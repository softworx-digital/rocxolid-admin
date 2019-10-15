{{ Form::open([ 'id' => $component->makeDomId('modal-create'), 'url' => $component->getForm()->getController()->getRoute('store') ]) }}
    {{ Form::hidden('_method', 'POST') }}
    {{ Form::hidden('_submit-action', null) }}
    {{ Form::hidden('_section', $component->hasOption('section') ? $component->getOption('section') : null) }}
    {!! $component->render('include.output') !!}
    <div class="modal-body">
        {!! $component->render('include.fieldset') !!}
    </div>
    {!! $component->render('include.footer-modal-create') !!}
{!! Form::close() !!}