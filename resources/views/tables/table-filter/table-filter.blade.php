<div class="col-md-2 col-sm-3 col-xs-4 padding-0">
    <div class="input-group">
        {!! $component->render($component->getOption('type-template')) !!}
        <div class="input-group-btn">
            <button class="btn btn-danger" type="reset" data-click-reset="{{ $component->getTableFilter()->getFieldName() }}"><i class="fa fa-times"></i></button>
        </div>
    </div>
</div>