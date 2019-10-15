@if (false)
{!! Form::open($component->getOptions()->toArray()) !!}
    @if (isset($errors) && $errors->count())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <fieldset>
    @foreach ($component->getFormFieldGroupsComponents() as $fieldgroup)
        {{-- @if (!in_array($field->getName(), $exclude)) --}}
            {!! $fieldgroup->render($fieldgroup->getOption('template', $fieldgroup->getDefaultTemplateName())) !!}
        {{-- @endif --}}
    @endforeach

    @foreach ($component->getFormFieldsComponents() as $field)
        {{-- @if (!in_array($field->getName(), $exclude)) --}}
            {!! $field->render($field->getOption('template', $field->getDefaultTemplateName())) !!}
        {{-- @endif --}}
    @endforeach
    </fieldset>

    @foreach ($component->getFormButtonToolbarsComponents() as $buttontoolbar)
        {!! $buttontoolbar->render($buttontoolbar->getOption('template', $buttontoolbar->getDefaultTemplateName())) !!}
    @endforeach

    @foreach ($component->getFormButtonGroupsComponents() as $buttongroup)
        {!! $buttongroup->render($buttongroup->getOption('template', $buttongroup->getDefaultTemplateName())) !!}
    @endforeach

    @foreach ($component->getFormButtonsComponents() as $button)
        {!! $button->render($button->getOption('template', $button->getDefaultTemplateName())) !!}
    @endforeach
{!! Form::close() !!}
@endif