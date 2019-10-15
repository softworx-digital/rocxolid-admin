@if ($component->getOption('orderable', false) && $component->getTableColumn()->getRepository()->isOrderColumn($component->getTableColumn()))
    <td {!! $component->getHtmlAttributes('wrapper', ['class' => 'ordered-by']) !!}>{!! $component->render($component->getOption('type-template')) !!}</td>
@else
    <td {!! $component->getHtmlAttributes('wrapper') !!}>{!! $component->render($component->getOption('type-template')) !!}</td>
@endif