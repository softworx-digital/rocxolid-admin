<div class="btn-group submit-actions">
@if ($component->getOption('ajax', false))
    {!! Form::button($component->translate($component->getOption('label.title'), false), $component->getOption('attributes')) !!}
@else
    {!! Form::submit($component->translate($component->getOption('label.title'), false), $component->getOption('attributes')) !!}
@endif
    <button type="button" class="{{ $component->getOption('attributes.class') }} dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
    @foreach ($component->getOption('actions') as $action => $title)
        <li><a data-submit-action="{{ $action }}">{{ $component->translate(sprintf('button.%s', $title), false) }}</a></li>
    @endforeach
    </ul>
</div>