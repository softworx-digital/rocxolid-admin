<div class="top_nav @if (config('rocXolid.admin.layout.topbar.fixed')) navbar-static-top @endif {{ config('rocXolid.admin.layout.topbar.class') }}">
    <div class="nav_menu">
        <nav>
        @if (false)
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
        @endif

        @if ($user)
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    @if (false)
                        {{ Html::image('images/img.jpg', 'username') }}
                    @endif
                        <span>{{ $user->name }}</span>
                        <span class=" fa fa-angle-down margin-left-10"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{ $user->getControllerRoute() }}"> {{ $component->translate('text.user.profile', false) }}</a></li>
                        <li><a href="{{ $user->getControllerRoute('edit') }}"> {{ $component->translate('text.user.settings', false) }}</a></li>
                        <li><a href="{{ route('rocxolid.logout') }}"><i class="fa fa-sign-out pull-right"></i> {{ $component->translate('text.user.logout', false) }}</a></li>
                    </ul>
                </li>
            @if (false)
                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
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
                <li class="">
                    <a class="user-profile">
                        <span>{{ $component->translate('text.user.anonymous', false) }}</span>
                    </a>
                </li>
            </ul>
        @endif
        </nav>
    </div>
</div>