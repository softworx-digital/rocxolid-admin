<div class="form-group">
    @if ($component->getOption('label', false) && !$component->getOption('label.after', false))
    <label {!! $component->getHtmlAttributes('label') !!}>
        {{ $component->translate($component->getOption('label.title')) }}
    </label>
    @endif

    @if ($component->getOption(sprintf('wrapper-%s', $index), false))
    <div {!! $component->getHtmlAttributes(sprintf('wrapper-%s', $index)) !!}>
    @elseif ($component->getOption('wrapper', false))
    <div {!! $component->getHtmlAttributes('wrapper') !!}>
    @endif

        {!! $component->render(sprintf('type.%s', $component->getOption('type-template')), [ 'index' => $index ]) !!}

    @if ($component->getFormField()->hasErrorMessages($index))
        {!! $component->render('error-messages', [ 'messages' => $component->getFormField()->getIndexErrorMessage($index) ]) !!}
    @endif

    @if ($component->getOption(sprintf('wrapper-%s', $index), false))
    </div>
    @elseif ($component->getOption('wrapper', false))
    </div>
    @endif
</div>