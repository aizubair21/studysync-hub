 <!-- main nav -->
 <nav id="nav" class="bg-white shadow-sm scrolbar-none sticky top-0 border-b  w-full flex justify-between items-center px-3" style="z-index: 50">
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