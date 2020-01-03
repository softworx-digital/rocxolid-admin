<footer class="{{ config('rocXolid.admin.layout.footer.class') }}">
    <div class="pull-left online-users">
    @if ($online_users && $online_users->count())
        <strong><i class="fa fa-users"></i> {{ $component->translate('auth.online-list') }}</strong>
        @foreach ($online_users as $online_user)
            <a class="label label-info" data-ajax-url="{{ $online_user->getControllerRoute() }}"><i class="fa fa-user"></i> {{ $online_user->name }}</a>
        @endforeach
    @else
        &nbsp;
    @endif
    </div>
    <div class="pull-right">
        <b><a href="{{ route('rocXolid.admin.index') }}">{{ Html::image('vendor/softworx/rocXolid/images/branding/rocXolid-tiny.png', 'rocXolid') }}</a> &ndash; CMS & Commerce platform by <a href="https://softworx.digital/" target="_blank">{{ Html::image('vendor/softworx/rocXolid/images/branding/softworx-tiny.png', 'softworx') }}</a></b>
    </div>
    <div class="clearfix"></div>
</footer>