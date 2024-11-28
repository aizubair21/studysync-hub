<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('media/studysync-hub.jpg') }}" type="image/x-icon">
    <title>@yield('title') || studysync-hub</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.ginet"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- vite Scripts and css-->
    {{-- livewire style  --}}
    @livewireStyles

    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}"> --}}
    {{-- @include('components.style') --}}


    <style>
        .content-wrapper {
            background-color: #e5e5e5 !important;
            height: 90vh;
            overflow-y: auto;
        }
    </style>
</head>


<body class="">
    {{-- wrapper --}}
    <div class="flex w-full justify-start items-start ">

        @include('layouts.member.partials.asside')

        <div class="p-2 w-full h-screen overflow-y-scroll">
                
            {{-- @if (session('success'))
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
            @endif --}}
            {{-- main asside content  --}}

            @include('layouts.member.partials.navigations')
            <div class="">
                @if (session('success'))
                    <div class="flex items-center justify-between px-3 py-2 bg-green-900 text-white">
                        <div class="alert alert-success" role="alert"><strong>{{ session('success') }}</strong></div>
                        <button onclick="this.parentElement.remove()" class="p-2">x</button>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>

    {{-- livewire script --}}
    @livewireScripts

</body>

</html>
