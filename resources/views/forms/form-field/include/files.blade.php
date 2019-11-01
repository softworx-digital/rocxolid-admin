<div id="{{ $component->getDomId('files', $component->getFormField()->getName()) }}" class="row padding-top-20 padding-bottom-20">
    <div class="col-xs-12">
    @if ($component->getFormField()->getForm()->getModel()->{$component->getFormField()->getName()} instanceof \Illuminate\Support\Collection)
        <ul class="list-unstyled sortable files col-xs-12" data-update-url="{{ $component->getFormField()->getForm()->getModel()->getControllerRoute('reorder', [ 'relation' => $component->getFormField()->getName() ]) }}">
        @foreach ($component->getFormField()->getForm()->getModel()->{$component->getFormField()->getName()} as $file)
            <li data-item-id="{{ $file->id }}" class="padding-5 padding-left-5">
                <div class="btn-group margin-right-5" style="margin-top: -10px;">
                    <button class="btn btn-primary" data-ajax-url="{{ $file->getControllerRoute('edit') }}"><i class="fa fa-pencil"></i></button>
                    <a class="btn btn-default" href="{{ $file->getControllerRoute('get') }}"><i class="fa fa-download"></i></a>
                    <span class="btn btn-default drag-handle"><i class="fa fa-arrows"></i></span>
                    <button class="btn btn-danger" data-ajax-url="{{ $file->getControllerRoute('destroyConfirm') }}"><i class="fa fa-trash"></i></button>
                </div>
                <i class="fa fa-file-o fa-2x margin-right-5" style="position: relative; top: 5px;"></i>
                <big>{{ $file->getTitle() }}</big>
            </li>
        @endforeach
        </ul>
    @elseif ($component->getFormField()->getForm()->getModel()->{$component->getFormField()->getName()}()->exists())
        <ul class="list-unstyled sortable files col-xs-12" data-update-url="{{ $component->getFormField()->getForm()->getModel()->getControllerRoute('reorder', [ 'relation' => $component->getFormField()->getName() ]) }}">
        @foreach (collect([ $component->getFormField()->getForm()->getModel()->{$component->getFormField()->getName()} ]) as $file)
            <li data-item-id="{{ $file->id }}" class="padding-5 padding-left-5">
                <div class="btn-group margin-right-5" style="margin-top: -10px;">
                    <button class="btn btn-primary" data-ajax-url="{{ $file->getControllerRoute('edit') }}"><i class="fa fa-pencil"></i></button>
                    <a class="btn btn-default" href="{{ $file->getControllerRoute('get') }}"><i class="fa fa-download"></i></a>
                    <span class="btn btn-default drag-handle"><i class="fa fa-arrows"></i></span>
                    <button class="btn btn-danger" data-ajax-url="{{ $file->getControllerRoute('destroyConfirm') }}"><i class="fa fa-trash"></i></button>
                </div>
                <i class="fa fa-file-o fa-2x margin-right-5" style="position: relative; top: 5px;"></i>
                <big>{{ $file->getTitle() }}</big>
            </li>
        @endforeach
        </ul>
    @endif
    </div>
</div>