<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('media/studysync-hub.jpg') }}" type="image/x-icon">
    <title>@yield('title')</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}


    
    @livewireStyles

    <!-- vite Scripts and css-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="">

    {{-- wrapper --}}
    <div class="">

        <div class="">

            @if (session('success'))
                <div class="alert alert-success" role="alert"><strong>{{ session('success') }}</strong></div>
            @endif
            @if ($errors->any())
                <div class="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="flex justify-between items-center text-red-900 text-red px-2 py-1 text-sm font-bold" >
                                
                                <div class="" style="color: rgb(119, 0, 0)">
                                    {{ $error }}
                                </div>

                                <button onclick="this.parentElement.remove()" class="p-1 w-4 rounded bg-gray-200">
                                    X
                                </button>
                                
                            </li>
                           @if (!$loop->last)
                            <hr>
                           @endif
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>

    </div>

    {{-- livewire script --}}
    @livewireScripts
</body>




</html>
