<div class="table-filter-field col-md-2 col-sm-3 col-xs-4 padding-0">
    <div class="input-group">
        {!! $component->render($component->getOption('type-template')) !!}
    @if ($component->getOption('reset-button', true))
        <div class="input-group-btn">
            <button class="btn btn-danger" type="reset" data-click-reset="{{ $component->getTableFilter()->getFieldName() }}"><i class="fa fa-times"></i></button>
        </div>
    @endif
    </div>
</div>