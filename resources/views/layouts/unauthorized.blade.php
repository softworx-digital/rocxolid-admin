<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
@include('rocXolid::layouts.include.head')

<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                @yield('content')
            </div>
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
    @yield('script')
</body>
</html>