<div id="{{ $component->getDomId('footer') }}" class="step-footer">
@if ($component->getOption('show-back-button', true) && $user->can('backAny', $component->getForm()->getModel()))
    <a class="btn btn-default" href="{{ $component->getForm()->getController()->getRoute('index') }}"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.back') }}</a>
@endif

@foreach ($component->getFormButtonToolbarsComponents() as $buttontoolbar)
    {!! $buttontoolbar->render($buttontoolbar->getOption('template', $buttontoolbar->getDefaultTemplateName())) !!}
@endforeach

@foreach ($component->getFormButtonGroupsComponents() as $buttongroup)
    {!! $buttongroup->render($buttongroup->getOption('template', $buttongroup->getDefaultTemplateName())) !!}
@endforeach

@foreach ($component->getFormButtonsComponents() as $button)
    {!! $button->render($button->getOption('template', $button->getDefaultTemplateName())) !!}
@endforeach
</div>