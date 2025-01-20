<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('media/studysync-hub.jpg') }}" type="image/x-icon">
    <title>@yield('title')</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.ginet"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- vite Scripts and css-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}"> --}}
    {{-- @include('components.style') --}}

    {{-- livewire style  --}}
    @livewireStyles

    <style>
        .content-wrapper {
            background-color: #fff !important;
            height: 90vh;
            overflow-y: auto;
        }
    </style>
</head>


<body class="text-sm h-screen overflow-hidden">

    {{-- alert messages --}}
    @if (session('success'))
        <div class="alert alert-success" role="alert"><strong>{{ session('success') }}</strong></div>
    @endif
    @if ($errors->any())
        <div class="text text-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Site wrapper -->
    {{-- alert messages --}}

    {{-- @include('components.spinner') --}}
    {{-- @include('layouts.vendor.partials.navigations') --}}
    {{-- top navigation menue --}}

    {{-- wrapper --}}
    <div class="">

        @auth
            {{-- main asside content  --}}
            @include('layouts.member.partials.navigations')
        @endauth
        @if (session('success'))
            <div class="alert alert-success" role="alert"><strong>{{ session('success') }}</strong></div>
        @endif
        @if ($errors->any())
            <div class="text text-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class=" p-2 h-full overflow-hidden block md:flex max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
            @include('layouts.member.partials.asside')

            <div class="w-full h-screen overflow-y-scroll p-2">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- livewire script --}}
    @livewireScripts

</body>

</html>
