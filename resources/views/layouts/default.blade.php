<!DOCTYPE html>
<html lang="{{ env('localisation') }}">
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
            registrationUrl: '{{ route('rocXolid.auth.registration') }}',
            pingUrl: '{{ route('rocXolid.auth.ping') }}'
        }
    </script>
    <script src="{{ asset(mix('js/rocXolid.js', 'vendor/softworx/rocXolid')) }}"></script>
    @stack('script')
</body>
</html>