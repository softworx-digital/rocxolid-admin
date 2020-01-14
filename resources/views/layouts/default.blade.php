<!DOCTYPE html>
<html lang="{{ $user->profile()->exists() && $user->profile->language()->exists() ? $user->profile->language->iso_639_1 : config('app.locale') }}">
@include('rocXolid::layouts.include.head')

<body class="nav-md @if (config('rocXolid.admin.layout.footer.fixed')) footer_fixed @endif {{ config('rocXolid.admin.layout.body.class') }}">
    <div class="container body">
        <div class="main_container">
            @include('rocXolid::layouts.include.sidebar')
            @include('rocXolid::layouts.include.topbar')
            <div class="right_col {{ config('rocXolid.admin.layout.content.class') }}" role="main">
                @yield('content')
            </div>
            @include('rocXolid::layouts.include.footer')
        </div>
    </div>

    <script>
        let configuration = {
            loginUrl: '{{ route('rocXolid.auth.login') }}',
            pingUrl: '{{ route('rocXolid.auth.ping') }}'
        };
    </script>
    <script src="{{ asset(mix('js/rocXolid.js', 'vendor/softworx/rocXolid')) }}"></script>
    @stack('script')
</body>
</html>