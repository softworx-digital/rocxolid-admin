<div id="{{ $component->getDomId('modal-show-body', $component->getModel()->getKey()) }}">
    <div class="panel with-nav-tabs panel-default">
        <div class="panel-heading padding-bottom-0">
            {!! $component->render('include.nav', [ 'ajax' => true, 'tab' => $tab  ?? 'default' ]) !!}
        </div>

        <div class="panel-body">
            {!! $component->render(sprintf('tab.%s', $tab ?? 'default')) !!}
        </div>
    </div>
</div>