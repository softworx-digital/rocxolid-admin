@if ($component->getFormField()->isHidden())
    {!! $component->render(sprintf('type.%s', $component->getOption('type-template'))) !!}
@else
{{-- @todo: "hotfixed" --}}
<div class="form-group @if ($component->isHidden()) hidden @endif @if ($component->getOption('attributes.col', false)) {{ $component->getOption('attributes.col') }} @endif">
    @if ($component->getOption('label', false) && !$component->getOption('label.after', false))
    <label {!! $component->getHtmlAttributes('label') !!}>
        @if ($component->hasOption('label.title-translated'))
            {{ $component->getOption('label.title-translated') }}
        @else
            {{ $component->translate($component->getOption('label.title')) }}
        @endif
        @if ($component->getFormField()->isRequired())<sup class="text-danger"><i class="fa fa-asterisk"></i></sup>@endif
        @if ($component->getOption('label.hint-translated', false))
            <i class="fa fa-question-circle text-success" title="{{ $component->getOption('label.hint-translated') }}"></i>
        @elseif ($component->getOption('label.hint', false))
            <i class="fa fa-question-circle text-success" title="{{ $component->translate($component->getOption('label.hint')) }}"></i>
        @endif
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
@endif