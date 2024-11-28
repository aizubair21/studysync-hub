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
                    class="my-2 block p-2 text-center text-md hover:bg-gray-700 mb-1 shadow-lg text-white rounded-lg @if(request()->routeIs("dashboard")) font-bold bg-green-900 @endif ">
                    <img class="mx-auto" width="30" src="{{ asset('media/home-white.png') }}" alt="home" />
                    Home
                </a>
                <!-- \item  -->
                <div class="my-2 block ">
                    <div onmouseenter="showSideNav('navSchedule')" data-aside="navSchedule"
                        class="cursor-pointer my-2 block p-2 text-center text-md shadow-sm  hover:bg-gray-700 rounded-lg  @if(request()->routeIs("vendorExamSchedule.*")) font-bold bg-green-900 @endif">
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

                </div>

                <!-- \end{code} -->
                <a wire:navigate onmouseenter="showSideNav('')" href="{{route('vendorQuestions.index')}}" class="block my-2 p-2 text-center text-md shadow-sm  hover:bg-gray-700 rounded-lg ">
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
                {{-- <a href=""
                    class="md:sticky top-0 bg-gray-100 flex border-b justify-center font-bold w-full items-center mb-2 p-2">
                    <img src="assets/image/profile-white.png" width="40"
                        class="me-2  p-1 border bg-green-900 rounded-full shadow-md" alt="">
                </a> --}}

                <div>
                    <a href="{{route("instructor-dashboard")}}" wire:navigate
                        class=" @if(request()->routeIs('instructor-dashboard')) bg-green-900 text-white @endif font-normal my-1 p-2 text-md flex items-center justify-start text-start">
                        <img src="assets/image/home-white.png" width="40" class="p-1 me-3" alt="">
                        Dashboard
                    </a>
                </div>

                <!-- schedule  -->
                <div  class="m_sidebarItem overflow-hidden cursor-pointer my-1 p-2">
                    <div class="font-normal flex items-center justify-start">
                        <img width="35" src="{{asset('media/exam-white.png')}}" class="p-1 me-1" alt="">
                        Schedule
                    </div>

                    <div class="m_sidebarContent flex ms-6 h-0 @if(request()->routeIs('vendorMember.*')) h-auto @endif" x-transition style="width: 200px;">
                        <div class=" block " "></div>
                        <div class=" block py-2">
                            <a wire:navigate href="{{route("vendorExamSchedule.index")}}" class="@if(request()->routeIs("vendorExamSchedule.index")) text-green-900 font-bold border-s @endif block text-md px-4 mb-2 ">
                                My Schedule
                            </a>
                            <a wire:navigate href="{{route("vendorExamSchedule.create")}}" class="@if(request()->routeIs("vendorExamSchedule.create")) text-green-900 font-bold border-s @endif block text-md px-4 mb-2">
                                Create Schedule
                            </a>
                        </div>
                    </div>

                </div>

                
                
                <!-- member  -->
                <div  class="m_sidebarItem overflow-hidden cursor-pointer my-1 p-2">
                    <div class="font-normal flex items-center justify-start">
                        <img width="35" src="{{asset('media/exam-white.png')}}" class="p-1 me-1" alt="">
                        Member
                    </div>

                    <div class="m_sidebarContent flex ms-6 h-0 @if(request()->routeIs('vendorMember.*')) h-auto @endif" x-transition style="width: 200px;">
                        <div class=" block " "></div>
                        <div class=" block py-2">
                            <a wire:navigate href="{{route("vendorMember.index")}}" class="@if(request()->routeIs("vendorMember.index")) text-green-900 font-bold border-s @endif block text-md px-4 mb-2 ">
                                My Member
                            </a>
                            <a wire:navigate href="{{route("vendorMember.create")}}" class="@if(request()->routeIs("vendorMember.create")) text-green-900 font-bold border-s @endif block text-md px-4 mb-2">
                                Create New Member
                            </a>
                            <a wire:navigate href="{{route("vendorMember.index")}}" class="@if(request()->routeIs("vendorMember.index")) text-green-900 font-bold border-s @endif block text-md px-4 mb-2 ">
                                Member Request
                            </a>
                        </div>
                    </div>
                </div>


                <!-- question  -->
                <div class="m_sidebarItem overflow-hidden cursor-pointer my-1 p-2 hover:bg-gray-300">
                    <a wire-navigate href="{{route('vendorQuestions.index')}}" class=" @if(request()->routeIs('vendorQuestions.index')) bg-green-900 text-white @endif font-normal flex items-center justify-start">
                        <img src="{{asset('media/exam-white.png')}}" class="p-1 me-3" alt="">
                        Questions
                    </a>

                </div>

            </div>
        </div>
