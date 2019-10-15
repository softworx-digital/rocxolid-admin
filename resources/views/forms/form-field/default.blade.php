<div class="form-group">
    @if ($component->getOption('label', false) && !$component->getOption('label.after', false))
    <label {!! $component->getHtmlAttributes('label') !!}>
        {{ $component->translate($component->getOption('label.title')) }}
        @if ($component->getOption('label.hint', false))
            <i class="fa fa-question-circle text-warning" title="{{ $component->translate(sprintf('_hint.%s', $component->getOption('label.hint'))) }}"></i>
        @endif
    </label>
    @endif

    @if ($component->getOption('wrapper', false))
    <div {!! $component->getHtmlAttributes('wrapper') !!}>
    @endif

        {!! $component->render(sprintf('type.%s', $component->getOption('type-template'))) !!}

    @if ($component->getFormField()->hasErrorMessages())
        {!! $component->render('error-messages', [ 'messages' => $component->getFormField()->getErrorMessage() ]) !!}
    @endif

    @if ($component->getOption('wrapper', false))
    </div>
    @endif
</div>