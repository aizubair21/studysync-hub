<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- vite Scripts and css-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- livewire style  --}}
    @livewireStyles
</head>

<body>

    {{-- top navigation menue --}}
    {{-- @include($navigationMenu) --}}

    {{-- main content --}}
    <div class="hold-transition sidebar-mini layout-fixed text-sm">

        <style>
            .spinner {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 100%;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 99999;
                background-color: lightgray;
            }

            .spin {
                width: 50px;
                height: 50px;
                background-color: transparent;
                border-style: solid;
                border-width: 8px;
                border-color: darkgray, darkgray, darkgray, transparent;
                animation: spin 2s linear infinite;
                /* border-radius: 50%; */
            }

            @keyframes spin {
                100% {
                    transform: rotate(360deg)
                }
            }
        </style>

        {{-- livewire navigating spinner --}}
        <div wire:loading class="spinner">
            <div class="spin"></div>
        </div>
        {{-- livewire navigating spinner --}}

        {{-- wrapper --}}
        <div class="wrapper">
            {{-- main asside content  --}}

            @yield('content')

        </div>
        {{-- wrapper --}}

    </div>
    {{-- main content --}}

    {{-- livewire script --}}
    @livewireScripts
</body>

</html>
