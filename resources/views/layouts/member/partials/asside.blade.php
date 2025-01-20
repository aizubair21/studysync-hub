{{-- <div>
    <div>
        <a wire:navigate href="{{asset("dashboard")}}" class="flex items-center w-full py-2 text-start px-3 text-sm hover:bg-gray-100">
           <img class="w-5 mr-3" src="{{asset('media/apps.png')}}" alt=""> Dashboard
        </a>

        <a wire:navigate href="{{asset("dashboard")}}" class="flex items-center w-full py-2 text-start px-3 text-sm hover:bg-gray-100">
            <img class="w-5 mr-3" src="{{asset('media/apps.png')}}" alt=""> Live
        </a>
        <hr>

        <a wire:navigate href="{{asset("dashboard")}}" class="flex items-center w-full py-2 text-start px-3 text-sm hover:bg-gray-100">
            <img class="w-5 mr-3" src="{{asset('media/apps.png')}}" alt=""> Your Exams
        </a>
        
        <a wire:navigate href="{{asset("dashboard")}}" class="flex items-center w-full py-2 text-start px-3 text-sm hover:bg-gray-100">
            <img class="w-5 mr-3" src="{{asset('media/apps.png')}}" alt=""> Schedule
        </a>
        <a wire:navigate href="{{asset("dashboard")}}" class="flex items-center w-full py-2 text-start px-3 text-sm hover:bg-gray-100">
            <img class="w-5 mr-3" src="{{asset('media/apps.png')}}" alt=""> Archieve
        </a>

        <hr>
        <a wire:navigate href="{{asset("dashboard")}}" class="flex items-center w-full py-2 text-start px-3 text-sm hover:bg-gray-100">
            <img class="w-5 mr-3" src="{{asset('media/apps.png')}}" alt=""> Groups
        </a>

        <a wire:navigate href="{{asset("dashboard")}}" class="flex items-center w-full py-2 text-start px-3 text-sm hover:bg-gray-100">
            <img class="w-5 mr-3" src="{{asset('media/apps.png')}}" alt=""> Your Vendor
        </a>
        <hr>

        <a wire:navigate href="{{asset("dashboard")}}" class="flex items-center w-full py-2 text-start px-3 text-sm hover:bg-gray-100">
            <img class="w-5 mr-3" src="{{asset('media/apps.png')}}" alt=""> Notice
        </a>


    </div>
</div> --}}






<!-- aside -->
<div class="hidden md:block h-screen z-50" style="max-width: 150px; width:100%" >
    <!-- site logo  -->
    {{-- <div class="flex justify-center font-bold w-full items-center mb-2 p-2">
        <img src="{{ asset('/media/profile-white.png') }}" width="40"
            class="me-2  p-1 border bg-green-900 rounded-full shadow-md" alt="">
        SSH
    </div> --}}
    <style>
        .asside_nav{
            display: flex;
            /* flex-direction: column; */
            justify-content: flex-start;
            align-items: center;;
        }
        .asside_nav_img{
            width: 25px;
            padding: 5px;
            /* border-radius: 50%; */
            background-color: green;
            margin-block: 8px;
        }
        .asside_nav_active
        {
            border-left: 5px solid green;
        }
       
    </style>
    <!--aside items -->
    <div class="p-3 text-md relative">
        <a href="{{ route('dashboard') }}" wire:navigate
            class="asside_nav my-2 block p-2 text-center text-md hover:bg-gray-300 bg-gray-300 mb-1 asside_nav_active @if(request()->routeIs("instructor-dashboard")) font-bold bg-gray-200  @endif ">
            <img class="mx-2 asside_nav_img" src="{{ asset('media/home-white.png') }}" alt="home" />
            Home
        </a>
        <!-- \item  -->
        <div class="my-2 block ">
            <a href="{{ route('dashboard') }}" wire:navigate
                class="asside_nav my-2 block p-2 text-center text-md hover:bg-gray-300 mb-1 @if(request()->routeIs("instructor-dashboard")) font-bold bg-gray-200  @endif ">
                <img class="mx-2 asside_nav_img" src="{{ asset('media/exam-white.png') }}" alt="home" />
                Exams
            </a>
        </div>

        <!-- \end{code} -->
        <div  class="my-2 block">
            <a href="{{ route('dashboard') }}" wire:navigate
                class="asside_nav my-2 block p-2 text-center text-md hover:bg-gray-300 mb-1 @if(request()->routeIs("instructor-dashboard")) font-bold bg-gray-200  @endif ">
                <img class="mx-2 asside_nav_img" src="{{ asset('media/exam-white.png') }}" alt="home" />
                Archieve
            </a>
        </div>

        <!-- \end{code} -->
        {{-- <a wire:navigate onmouseenter="showSideNav('')" href="{{route('vendorQuestions.index')}}" class="block my-2 p-2 text-center text-lg shadow-sm  hover:bg-gray-700 rounded-lg ">
            <img src="{{ asset('media/check-list-white.png') }}" class="mx-auto" width="30" alt="">
            Questions
        </a> --}}

        <!-- \end{code} -->
        {{-- <a wire:navigate href="#" class="my-2 block p-2 text-center text-lg shadow-sm  hover:bg-gray-700 rounded-lg ">
            <img src="{{ asset('media/settings-white.png') }}" class="mx-auto" width="30" alt="">
            Settings
        </a> --}}

    </div>
</div>

{{-- mobile asside  --}}
<style>
    #mobileAside{
        position: fixed;
        bottom: 0;
        left: 0;
    }
</style>
<div id="mobileAside" class="flex fixed bottom-0 items-center justify-center md:hidden bg-gray-900 w-full text-white">
    <a href="" class="block p-2 mx-1">
        <img width="35" src="{{asset('media/exam-white.png')}}" alt="">
    </a>
    <a href="" class="bg-green-900 block p-2 mx-1">
        <img width="35" src="{{asset('media/home-white.png')}}" alt="">
    </a>
    <a href="" class="block p-2 mx-1">
        <img width="35" src="{{asset('media/play.png')}}" alt="">
    </a>
</div>
