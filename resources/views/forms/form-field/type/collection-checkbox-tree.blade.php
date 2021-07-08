@if (!isset($level))<div class="row masonry-panel-container masonry-panel-container-four-column">@endif
@foreach ($collection ?? $component->getFormField()->getCollection() as $item)
@if (!isset($level))
    <div class="padding-10">
    @if (!isset($item->{$component->getOption('subitems-attribute')}) || $item->{$component->getOption('subitems-attribute')}->isEmpty())
        <ul class="list-group btn-group-vertical width-100" data-toggle="buttons">
            <label class="list-group-item btn text-wrap text-left @if ($component->getFormField()->isFieldValue($item->getKey())) active @endif">
                {!! Form::checkbox($component->getFormField()->getFieldName(), $item->getKey(), $component->getFormField()->isFieldValue($item->getKey()), $component->getOption('attributes')) !!}
                <span class="margin-left-5 title">{{ $item->getTitle() }}</span>
            </label>
        </ul>
    @else
        <div class="panel panel-default">
            <div class="panel-heading">

                <ul class="list-group btn-group-vertical width-100" data-toggle="buttons">
                    <label class="list-group-item btn text-wrap text-left @if ($component->getFormField()->isFieldValue($item->getKey())) active @endif">
                        {!! Form::checkbox($component->getFormField()->getFieldName(), $item->getKey(), $component->getFormField()->isFieldValue($item->getKey()), $component->getOption('attributes')) !!}
                        <strong class="margin-left-5 title">{{ $item->getTitle() }}</strong>
                    </label>
                </ul>

            </div>
            <div class="panel-body">
                <ul class="list-group btn-group-vertical width-100" data-toggle="buttons">
                {!! $component->render(sprintf('type.%s', $component->getOption('type-template')), [
                    'collection' => $item->{$component->getOption('subitems-attribute')},
                    'level' => isset($level) ? ++$level : 1,
                ]) !!}
                </ul>
            </div>
        </div>
    @endif
    </div>
@else
    @if (!isset($item->{$component->getOption('subitems-attribute')}) || $item->{$component->getOption('subitems-attribute')}->isEmpty())
        <label class="list-group-item btn text-wrap text-left @if ($component->getFormField()->isFieldValue($item->getKey())) active @endif">
            {!! Form::checkbox($component->getFormField()->getFieldName(), $item->getKey(), $component->getFormField()->isFieldValue($item->getKey()), $component->getOption('attributes')) !!}
            <span class="margin-left-5 title">{{ $item->getTitle() }}</span>
        </label>
    @else
        <li class="list-group-item padding-0">
            <div class="panel panel-default margin-0 margin-top--1 no-border no-border-radius">
                <div class="panel-heading">

                    <label class="list-group-item btn text-wrap text-left @if ($component->getFormField()->isFieldValue($item->getKey())) active @endif">
                        {!! Form::checkbox($component->getFormField()->getFieldName(), $item->getKey(), $component->getFormField()->isFieldValue($item->getKey()), $component->getOption('attributes')) !!}
                        <strong class="margin-left-5 title">{{ $item->getTitle() }}</strong>
                    </label>

                </div>
                <div class="panel-body">
                    <ul class="list-group btn-group-vertical width-100" data-toggle="buttons">
                    {!! $component->render(sprintf('type.%s', $component->getOption('type-template')), [
                        'collection' => $item->{$component->getOption('subitems-attribute')},
                        'level' => isset($level) ? ++$level : 1,
                    ]) !!}
                    </ul>
                </div>
            </div>
        </li>
    @endif
@endif
@endforeach
@if (!isset($level))</div>@endif