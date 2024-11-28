<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('media/studysync-hub.jpg') }}" type="image/x-icon">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <title>@yield('title')</title>


    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @vite('resources/css/app.css') --}}
    
    
    @livewireStyles


    <style>
        .content-wrapper {
            /* background-color: #fff !important; */
            height: 90vh;
            overflow-y: auto;
            overflow-x: hidden;
        }
        .asideChild{
            z-index: 0!important;
            opacity: 0;
        }
        input[type="checkbox"]:checked {
            background-color: green; /* or any other color you prefer */
            border-color: #fff; /* optional */
            background: #000;
            background-image: "";
        }
    </style>
</head>


{{-- <body class="hold-transition sidebar-mini layout-fixed text-sm overflow-hidden"> --}}

<body class="overflow-hidden">


    <div class="">

       
        {{-- @if ($errors->any())
            <div class="">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="flex justify-between items-center text-red-900 text-red px-2 py-1 text-sm font-bold" >
                            
                            <div class="">
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
        @endif --}}
    </div>

    {{-- @include('components.spinner') --}}
    {{-- @include('layouts.vendor.partials.navigations') --}}
    {{-- top navigation menue --}}

    {{-- <div class="wrapper">

        @auth
            @include('layouts.vendor.partials.asside')

            @include('layouts.vendor.partials.navigations')
        @endauth

        <div class="content-wrapper px-3 bg-slate-200">

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

            @yield('content')
        </div>
    </div> --}}
    {{-- wrapper --}}

    <!-- tailwind css admin layouts  -->
    <div class="flex  w-full justify-start items-start h-screen mt-1">

        @include("layouts.vendor.partials.asside")

        <!-- content  -->
        <div class="bg-gray-300 w-full text-md h-screen overflow-y-scroll" onmouseenter="hideSideNav()">

            @include("layouts.vendor.partials.navigations")
           

            <!-- main content  -->
            <div class="text-md">
                @if (session('success'))
                    <div class="flex justify-between items-center bg-green-900 text-white px-2 py-1 text-sm font-bold">
                        <div>{{ session("success") }}</div>
                        
                        <button onclick="this.parentElement.remove()" class="p-1 w4 rounded ">
                            x
                        </button>
        
                    </div>
                @endif
                @yield('content')
            </div>

        </div>

    </div>


    {{-- livewire script --}}
    @livewireScripts

@once
    <script>
        function hideSideNav() {
            let sideNavChild = document.querySelectorAll(".asideChild");
            sideNavChild.forEach(element => {
                element.style.transition = "opacity linear .4s";
                // element.style.transition = "ease-in-out";
                element.style.opacity = 0;
                element.style.left = -700 + "%";
            })
        }
        function showSideNav(sideNav) {
            hideSideNav();
            // console.log("sideNav");
            document.getElementById(sideNav).style.left = 100 + "%";
            document.getElementById(sideNav).style.transition = "opacity linear .4s";
            // document.getElementById(sideNav).style.transition = "ease-in-out";
            document.getElementById(sideNav).style.opacity = 1;
            
        }

        document.body.addEventListener("click", () => {
            hideSideNav();
        })



        // mobile device aside control 
        function showMobileAside() {
            let mobileAside = document.getElementById('mobileAside');
            if (mobileAside.classList.contains("w-1/2")) {
                mobileAside.style.transition = 'ease-in-out';
                mobileAside.classList.remove("w-1/2");
                mobileAside.classList.add("w-0");
            } else {
                mobileAside.style.transition = 'ease-in-out';
                mobileAside.classList.remove("w-0");
                mobileAside.classList.add("w-1/2");

            }
        }

        // mobile device aside items show/hide control 
        // let mSidebarItem = document.querySelectorAll(".m_sidebarItem");
        document.querySelectorAll(".m_sidebarItem").forEach((item, index) => {
            // console.log(index);
            
            item.addEventListener("click", () => {

                let mSiderbarContent = item.getElementsByClassName('m_sidebarContent')[0];
                // console.log(mSiderbarContent);
                if (mSiderbarContent.classList.contains('h-0')) {
                    console.log('contains and removed');
                    mSiderbarContent.classList.remove('h-0');
                    mSiderbarContent.style.transition = "ease-in-out .3s";
                } else {
                    console.log('added');
                    
                    mSiderbarContent.classList.add('h-0');
                    mSiderbarContent.style.transition = "ease-in-out .3s";

                }
            })
        });
    </script>
@endonce

</body>

</html>
