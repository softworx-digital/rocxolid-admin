{{ Form::open([ 'id' => $component->getOption('id'), 'url' => $component->getForm()->getController()->getRoute($component->getForm()->getOption('route-action'), $component->getForm()->getModel()) ]) }}
    {{ Form::hidden('_method', $component->getForm()->getOption('method')) }}
    {!! $component->render('include.output') !!}
    <div class="modal-body">
        {!! $component->render('include.fieldset') !!}
    </div>
    {!! $component->render('include.footer-modal') !!}
{!! Form::close() !!}

@if ($component->hasOption('scripts'))
@push('script')
    @foreach ($component->getOption('scripts') as $script)
        {{ Html::script(asset(sprintf('assets/js/%s', $script))) }}
    @endforeach
@endpush
@endif