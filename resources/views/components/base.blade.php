<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>

        <link href="/css/prism.css" rel="stylesheet" />

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">



            <!-- Page Content -->
            <main>
                <livewire:flash-container />
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        {{--        Code Prettify--}}
        <script src="/js/prism.js"></script>

    </body>
</html>
