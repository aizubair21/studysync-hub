<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('media/studysync-hub.jpg') }}" type="image/x-icon">
    <title>@yield('title')</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- vite Scripts and css-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}"> --}}
    @include('components.style')

    {{-- livewire style  --}}
    @livewireStyles
</head>

@auth

    <body class="hold-transition sidebar-mini layout-fixed text-sm">

        {{-- alert messages --}}
        @if (session('success'))
            <div class="alert alert-success" role="alert"><strong>{{ session('success') }}</strong></div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Site wrapper -->
        {{-- alert messages --}}

        @include('components.spinner')
        {{-- @include('layouts.vendor.partials.navigations') --}}
        {{-- top navigation menue --}}

        {{-- wrapper --}}
        <div class="wrapper">

            @include('layouts.vendor.partials.asside')

            {{-- main asside content  --}}
            @include('layouts.vendor.partials.navigations')

            @yield('content')

        </div>

        {{-- livewire script --}}
        @livewireScripts

    </body>
@else

    <body>
        <div class="wrapper">

            @yield('content')

        </div>
        {{-- wrapper --}}

        <script src="{{ asset('asset/script/particle.js') }}"></script>

        {{-- livewire script --}}
        @livewireScripts
    </body>

@endauth



</html>
