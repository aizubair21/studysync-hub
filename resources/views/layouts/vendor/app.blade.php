</html>
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

    {{-- livewire style  --}}
    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- vite Scripts and css-->
    @include('components.style')

</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm">


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
        {{-- <div class="content-wrapper px-4">
        </div> --}}
        <div>

            {{-- alert messages --}}
            {{-- @if (session('success'))
                <div class="alert alert-success" role="alert"><strong>{{ session('success') }}</strong></div>
            @endif
            <p>show error</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            @yield('content')
        </div>

    </div>
    {{-- wrapper --}}


    {{-- livewire script --}}
    @livewireScripts

</body>

</html>
