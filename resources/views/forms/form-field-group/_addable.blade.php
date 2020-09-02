<div id="{{ $component->getDomId($component->getFormFieldGroup()->getName()) }}" class="form-field-group form-field-group-addable">
@if ($component->getFormFields())
    <fieldset {!! $component->getHtmlAttributes('wrapper') !!}>
    @if ($component->getOption('wrapper.legend', false))
        <legend>{!! $component->translate($component->getOption('wrapper.legend.title')) !!}</legend>
    @endif
    @for ($i = 0; $i < $component->getFormFieldGroup()->getGroupCount(); $i++)
        <div {!! $component->getHtmlAttributes('row') !!}>
            <div {!! $component->getHtmlAttributes() !!}>
            @foreach ($component->getFormFields() as $field)
                {!! $field->render($field->getOption('template', $field->getDefaultTemplateName()), [ 'index' => $i ]) !!}
            @endforeach
            </div>
            {{-- @todo: "hotfixed" --}}
            @if ($i == 0)
                @if ($component->getOption('button-add', false))
                    {!! $component->getOption('button-add')->render() !!}
                @endif
                @if ($component->getOption('button-remove', false))
                    {!! $component->getOption('button-remove')->setOption('wrapper', [ 'attributes' => [ 'class' => 'col-xs-1 text-center hidden' ]])->render() !!}
                @endif
            @else
                @if ($component->getOption('button-remove', false))
                    {!! $component->getOption('button-remove')->setOption('wrapper', [ 'attributes' => [ 'class' => 'col-xs-1 text-center' ]])->render() !!}
                @endif
            @endif
        </div>
    @endfor
    </fieldset>
@endif
</div>