@if ($component->getOption('ajax', false))
{!! Form::button($component->translate($component->getOption('label.title')), $component->getOption('attributes')) !!}
@else
{!! Html::link($component->getOption('url'), $component->translate($component->getOption('label.title')), $component->getOption('attributes')) !!}
@endif