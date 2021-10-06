@can ('update', $component->getModel())
    <a data-ajax-url="{{ $component->panelEditRoute($param, $template ?? null) }}" class="pull-right" title="{{ $component->translate('button.edit') }}"><i class="fa fa-pencil"></i></a>
@endcan