<div>

    <div class=" mb-5 bg-white">
        <div class="px-3 md:px-8 py-3 flex justify-between items-center">

            <div class=" text-2xl flex items-center">
                
                <div class=" font-bold pe-3">
                    <input class="p-1 focus:border-b focus:border-3 focus:ring-0 focus:outline-0 focus:shadow-0" type="text" wire:model.lazy="schedule.exm_name" id="">
                </div>
                <img class="" width="18" height="18" src="https://img.icons8.com/windows/18/circled-chevron-down.png" alt="circled-chevron-down"/>
                
            </div>

            <div class="flex items-center">
                <x-dropdown align="right">
                    <x-slot name="trigger">
                        <button class="px-3 py-1 rounded bg-green-900 text-white hover:bg-green-700 font-bold text-md" >send</button>
                    </x-slot>

                    <x-slot name="content">

                    </x-slot>

                </x-dropdown>

                <div class="mx-3 border-l"></div>
                <button class="">
                    <img width="18" src="{{asset("media/ellipsis-h.png")}}" alt="">
                </button>
            </div>
        </div>

        <div class="text-sm md:text-md flex justify-center items-center w-auto">
            <a wire:navigate href="{{route("vendorExamSchedule.view", ["pid" => $schedule['id']])}}" class="px-4 py-1  font-bold text-md mx-1 ">Overview</a>
            <a wire:navigate href="{{ route('vendorExamSchedule.question', ['pid' => $schedule['id']]) }}" class="px-4 py-1  font-bold text-md mx-1 ">Questions</a>
            <a wire:navigate href="{{ route('vendorExamSchedule.response', ['pid' => $schedule['id']]) }}" class="px-4 py-1  font-bold text-md mx-1 text-green-700 border-b border-green-700 font-bold">Response</a>
        </div>
    </div>
    {{-- navigation  --}}



    <div class="p-2" style="width: 100%; max-width:668px; margin:0 auto">

        <div class="bg-white rounded w-full">

            <div class="flex items-start justify-between w-full mb-4 p-3">
                <div class="text-3xl">
                    6 responses
                </div>

                <div class="flex items-center">
                    <button class="bg-red-500 text-white px-3 py-1 rounded">Delete All</button>
                </div>
            </div>
            
            {{-- navigation  --}}
            <div class="flex items-center justify-evenly">
                <button class="px-4 py-1 border-b border-green-700 text-green-700 font-bold">Summary</button>
                <button class="px-4 py-1 ">Individuals</button>
                <button class="px-4 py-1 ">Questions</button>
            </div>
            {{-- navigation  --}}
        
        </div>
        <div class="my-1 p-3 rounded bg-white text-lg font-bold flex items-center justify-between">
            <div>
                People response about what you know. 
            </div>

            <button>
                <img width="35" height="35" src="https://img.icons8.com/external-thin-kawalan-studio/35/external-sort-arrows-thin-kawalan-studio.png" alt="external-sort-arrows-thin-kawalan-studio"/>
            </button>
        </div>

        {{-- responses --}}
        <div class="p-3 rounded-md bg-white my-3 hover:bg-gray-50 hover:transition">
            <div class="text-lg font-normal">Your Email</div>
            <div class="text-sm py-1">6 responses</div>


            <div class="mt-2 p-3 ps-5 w-full">
                <div class="w-full px-2 py-1 rounded bg-gray-100 my-1">texta;lsdjf;alsdjf;a@text.com</div>
                <div class="w-full px-2 py-1 rounded bg-gray-100 my-1">texta;lsdjf;alsdjf;a@text.com</div>
                <div class="w-full px-2 py-1 rounded bg-gray-100 my-1">texta;lsdjf;alsdjf;a@text.com</div>
                <div class="w-full px-2 py-1 rounded bg-gray-100 my-1">texta;lsdjf;alsdjf;a@text.com</div>
                <div class="w-full px-2 py-1 rounded bg-gray-100 my-1">texta;lsdjf;alsdjf;a@text.com</div>
            </div>
        </div>

        <div class="p-3 rounded-md bg-white my-3 hover:bg-gray-50 hover:transition">
            <div class="text-lg font-normal">Your Name</div>
            <div class="text-sm py-1">6 responses</div>


            <div class="mt-2 p-3 ps-5 w-full">
                <div class="w-full px-2 py-1 rounded bg-gray-100 my-1">text lorem</div>
                <div class="w-full px-2 py-1 rounded bg-gray-100 my-1">text lorem</div>
                <div class="w-full px-2 py-1 rounded bg-gray-100 my-1">text lorem</div>
                <div class="w-full px-2 py-1 rounded bg-gray-100 my-1">text lorem</div>
                <div class="w-full px-2 py-1 rounded bg-gray-100 my-1">text lorem</div>
                <div class="w-full px-2 py-1 rounded bg-gray-100 my-1">text lorem</div>
            </div>
        </div>

        <div class="p-3 rounded-md bg-white my-3 hover:bg-gray-50 hover:transition">
            <div class="flex items-end justify-between">
                <div>
                    <div class="text-lg font-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla veritatis quas qui laboriosam, alias eos fugiat vero dolorum? Dignissimos, vero?</div>
                    <div class="text-sm py-1">6 responses</div>
                </div>

                <div>
                    <button class="px-3 py-1 rounded"> View</button>
                </div>
            </div>


        </div>
        {{-- responses --}}
    </div>

</div>
