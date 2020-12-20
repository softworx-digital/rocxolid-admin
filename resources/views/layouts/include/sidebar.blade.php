<div class="col-md-3 left_col @if (config('rocXolid.admin.layout.sidebar.fixed')) menu_fixed @endif {{ config('rocXolid.admin.layout.sidebar.class') }}">
    <div class="left_col">
        <div class="fixed-scroll">
            <div class="navbar nav_title text-center">
                <a href="{{ route('rocXolid.admin.index') }}" class="site_title">{{ Html::image('vendor/softworx/rocXolid/images/branding/rocXolid-white.png', 'rocXolid') }}</a>
            </div>
            <div class="clearfix"></div>
        @if (config('rocXolid.admin.layout.sidebar.profile') && $user)
            {!! $user->getModelViewerComponent()->render('wrapped.sidebar', [ 'wrapper' => $component ]) !!}
        @endif
        </div>

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        @foreach ($sections as $section)
            {!! $section->render('section', [ 'section_loop' => $loop ]) !!}
        @endforeach
        </div>

        <div class="sidebar-footer hidden-small">
        @if (false)
            <a title="Settings"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
            <a title="FullScreen"><span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span></a>
            <a title="Lock"><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span></a>
        @endif
        @if ($user)
            <a title="{{ $component->translate('auth.logout') }}" href="{{ route('rocXolid.auth.logout') }}" class="width-100"><i class="fa fa-power-off"></i></a>
        @endif
        </div>
    </div>
</div>