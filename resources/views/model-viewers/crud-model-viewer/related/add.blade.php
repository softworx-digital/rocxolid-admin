@can ('create', [ $related, $attribute ])
<div class="row margin-bottom-10">
    <div class="col-xs-12">
        <a class="btn btn-primary pull-right margin-top-5" data-ajax-url="{{ $component->getModel()->getControllerRoute('create', $component->getModel()->getRouteRelationParam($attribute, $relation, $related)) }}"><i class="fa fa-plus margin-right-5"></i> {{ $component->translate('model.title.singular') }}</a>
    </div>
</div>
@endcan