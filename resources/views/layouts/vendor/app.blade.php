<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('media/studysync-hub.jpg') }}" type="image/x-icon">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <title>@yield('title')</title>


    @livewireStyles

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @vite('resources/css/app.css') --}}




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

        @if (session('success'))
            <div class="alert alert-success" role="alert"><strong>{{ session('success') }}</strong></div>
        @endif
        @if ($errors->any())
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
        @endif
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
    <div class="flex  w-full justify-start items-start h-screen">

        <!-- aside -->
        <div class="bg-gray-900 hidden text-white md:block h-screen z-50">
            <!-- site logo  -->
            <div class="flex justify-center font-bold w-full items-center mb-2 p-2">
                <img src="{{ asset('/media/profile-white.png') }}" width="40"
                    class="me-2  p-1 border bg-green-900 rounded-full shadow-md" alt="">
                SSH
            </div>

            <!--aside items -->
            <div class="p-3 text-md relative">
                <a href="{{ route('dashboard') }}" wire:navigate
                    class="my-2 block p-2 text-center text-md font-bold bg-green-900 hover:bg-gray-700 mb-1 shadow-lg text-white rounded-lg @if(request()->routeIs("dashboard")) font-bold bg-green-900 @endif ">
                    <img class="mx-auto" width="30" src="{{ asset('media/home-white.png') }}" alt="home" />
                    Home
                </a>
                <!-- \item  -->
                <div class="my-2 block ">
                    <div onmouseenter="showSideNav('navSchedule')" data-aside="navSchedule"
                        class="cursor-pointer my-2 block p-2 text-center text-md shadow-sm  hover:bg-gray-700 rounded-lg  @if(request()->routeIs("vendorSchedule.*")) font-bold bg-green-900 @endif">
                        <img src="{{ asset('media/exam-white.png') }}" class="mx-auto" width="30" alt="">
                        Schedule
                    </div>
                    <div id="navSchedule"
                        class="asideChild bg-gray-500 h-screen text-md absolute top-0 transition w-48 left-[-500%]">
                        <div class="text-lg px-4 py-2 mt-4 font-bold">Schedule </div>
                        <div class="block">
                            <a class="px-4 block py-2 " href="{{ route('vendorExamSchedule.index') }}" wire:navigate>My
                                Schedule</a>
                            <a class="px-4 block py-2 " href="{{ route('vendorExamSchedule.create') }}"
                                wire:navigate>Schedule Create </a>
                        </div>
                        <hr class="my-1">

                        <div class="text-lg px-4 py-2 mt-4 font-bold">Groups </div>
                        <div class="block">
                            <a class="px-4 block py-2 " wire:navigate href="{{route("vendorGroup.index")}}" wire:navigate>My Groups</a>
                            <a class="px-4 block py-2 transition" wire:navigate href="{{route("vendorGroup.create")}}" wire:navigate>Group Create </a>
                        </div>
                    </div>
                </div>

                <!-- \end{code} -->
                <div  class="my-2 block">
                    <div onmouseenter="showSideNav('navMember')" data-aside="navMember" class="cursor-pointer my-2 block p-2 text-center text-md shadow-sm  hover:bg-gray-700 rounded-lg ">
                        <img src="{{ asset('media/profile-white.png') }}" class="mx-auto" width="30" alt="">
                        Member
                    </div>

                    <div id="navMember"
                        class="asideChild bg-gray-500 h-screen text-md absolute top-0 transition w-48 left-[-500%]">
                        <div class="text-lg px-4 py-2 mt-4 font-bold">Member</div>
                        <div class="block">
                            <a class="px-4 block py-2 " href="{{ route('vendorMember.index') }}" wire:navigate>My
                                Members </a>
                            <a class="px-4 block py-2 " href="{{ route('vendorExamSchedule.create') }}"
                                wire:navigate> Add Member </a>
                        </div>
                        <hr class="my-1">

                        <div class="text-lg px-4 py-2 mt-4 font-bold">Groups </div>
                        <div class="block">
                            <a class="px-4 block py-2 " wire:navigate href="{{route("vendorGroup.index")}}" wire:navigate>My Groups</a>
                            <a class="px-4 block py-2 transition" wire:navigate href="{{route("vendorGroup.create")}}" wire:navigate>Group Create </a>
                        </div>
                    </div>

                </div>

                <!-- \end{code} -->
                <a wire:navigate onmouseenter="showSideNav('')" href="{{route('vendorQuestions.index')}}" class="block my-2 block p-2 text-center text-md shadow-sm  hover:bg-gray-700 rounded-lg ">
                    <img src="{{ asset('media/check-list-white.png') }}" class="mx-auto" width="30" alt="">
                    Questions
                </a>

                <!-- \end{code} -->
                <a wire:navigate href="#" class="my-2 block p-2 text-center text-md shadow-sm  hover:bg-gray-700 rounded-lg ">
                    <img src="{{ asset('media/settings-white.png') }}" class="mx-auto" width="30" alt="">
                    Settings
                </a>

            </div>
        </div>

        {{-- mobile asside  --}}
        <div id="mobileAside" class=" h-screen md:hidden bg-gray-900 w-0 text-white">
            <div class="w-full">

                <!-- site logo  -->
                <a href=""
                    class="md:sticky top-0 bg-gray-100 flex border-b justify-center font-bold w-full items-center mb-2 p-2">
                    <img src="assets/image/profile-white.png" width="40"
                        class="me-2  p-1 border bg-green-900 rounded-full shadow-md" alt="">

                </a>

                <!-- <div>
                    <a href="" wire:navigate
                        class="font-normal my-1 p-2 hover:bg-green-100 text-md flex items-center justify-start text-start">
                        <img src="assets/image/home-white.png" width="40" class="p-1 me-3" alt="">
                        Dashboard
                    </a>
                </div> -->

                <!-- schedule  -->
                <div class="m_sidebarItem overflow-hidden cursor-pointer my-1 p-2 hover:bg-gray-300">
                    <div class="font-normal flex items-center justify-start">
                        <img src="{{asset('media/exam-white.png')}}" class="p-1 me-3" alt="">
                        Schedule
                    </div>

                    <div class="m_sidebarContent flex h-0" style="width: 200px;">
                        <div class=" block " "></div>
                        <div class=" block py-2">
                            <a href="" class="text-green-900 font-bold block text-sm px-4 py-1 mb-1 border-s">
                                My Schedule
                            </a>
                            <a href="" class="block text-sm px-4 py-1 mb-1 border-s">
                                Create Schedule
                            </a>
                        </div>
                    </div>

                </div>

                <!-- member  -->
                <div class="m_sidebarItem overflow-hidden cursor-pointer my-1 p-2 hover:bg-gray-300">
                    <div class="font-normal flex items-center justify-start">
                        <img src="{{asset('media/exam-white.png')}}" class="p-1 me-3" alt="">
                        Member
                    </div>

                    <div class="m_sidebarContent flex h-0" style="width: 200px;">
                        <div class=" block " "></div>
                        <div class=" block py-2">
                            <a href="" class="block text-sm px-4 py-1 mb-1 border-s">
                                My Schedule
                            </a>
                            <a href="" class="block text-sm px-4 py-1 mb-1 border-s">
                                Create Schedule
                            </a>
                        </div>
                    </div>

                </div>

                <!-- question  -->
                <div class="m_sidebarItem overflow-hidden cursor-pointer my-1 p-2 hover:bg-gray-300">
                    <a href="{{route('vendorQuestions.index')}}" class="block font-normal flex items-center justify-start">
                        <img src="{{asset('media/exam-white.png')}}" class="p-1 me-3" alt="">
                        Questions
                    </a>

                </div>

            </div>
        </div>


        <!-- content  -->
        <div class="bg-gray-300 w-full text-md h-screen overflow-y-scroll" onmouseenter="hideSideNav()">

            <!-- main nav -->
            <nav id="nav" class="bg-white shadow-sm scrolbar-none sticky top-0 border-b  w-full flex justify-between items-center px-3" style="z-index: 9999">
                <div class="flex items-center">

                    <div class="md:hidden" onclick="showMobileAside()">
                        <style>
                            /* From Uiverse.io by vinodjangid07 */
                            #checkbox {
                                display: none;
                            }

                            .toggle {
                                position: relative;
                                width: 35px;
                                height: 40px;
                                cursor: pointer;
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                justify-content: center;
                                gap: 3px;
                                transition-duration: .5s;
                            }

                            .bars {
                                width: 100%;
                                height: 4px;
                                background-color: #000;
                                border-radius: 4px;
                            }

                            #bar2 {
                                transition-duration: .8s;
                            }

                            #bar1,
                            #bar3 {
                                width: 70%;
                            }

                            #checkbox:checked+.toggle .bars {
                                position: absolute;
                                transition-duration: .5s;
                            }

                            #checkbox:checked+.toggle #bar2 {
                                transform: scaleX(0);
                                transition-duration: .5s;
                            }

                            #checkbox:checked+.toggle #bar1 {
                                width: 70%;
                                transform: rotate(45deg);
                                transition-duration: .5s;
                            }

                            #checkbox:checked+.toggle #bar3 {
                                width: 70%;
                                transform: rotate(-45deg);
                                transition-duration: .5s;
                            }

                            #checkbox:checked+.toggle {
                                transition-duration: .5s;
                                transform: rotate(180deg);
                            }
                        </style>
                        <input type="checkbox" id="checkbox" onclick="showMobileAside()">
                        <label for="checkbox" class="toggle">
                            <div class="bars" id="bar1"></div>
                            <div class="bars" id="bar2"></div>
                            <div class="bars" id="bar3"></div>
                        </label>
                    </div>

                    <a href="{{ route('dashboard') }}" wire:navigate class="p-2 hidden md:block">
                        <img src="{{ asset('media/home-white.png') }}" width="40" alt="logo"
                            class="p-2 bg-green-900 rounded-full">
                    </a>


                </div>
                <div class="flex items-center">

                    <button class="p-2">
                        <img src="{{ asset('media/settings-white.png') }}" width="40" alt="logo"
                            class="p-2 hover:bg-gray-400 transition rounded-full">
                    </button>

                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="p-2">
                                <img src="{{ asset('media/profile-white.png') }}" width="40" alt="logo"
                                    class="p-2 bg-green-900 rounded-full">
                            </button>
                        </x-slot>

                        <x-slot name="content">

                            <div class="px-1 w-full">
                                <a href="" wire:navigate class="hover:bg-gray-100 hover:text-gray-50 transition rounded px-3 py-2 w-full block text-start ">
                                    <div ></div> Profile 
                                </a>
                            </div>

                            <hr class="my-1">
                            <div class="px-1 w-full">
                                <a href="" wire:navigate class="hover:bg-gray-100 hover:text-gray-50 transition rounded px-3 py-2 w-full block text-start ">
                                    <div ></div> My Exam 
                                </a>
                            </div>
                            <div class="px-1 w-full">
                                <a href="" wire:navigate class="hover:bg-gray-100 hover:text-gray-50 transition rounded px-3 py-2 w-full block text-start ">
                                    <div ></div> Create Exam 
                                </a>
                            </div>
                            <hr class="my-1">
                            
                            <div class="px-1 w-full">
                                <a href="" wire:navigate class="hover:bg-gray-100 hover:text-gray-50 transition rounded px-3 py-2 w-full block text-start ">
                                    <div ></div> Reset Password 
                                </a>
                            </div>

                            <hr class="my-1">
                            <div class="px-2 py-1">
                                <form action="{{ route('logout') }}"  method="POST">
                                    @csrf
                                    <button type="submit" class="w-full bg-gray-900 hover:bg-gray-700 transition text-white px-3 py-2 rounded ">Log Out</button>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>

                </div>
            </nav>
            <!-- main nav -->


            <!-- main content  -->
            <div class="text-md">
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
        let mSidebarItem = document.querySelectorAll(".m_sidebarItem");
        mSidebarItem.forEach((item, index) => {
            item.addEventListener("click", () => {
                let mSiderbarContent = item.getElementsByClassName('m_sidebarContent')[0];
                // console.log(mSiderbarContent);
                if (mSiderbarContent.classList.contains('h-0')) {
                    mSiderbarContent.classList.remove('h-0');
                    mSiderbarContent.style.transition = "ease-in-out .3s";
                } else {
                    mSiderbarContent.classList.add('h-0');
                    mSiderbarContent.style.transition = "ease-in-out .3s";

                }
            })
        });
    </script>
@endonce

</body>

</html>
