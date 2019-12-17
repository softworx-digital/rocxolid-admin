<li class="@if ($component->getOption('attributes.disabled', false)) disabled @endif" data-form-field-group="{{ $component->getFormFieldGroup()->getName() }}">
    <a href="{{ $component->getDomIdHash($component->getFormFieldGroup()->getName()) }}" {{-- data-toggle="tab" --}} aria-expanded="false">
        <span class="nmbr">{{ $loop->iteration }}</span>
    @if ($component->getOption('wrapper.legend', false))
        {!! $component->translate($component->getOption('wrapper.legend.title')) !!}
        @if ($component->getOption('wrapper.legend.description', false))
            <br /><small>{!! $component->translate($component->getOption('wrapper.legend.description')) !!}</small>
        @endif
    @endif
    </a>
</li>