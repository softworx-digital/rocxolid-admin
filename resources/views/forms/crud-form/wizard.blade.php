<div class="wizard step-app">
{!! Form::open($component->getOptions()->except(['scripts'])->toArray()) !!}
    {{ Form::hidden('_method', 'POST') }}
    {{ Form::hidden('_submit-action', null) }}
    {{ Form::hidden('_section', $component->hasOption('section') ? $component->getOption('section') : null) }}
    {{ Form::hidden('_step', 0) }}
    {!! $component->render('include.output') !!}

    <div class="tabbable margin-bottom-30">
        <ul class="nav nav-tabs step-steps wizard">
        @foreach ($component->getFormFieldGroupsComponents() as $fieldgroup)
            {!! $fieldgroup->render('wizard-step-navigation', ['loop' => $loop]) !!}
        @endforeach
        </ul>
    </div>

    <div class="x_content">
        {!! $component->render('include.fieldset') !!}
    </div>
    {!! $component->render('include.footer') !!}
{!! Form::close() !!}
</div>

@if ($component->hasOption('scripts'))
@push('script')
    @foreach ($component->getOption('scripts') as $script)
        {{ Html::script(asset(sprintf('assets/js/%s', $script))) }}
    @endforeach
@endpush
@endif