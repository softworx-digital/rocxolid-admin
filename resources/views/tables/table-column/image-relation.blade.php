@foreach ($component->getTableColumn()->getRelationItems($component->getOption('model')) as $image)
    @if (false)
    <img style="width: {{ $component->getOption('model')->getImageSize($image->model_attribute, $component->getOption('size'))->width }}px;" src="{{ $image->getControllerRoute('get', [ 'size' => $component->getOption('size') ]) }}" alt="{{ $image->name }}"/>
    @endif
    {{ Html::image($image->getControllerRoute('get', [ 'size' => $component->getOption('size') ]), $image->alt) }}
@endforeach