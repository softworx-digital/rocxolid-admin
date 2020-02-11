<div class="top_nav @if (config('rocXolid.admin.layout.topbar.fixed')) navbar-static-top @endif {{ config('rocXolid.admin.layout.topbar.class') }}">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle visible-xs-block visible-sm-block">
                <a id="menu-toggle"><i class="fa fa-bars"></i></a>
            </div>

        @if ($user)
            @if ($user->isRoot() && config('rocXolid.admin.auth.check_permissions_root', false))
            <div class="toggle">
                <i class="fa fa-exclamation-triangle fa-2x margin-right-10 text-danger" aria-hidden="true" title="{{ $component->translate('auth.check-permissions-root-enabled') }}"></i>
            </div>
            @endif

            {!! $user->getModelViewerComponent()->render('wrapped.topbar', [ 'wrapper' => $component ]) !!}
        @else
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="user-profile">
                        <span>{{ $component->translate('auth.anonymous') }}</span>
                    </a>
                </li>
            </ul>
        @endif
        </nav>
    </div>
</div>