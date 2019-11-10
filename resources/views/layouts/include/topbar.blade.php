<div class="top_nav @if (config('rocXolid.admin.layout.topbar.fixed')) navbar-static-top @endif {{ config('rocXolid.admin.layout.topbar.class') }}">
    <div class="nav_menu">
        <nav>
        @if (false)
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
        @endif

        @if ($user)
            @if ($user->isRoot() && config('rocXolid.admin.auth.check_permissions_root', false))
            <div class="toggle">
                <i class="fa fa-exclamation-triangle fa-2x margin-right-10 text-danger" aria-hidden="true" title="{{ $component->translate('auth.check-permissions-root-enabled', false) }}"></i>
            </div>
            @endif

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        {{ Html::image('vendor/softworx/rocXolid/images/user-placeholder.svg', $user->name) }}
                        <span>{{ $user->name }}</span>
                        <span class=" fa fa-angle-down margin-left-10"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li>
                            <a href="{{ $user->getProfileControllerRoute() }}"><i class="fa fa-id-badge"></i> {{ $component->translate('auth.profile', false) }}</a>
                        </li>
                        <li>
                            <a href="{{ $user->getProfileControllerRoute('settings') }}"><i class="fa fa-cog"></i> {{ $component->translate('auth.settings', false) }}</a>
                        </li>
                        <li>
                            <a href="{{ route('rocXolid.auth.logout') }}"><i class="fa fa-sign-out"></i> {{ $component->translate('auth.logout', false) }}</a>
                        </li>
                    </ul>
                </li>
            @if (false)
                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">1</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a>
                                <span class="image">{{ Html::image('images/img.jpg', 'username') }}</span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">Film festivals used to be do-or-die moments for movie makers. They were where...</span>
                            </a>
                        </li>
                        <li>
                            <div class="text-center">
                                <a>
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            @endif
            </ul>
        @else
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="user-profile">
                        <span>{{ $component->translate('auth.anonymous', false) }}</span>
                    </a>
                </li>
            </ul>
        @endif
        </nav>
    </div>
</div>