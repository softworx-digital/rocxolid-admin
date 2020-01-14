<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
@include('rocXolid::layouts.include.head')

<body class="login unauthenticated" style="background-image: url({{ asset('/vendor/softworx/rocXolid/images/background/unauthenticated.jpg') }});">
    <div class="login_wrapper">
        <div class="animate fadeIn form login_form login_content x_panel">
            @yield('content')
        </div>
    </div>

    <script>
        let configuration = {};
    </script>
    <script src="{{ asset(mix('js/rocXolid.js', 'vendor/softworx/rocXolid')) }}"></script>
    @yield('script')
</body>
</html>