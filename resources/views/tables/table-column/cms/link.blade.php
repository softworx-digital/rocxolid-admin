@if ($component->getOption('model')->getFrontpageUrl($component->getOption('attribute_param')) != '#')
    <a href="{{ $component->getOption('model')->getFrontpageUrl($component->getOption('attribute_param')) }}" target="_blank"><i class="fa fa-external-link fa-lg margin-right-5"></i>{{ $component->getOption('model')->getFrontpageUrl($component->getOption('attribute_param')) }}</a>
@elseif (false)
    <i class="fa fa-question-circle fa-lg text-warning" title="@lang('rocXolid::general.text.undefined') {{ $component->translate('field.url') }} / {{ $component->translate('field.page') }} / {{ $component->translate('field.pageProxy') }}"></i>
@else
    <i class="fa fa-question-circle fa-lg text-warning" title="@lang('rocXolid::general.text.undefined')"></i>
@endif