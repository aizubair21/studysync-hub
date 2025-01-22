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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <script src="https://cdn.tailwindcss.com"></script>

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


<body class="overflow-hidden">

    <div class="flex w-full justify-start items-start h-screen mt-1">

        @include("layouts.member.partials.asside-old")

        <!-- content  -->
        <div class="bg-gray-300 w-full text-md h-screen overflow-y-scroll" onmouseenter="hideSideNav()">

            @include("layouts.member.partials.navigations")
           

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

</body>

</html>
