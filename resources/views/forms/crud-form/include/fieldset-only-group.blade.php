@if (isset($group))
@foreach ($component->getFormFieldGroupsComponents() as $name => $fieldgroup)
    @if ($name === $group)
        {!! $fieldgroup->render($fieldgroup->getOption('template', $fieldgroup->getDefaultTemplateName()), [ 'show' => $show ?? true ]) !!}
    @endif
@endforeach
@else
    <div class="alert alert-danger">Group not set for this template!</div>
@endif