@foreach ($component->getTableColumn()->getRelationItems($component->getOption('model')) as $image)
    @if (false)
    <img style="width: {{ $component->getOption('model')->getImageSize($image->model_attribute, $component->getOption('size'))->width }}px;" src="{{ $image->getControllerRoute('get', [ 'size' => $component->getOption('size') ]) }}" alt="{{ $image->name }}"/>
    {{ Html::image($image->getControllerRoute('get', [ 'size' => $component->getOption('size') ]), $image->alt) }}
    @endif
<div class="placeholder" data-image-src="{{ $image->getControllerRoute('get', [ 'size' => $component->getOption('size') ]) }}">
    <img src="{{ $image->base64($component->getOption('size')) }}" alt="{{ $image->alt }}" class="img-blur loaded"/>
    <div style="padding-bottom: {{ 100 / $image->getWidthHeightRatio($component->getOption('size')) }}%;"></div>
</div>
@endforeach