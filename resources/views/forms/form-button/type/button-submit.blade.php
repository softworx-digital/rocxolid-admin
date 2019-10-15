@if ($component->getOption('ajax', false))
{!! Form::button($component->getOption('label.title'), $component->getOption('attributes')) !!}
@else
{!! Form::submit($component->getOption('label.title'), $component->getOption('attributes')) !!}
@endif