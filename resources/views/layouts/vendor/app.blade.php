</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- vite Scripts and css-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- livewire style  --}}
    @livewireStyles
</head>

<body>

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
    <div class="spinner">
        <div class="spin"></div>
    </div>
    {{-- livewire navigating spinner --}}


    @include('layouts.vendor.partials.navigations')
    {{-- top navigation menue --}}

    {{-- main content --}}
    <div class="hold-transition sidebar-mini layout-fixed text-sm">

        {{-- wrapper --}}
        <div class="wrapper">

            @include('layouts.vendor.partials.asside')
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
