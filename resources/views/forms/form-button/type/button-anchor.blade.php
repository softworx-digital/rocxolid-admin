@if ($component->getOption('ajax', false))
{!! Form::button($component->getOption('label.title'), $component->getOption('attributes')) !!}
@else
{!! Html::link($component->getOption('url'), $component->getOption('label.title'), $component->getOption('attributes')) !!}
@endif