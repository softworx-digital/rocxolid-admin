<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@hasSection('meta-description')@yield('meta-description')@endif"/>
    <meta name="keywords" content="@hasSection('meta-keywords')@yield('meta-keywords')@endif"/>

    <title>@hasSection('title')@yield('title') | @endif{{ config('app.name', '-- undefined--') }} | Admin</title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendor/softworx/rocXolid/images/favicon/favicon-32x32.png') }}"/>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendor/softworx/rocXolid/images/favicon/favicon-16x16.png') }}"/>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendor/softworx/rocXolid/images/favicon/apple-touch-icon.png') }}"/>
    <link rel="manifest" href="{{ asset('vendor/softworx/rocXolid/images/favicon/site.webmanifest') }}"/>

    <link rel="stylesheet" href="{{ asset(mix('css/rocXolid.css', 'vendor/softworx/rocXolid')) }}">
@foreach (config('rocXolid.admin.general.stylesheets', []) as $path)
    <link rel="stylesheet" href="{{ asset($path) }}">
@endforeach
@if (config('onesignal.app_id', false))
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async="true"></script>
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "{{ config('onesignal.app_id') }}",
                notifyButton: {
                    enable: true,
                },
            });
        });
        OneSignal.push(function () {
            OneSignal.SERVICE_WORKER_PARAM = { scope: '/assets/js/' };
            OneSignal.SERVICE_WORKER_PATH = 'assets/js/OneSignalSDKWorker.js'
            OneSignal.SERVICE_WORKER_UPDATER_PATH = 'assets/js/OneSignalSDKUpdaterWorker.js'
            OneSignal.init(initConfig);
        });
    </script>
@endif
    <script type="text/javascript">
        window.Laravel = {!! json_encode([ 'csrfToken' => csrf_token() ]); !!};
        window.CKEDITOR_BASEPATH = "{{ asset('vendor/softworx/rocXolid/plugins/ckeditor4/') }}/";
    </script>
</head>