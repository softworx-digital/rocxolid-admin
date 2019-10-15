@if ($component->getFormFields())
    <fieldset {!! $component->getHtmlAttributes('wrapper') !!}>
    @for ($i = 0; $i <= ($component->getFormFieldGroup()->getGroupCount() - 1); $i++)
        <div {!! $component->getHtmlAttributes('row') !!}>
            <div {!! $component->getHtmlAttributes() !!}>
            @foreach ($component->getFormFields() as $field)
                {!! $field->render($field->getOption('template', $field->getDefaultTemplateName()), [ 'index' => $i ]) !!}
            @endforeach
            </div>
            {{-- @todo - kind of hacky - mozno domysliet neskor --}}
            @if ($i == 0)
                @if ($component->getOption('button-add', false))
                    {!! $component->getOption('button-add')->render() !!}
                @endif
                @if ($component->getOption('button-remove', false))
                    {!! $component->getOption('button-remove')->setOption('wrapper', [ 'attributes' => [ 'class' => 'col-xs-2 hidden' ]])->render() !!}
                @endif
            @else
                @if ($component->getOption('button-remove', false))
                    {!! $component->getOption('button-remove')->setOption('wrapper', [ 'attributes' => [ 'class' => 'col-xs-2' ]])->render() !!}
                @endif
            @endif
        </div>
    @endfor
    </fieldset>
@endif