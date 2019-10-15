@foreach ($component->getTableColumn()->getRelationItems($component->getOption('model')) as $image)
    {{--
    <img style="width: {{ $component->getOption('model')->getImageDimension($image->model_attribute, $component->getOption('dimension'))->width }}px;" src="{{ $image->getControllerRoute('get', [ 'dimension' => $component->getOption('dimension') ]) }}" alt="{{ $image->name }}"/>
    --}}
    <img style="width: {{ $component->getOption('model')->getImageDimension($image->model_attribute, $component->getOption('dimension'))->width }}px;" src="{{ asset($image->getPath($component->getOption('dimension'))) }}" alt="{{ $image->alt }}"/>
@endforeach