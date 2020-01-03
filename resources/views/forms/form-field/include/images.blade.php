<div id="{{ $component->getDomId('images', $component->getFormField()->getName()) }}" class="row">
    <div class="col-xs-12">
    @if ($component->getFormField()->getForm()->getModel()->{$component->getFormField()->getName()} instanceof \Illuminate\Support\Collection)
        <ul class="list-unstyled sortable images col-xs-12" data-update-url="{{ $component->getFormField()->getForm()->getModel()->getControllerRoute('reorder', [ 'relation' => $component->getFormField()->getName() ]) }}">
        @foreach ($component->getFormField()->getForm()->getModel()->{$component->getFormField()->getName()} as $image)
            <li data-item-id="{{ $image->id }}" class="d-inline-block">
                <div class="img img-small @if ($image->is_model_primary) highlight @endif" @if ($image->is_model_primary) title="{{ __('rocXolid:admin::general.text.image-primary') }}" @endif>
                    {{--
                    <img style="max-width: {{ $component->getFormField()->getForm()->getModel()->getImageDimension($image->model_attribute, $component->getOption('image-preview-size'))->width }}px;" src="{{ $image->getControllerRoute('get', [ 'dimension' => $component->getOption('image-preview-size') ]) }}"/>
                    --}}
                    <img src="{{ asset($image->getPath($component->getOption('image-preview-size'))) }}" alt="{{ $image->alt }}"/>
                    <div class="btn-group show-up">
                        <button class="btn btn-primary" data-ajax-url="{{ $image->getControllerRoute('edit') }}"><i class="fa fa-pencil"></i></button>
                        <span class="btn btn-default drag-handle"><i class="fa fa-arrows"></i></span>
                        <button class="btn btn-danger" data-ajax-url="{{ $image->getControllerRoute('destroyConfirm') }}"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
    @elseif ($component->getFormField()->getForm()->getModel()->{$component->getFormField()->getName()}()->exists())
        <ul class="list-unstyled images col-xs-12">
        @foreach (collect([ $component->getFormField()->getForm()->getModel()->{$component->getFormField()->getName()} ]) as $image)
            <li data-item-id="{{ $image->id }}" class="d-inline-block">
                <div class="img img-small @if ($image->is_model_primary) highlight @endif" @if ($image->is_model_primary) title="{{ __('rocXolid:admin::general.text.image-primary') }}" @endif>
                    {{--
                    <img style="max-width: {{ $component->getFormField()->getForm()->getModel()->getImageDimension($image->model_attribute, $component->getOption('image-preview-size'))->width }}px;" src="{{ $image->getControllerRoute('get', [ 'dimension' => $component->getOption('image-preview-size') ]) }}"/>
                    --}}
                    <img src="{{ asset($image->getPath($component->getOption('image-preview-size'))) }}" alt="{{ $image->alt }}"/>
                    <div class="btn-group show-up">
                        <button class="btn btn-primary" data-ajax-url="{{ $image->getControllerRoute('edit') }}"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger" data-ajax-url="{{ $image->getControllerRoute('destroyConfirm') }}"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
    @elseif (false)
        <div class="img img-small d-inline-block">
                {{ Html::image('vendor/softworx/rocXolid/images/user-placeholder.svg') }}
        </div>
    @endif
    </div>
</div>