{{ Form::open([ 'id' => $component->makeDomId('modal-update'), 'url' => $component->getForm()->getController()->getRoute('update', $component->getForm()->getModel()) ]) }}
    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::hidden('_submit-action', null) }}
    {{ Form::hidden('_section', $component->hasOption('section') ? $component->getOption('section') : null) }}
    {!! $component->render('include.output') !!}
    <div class="modal-body">
        {!! $component->render('include.fieldset') !!}
    </div>
    {!! $component->render('include.footer-modal-update') !!}
{!! Form::close() !!}