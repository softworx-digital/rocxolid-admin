<div class="col-md-3 left_col @if (config('rocXolid.admin.layout.sidebar.fixed')) menu_fixed @endif {{ config('rocXolid.admin.layout.sidebar.class') }}">
    <div class="left_col">
        <div class="fixed-scroll">
            <div class="navbar nav_title text-center">
                <a href="{{ route('rocxolid.index') }}" class="site_title">{{ Html::image('vendor/softworx/rocXolid/images/branding/rocXolid-white.png', 'rocXolid') }}</a>
            </div>
            <div class="clearfix"></div>
        @if ($user)
            <div class="profile clearfix">
                <div class="profile_pic">
                    {{ Html::image('vendor/softworx/rocXolid/images/user-placeholder.svg', $user->name, [ 'class' => 'img-circle profile_img' ]) }}
                </div>
                <div class="profile_info">
                    <span>{{ $component->translate('text.welcome', false) }}</span>
                    <h2>{{ $user->name }}</h2>
                </div>
            </div>
        @endif
        </div>

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        @foreach ($sections as $section)
            {!! $section->render('section') !!}
        @endforeach
        </div>

        <div class="sidebar-footer hidden-small">
        @if (false)
            <a title="Settings"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
            <a title="FullScreen"><span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span></a>
            <a title="Lock"><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span></a>
        @endif
        @if ($user)
            <a title="{{ $component->translate('text.user.logout', false) }}" href="{{ route('rocxolid.logout') }}" style="width: 100%;"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
        @endif
        </div>
    </div>
</div>