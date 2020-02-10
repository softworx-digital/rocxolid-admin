<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.close') }}</button>
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