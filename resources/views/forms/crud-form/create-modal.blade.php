{{ Form::open([ 'id' => $component->getDomId('modal-create'), 'url' => $component->getForm()->getController()->getRoute('store') ]) }}
    {{ Form::hidden('_method', 'POST') }}
    {{ Form::hidden('_submit-action', null) }}
    {{ Form::hidden('_section', $component->hasOption('section') ? $component->getOption('section') : null) }}
    {!! $component->render('include.output') !!}
    <div class="modal-body">
        {!! $component->render('include.fieldset') !!}
    </div>
    {!! $component->render('include.footer-modal-create') !!}
{!! Form::close() !!}

@if ($component->hasOption('scripts'))
@push('script')
    @foreach ($component->getOption('scripts') as $script)
        {{ Html::script(asset(sprintf('assets/js/%s', $script))) }}
    @endforeach
@endpush
@endif