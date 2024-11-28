<div class="bg-gray-900 hidden text-white md:block h-screen z-50">
    <!-- site logo  -->
    <div class="flex justify-center font-bold w-full items-center mb-2 p-2">
        <img src="{{ asset('/media/profile-white.png') }}" width="40"
            class="me-2  p-1 border bg-green-900 rounded-full shadow-md" alt="">
        SSH
    </div>

    <!--aside items -->
    <div class="p-3 text-md relative">
        <a href="{{ route('student-dashboard') }}" wire:navigate
            class="my-2 block p-2 text-center text-md hover:bg-gray-700 mb-1 shadow-lg text-white rounded-lg @if(request()->routeIs("student-dashboard")) font-bold bg-green-900 @endif ">
            <img class="mx-auto" width="30" src="{{ asset('media/home-white.png') }}" alt="home" />
            Dashboard
        </a>
        <!-- \item  -->
        <div class="my-2 block ">
            <a href="{{ route('memberExam.live') }}" wire:navigate
                class="my-2 block p-2 text-center text-md hover:bg-gray-700 mb-1 shadow-lg text-white rounded-lg @if(request()->routeIs("memberExam.live")) font-bold bg-green-900 @endif ">
                <img class="mx-auto" width="30" src="{{ asset('media/home-white.png') }}" alt="home" />
                Live Exams
            </a>
        </div>
        
        <div class="my-2 block ">
            <a href="{{ route('memberArchieveExams.index') }}" wire:navigate
                class="my-2 block p-2 text-center text-md hover:bg-gray-700 mb-1 shadow-lg text-white rounded-lg @if(request()->routeIs("memberArchieveExams.index")) font-bold bg-green-900 @endif ">
                <img class="mx-auto" width="30" src="{{ asset('media/home-white.png') }}" alt="home" />
                Archive Exams
            </a>
        </div>

        <!-- \end{code} -->
        {{-- <div  class="my-2 block">
            <div onmouseenter="showSideNav('navMember')" data-aside="navMember" class="cursor-pointer my-2 block p-2 text-center text-md shadow-sm  hover:bg-gray-700 rounded-lg @if(request()->routeIs("vendorMember.*")) font-bold bg-green-900 @endif ">
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

        </div> --}}

        <!-- \end{code} -->
        {{-- <a wire:navigate onmouseenter="showSideNav('')" href="{{route('vendorQuestions.index')}}" class="block my-2 p-2 text-center text-md shadow-sm  hover:bg-gray-700 rounded-lg ">
            <img src="{{ asset('media/check-list-white.png') }}" class="mx-auto" width="30" alt="">
            Questions
        </a> --}}

        <!-- \end{code} -->
        {{-- <a wire:navigate href="#" class="my-2 block p-2 text-center text-md shadow-sm  hover:bg-gray-700 rounded-lg ">
            <img src="{{ asset('media/settings-white.png') }}" class="mx-auto" width="30" alt="">
            Settings
        </a> --}}

    </div>
</div>
