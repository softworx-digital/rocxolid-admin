<div id="{{ $component->getDomId('modal-update-footer') }}">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-chevron-left margin-right-10"></i>{{ $component->translate('button.close') }}</button>

    <div class="btn-group pull-right">
    {{-- @todo "hotfixed" --}}
    @if ($component->getForm()->hasButtons() && $user->can('update', $component->getForm()->getModel()))
        <button type="button" class="btn btn-success" data-ajax-submit-form="{{ $component->getDomIdHash('modal-update') }}"><i class="fa fa-save margin-right-10"></i>{{ $component->translate('button.save') }}</button>
    @endcan

{{-- @foreach ($component->getFormButtonToolbarsComponents() as $buttontoolbar)
    {!! $buttontoolbar->render($buttontoolbar->getOption('template', $buttontoolbar->getDefaultTemplateName())) !!}
@endforeach

@foreach ($component->getFormButtonGroupsComponents() as $buttongroup)
    {!! $buttongroup->render($buttongroup->getOption('template', $buttongroup->getDefaultTemplateName())) !!}
@endforeach

@foreach ($component->getFormButtonsComponents() as $button)
    {!! $button->render($button->getOption('template', $button->getDefaultTemplateName())) !!}
@endforeach --}}

    {{-- @todo "hotfixed" --}}
    @if (false && $component->getForm()->getModel()->canBeDeleted() && $user->can('delete', $component->getForm()->getModel()))
        <span data-dismiss="modal" data-ajax-url="{{ $component->getForm()->getModel()->getControllerRoute('destroyConfirm') }}" class="btn btn-danger"><i class="fa fa-trash margin-right-10"></i>{{ $component->translate('button.delete') }}</span>
    @endif
    </div>
</div>