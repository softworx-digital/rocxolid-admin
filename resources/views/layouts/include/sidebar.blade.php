<div class="col-md-3 left_col content-out @if (config('rocXolid.admin.layout.sidebar.fixed')) menu_fixed @endif {{ config('rocXolid.admin.layout.sidebar.class') }}">
    <div class="left_col">
        <div class="fixed-scroll">
            <div class="navbar nav_title text-center">
            @if (config('app.sidebar-logo', false))
                <a href="{{ route('rocXolid.admin.index') }}" class="site_title">{{ Html::image(config('app.sidebar-logo'), 'Admin', [ /*'style' => 'height: 30px;'*/ ]) }}</a>
            @else
                <a href="{{ route('rocXolid.admin.index') }}" class="site_title">{{ Html::image('vendor/softworx/rocXolid/images/branding/rocXolid-white.png', 'rocXolid') }}</a>
            @endif
            @if (config('app.sidebar-title', false))
                <small>{{ config('app.sidebar-title') }}</small>
            @endif
            </div>
            <div class="clearfix"></div>
            <div class="margin-top-20">
            @if (config('rocXolid.admin.layout.sidebar.profile') && $user)
                {!! $user->getModelViewerComponent()->render('wrapped.sidebar', [ 'wrapper' => $component ]) !!}
            @endif
            </div>
        </div>

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu margin-top-20">
        @foreach ($sections as $section)
            {!! $section->render('section', [ 'section_loop' => $loop ]) !!}
        @endforeach
        </div>

        <div class="sidebar-footer hidden-small">
        @if (false)
            <a title="Settings"><span class="glyphicon glyphicon-cog"></span></a>
            <a title="FullScreen"><span class="glyphicon glyphicon-fullscreen"></span></a>
            <a title="Lock"><span class="glyphicon glyphicon-eye-close"></span></a>
        @endif
        @if ($user)
            <a title="{{ $component->translate('auth.logout') }}" href="{{ route('rocXolid.auth.logout') }}" class="width-100"><i class="fa fa-power-off"></i></a>
        @endif
        </div>
    </div>
</div>