@if ($component->getOption('ajax', false))
{!! Form::button($component->translate($component->getOption('label.title')), $component->getOption('attributes')) !!}
@else
{!! Form::submit($component->translate($component->getOption('label.title')), $component->getOption('attributes')) !!}
@endif