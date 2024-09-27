<div>

    {{-- top header  --}}
    {{-- <div class="flex justify-between items-center text-lg font-bold p-2 rounded mb-5">
        <x-dropdown align="left">
            <x-slot name="trigger">
                <div class="text-gray-700 flex items-center bg-white px-2 rounded-full">
                    <div class="px-3 ">
                        {{ $schedule->exm_name }}
                    </div>
                    <img class="" width="18" height="18" src="https://img.icons8.com/windows/18/circled-chevron-down.png" alt="circled-chevron-down"/>
                
                </div> 
            </x-slot>

            <x-slot name="content"></x-slot>
        </x-dropdown>

        <div class="flex items-center">
            <button class="mx-1 rounded-full h-9 w-9 bg-slate-200 hover:bg-slate-400 transition"> <i
                class="fas fa-cog"></i>
            </button>
        </div>
    </div> --}}
    {{-- top header  --}}


    {{-- navigation  --}}
    <div class="p-2">
        {{$schedule["status"]}} | {{$update}} times updated.
    </div>

    {{-- <input type="text" wire:model.lazy="schedule.exm_name" > --}}

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
            <a wire:navigate href="{{route("vendorExamSchedule.view", ["pid" => $schedule['id']])}}" class="p-2 border-b border-green-700 text-green-900 font-bold text-md mx-1">Overview</a>
            <a wire:navigate href="{{ route('vendorExamSchedule.question', ['pid' => $schedule['id']]) }}" class="p-2 text-md mx-1 ">Questions</a>
            <a wire:navigate href="{{ route('vendorExamSchedule.response', ['pid' => $schedule['id']]) }}" class="p-2 text-md mx-1 ">Response</a>
        </div>
    </div>
    {{-- navigation  --}}



    {{-- body  --}}
    <div class="p-2" style="width: 100%; max-width:570px; margin:0 auto">

        <div class="bg-white rounded order-first">
            <div class="px-3 flex justify-center">
                <div class="flex text-sm text-center">
                    <div class="d-inline-block border-r px-2 py-1 bg-white rounded">
                        {{ Str::upper($schedule['exm_type_of']) }}
                        >
                        {{ Str::upper($schedule['exm_type']) }}
                    </div>
    
                    <div class="d-inline-block border-r px-2 py-1 bg-white rounded mx-1">
                        <i class="fas fa-book me-1"></i> {{ Str::upper($schedule['exm_subject']) }}
                    </div>
    
                    <div class="d-inline-block border-r px-2 py-1 bg-white rounded">
                        {{-- <i class="fas fa-users me-1"></i> {{ $schedule['group'] }} --}}
                    </div>
    
                </div>
            </div>

            <div class="bg-green-900 text-white p-4 flex items-center justify-between text-md">
                <div class="font-bold">
                    Status
                </div>
                <select wire:model.live="schedule.status" id="update_status" class="rounded p-2 border text-black">
                    <option value=""> -- select an option --</option>
                    <option @if ($schedule['status'] == '0') selected @endif value="0"> Draft
                    </option>
                    <option @if ($schedule['status'] == '1') selected @endif value="1"> Live
                    </option>
                    <option @if ($schedule['status'] == '2') selected @endif value="2">
                        Publish
                    </option>
                    <option @if ($schedule['status'] == '5') selected @endif value="5">
                        Finished
                    </option>
                </select>
            </div>

            <hr class="my-2">
            
            <div class="p-4 border-b hover:bg-gray-100 hover:transition" >
                <div class="flex justify-between items-center ">
                    <div class="font-bold  w-1/2">
                        Total Marks
                    </div>
                    <div class="flex items-center">
                        {{-- <img @click="isEdit = !isEdit" width="18" height="18" src="https://img.icons8.com/forma-bold-filled/18/pencil.png" alt="pencil"/> --}}
                        <div class="px-2 py-1 rounded border">
                            <div x-else>
                                <input class="w-12 p-1 me-2" type="text" wire:model.lazy="schedule.total_mark"> Marks
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4 border-b hover:bg-gray-100 hover:transition">
                <div class="flex justify-between items-center ">
                    <div class="font-bold  w-1/2"> Question Added</div>
                    <div class="flex items-center">
                        <div class="px-2 cursor-pointer">
                            <i class="fas fa-pen ml-2"> </i>
                        </div>
                        <div class="px-2 py-1 rounded">
                           0 Question
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4 border-b hover:bg-gray-100 hover:transition">
                <div class="flex justify-between items-center ">
                    <div class="font-bold  w-1/2"> Exam Duration:</div>

                    <div class="px-2 py-1 border rounded">
                        <input type="text" class="w-12 me-2 p-1" wire:model.lazy="schedule.exm_duration" id=""> Minutes
                        {{-- {{ Str::upper($schedule['exm_duration']) }} minutes --}}
                    </div>

                </div>
            </div>

            <div class="p-4 border-b hover:bg-gray-100 hover:transition">
                <div class="flex justify-between items-center ">
                    <div class="font-bold  w-1/2"> Exam Date:</div>
                    <div class="text-end">

                        <div class="ml-3 px-2 bg-info py-1 rounded">
                            <input type="date"  wire:model.live="schedule.exm_date" id="">
                            {{-- {{ Str::upper($schedule['exm_date']) }} --}}
                        </div>
                        <div class="text-sm">
                            {{ \Carbon\Carbon::parse($schedule['exm_date'])->diffForHumans() }}
                        </div>
                    </div>
                </div>
               
            </div>

            <div class="p-4 border-b hover:bg-gray-100 hover:transition">
                <div class="flex justify-between items-center ">
                    <div class="font-bold  w-1/2">
                        Exam Start/Link Open:
                    </div>

                    <div class="d-inline-block px-2 py-1 rounded border">
                        <input type="time" wire:model.live="schedule.link_open_at" id="">
                    </div>
                </div>
            </div>

            <div class="p-4 border-b hover:bg-gray-100 hover:transition">
                <div class="flex justify-between items-center ">
                    <div class="font-bold  w-1/2">
                        Exam end/Link Close:
                    </div>

                   
                    <div class="d-inline-block px-2 py-1 rounded border">
                        <input type="time" wire:model.live="schedule.link_close_at" id="">
                        {{-- {{ Str::upper($schedule['link_close_at']) }} --}}
                    </div>
                   
                </div>
            </div>
            
        </div>


        {{-- section div --}}
        <section x-data='{isShowAbout:true}' class="py-3">

           

            {{-- card start  --}}
            <div class="text-start w-full my-3 bg-white">

                {{-- card header  --}}
                <div class="text-start cursor-pointer p-2 hover:bg-gray-100 hover:transition" @click="isShowAbout = !isShowAbout">

                    <div class="flex ">
                        <div class="p-2 rounded bg-green-900 me-2 fs-1 flex justify-center items-center font-bold text-lg text-white"
                            style="width:50px; height:50px; font-size:23px; font-family:sans-serif"> 01 </div>
                        <div>
                            <div class="text-lg font-bold">About</div>
                            <p class="m-0">About Marking, Time and Function </p>
                        </div>
                    </div>

                </div>
                {{-- card header  --}}

                <div x-show="isShowAbout" x-transition class="text-start p-2">

                    

                    {{-- <div class=" py-3 pe-3 border-b">
                        <label for="keyNote" class="text-md font-bold my-2">Exm Note:</label>
                        <textarea name="" id="keyNote" class="w-full block border" rows="5">{{ $schedule->exm_key_note }}</textarea>
                    </div> --}}

                    <div class=" p-3 border shadow rounded">
                        <label for="marking" class="text-md font-bold my-2">Mark Distribution:</label>
                        <hr class="my-2">
                        <table class="">
                            
                            <tr>
                                <td class="py-2"> <div class="rounded-full w-[65px] text-center font-bold text-md me-3 px-2 bg-green-900 text-white">+ {{ $schedule['for_cr'] }}</div> </td>
                                <td> Mark will get for every correct answer. </td>
                            </tr>
                            <tr>
                                <td class="py-2">
                                    <div class="rounded-full w-[65px] text-center font-bold text-md me-3 px-2 bg-red-900 text-white">
                                        - {{ $schedule['for_wr'] ?? '0' }}
                                    </div> 

                                </td>
                                <td>
                                    Mark will be cut down for every wrong answer.
                                </td>
                            
                            </tr>
                            <tr>

                                <td class="py-2"> <div class="rounded-full w-[65px] text-center font-bold text-md me-3 px-2 border">- {{ $schedule['for_skp'] ?? '0' }}</div> </td>
                                <td>Mark will be cut, if you skip any question. ( not giving answer)</td>
                            </tr>
                        </table>
                    </div>

                </div>

                {{-- card end  --}}
            </div>

            <a wire:navigate
                href="{{ route('vendorExamSchedule.question', ['pid' => $schedule['id'], 'endpoint' => $schedule['attend_endpoint']]) }}"
                class="text-start p-2 pe-3 rounded my-3 bg-white flex justify-between items-center hover:bg-gray-100 hover:transition w-full">
                {{-- Left  --}}
                <div class="flex sm:mb-1 ">
                    <div class="p-2 rounded bg-green-900 me-2 fs-1 flex justify-center items-center font-bold text-lg text-white"
                        style="width:50px; height:50px; font-size:23px; font-family:sans-serif"> 02 </div>
                    <div>
                        <div class="text-lg font-bold">Questions</div>
                        <p class="m-0">View all questions, add, change</p>
                    </div>
                </div>
                {{-- left  --}}

                {{-- right --}}
                <img class="" width="18" height="18" src="https://img.icons8.com/windows/18/circled-chevron-right.png" alt="circled-chevron-down"/>

                {{-- right --}}
            </a>

            <a href=""
                class="text-start p-2 pe-3 rounded my-3 bg-white flex justify-between items-center hover:bg-gray-100 hover:transition">
                {{-- Left  --}}
                <div class="flex sm:mb-1 ">
                    <div class="p-2 rounded bg-green-900 me-2 fs-1 flex justify-center items-center font-bold text-lg text-white"
                        style="width:50px; height:50px; font-size:23px; font-family:sans-serif"> 03 </div>
                    <div>
                        <div class="text-lg font-bold">Response</div>
                        <p class="m-0">Student attandance on </p>
                    </div>
                </div>
                {{-- left  --}}

                {{-- right --}}
                <img class="" width="18" height="18" src="https://img.icons8.com/windows/18/circled-chevron-right.png" alt="circled-chevron-down"/>
                {{-- right --}}
            </a>

            <a href=""
                class="text-start p-2 pe-3 rounded my-3 bg-white flex justify-between items-center hover:bg-gray-100 hover:transition">
                {{-- Left  --}}
                <div class="flex sm:mb-1 ">
                    <div class="p-2 rounded bg-green-900 me-2 fs-1 flex justify-center items-center font-bold text-lg text-white"
                        style="width:50px; height:50px; font-size:23px; font-family:sans-serif"> 04 </div>
                    <div>
                        <div class="text-lg font-bold">Result</div>
                        <p class="m-0">Make result and Published </p>
                    </div>
                </div>
                {{-- left  --}}

                {{-- right --}}
                <img class="" width="18" height="18" src="https://img.icons8.com/windows/18/circled-chevron-right.png" alt="circled-chevron-down"/>
                {{-- right --}}
            </a>

            
            {{-- danger zone  --}}
            <section class="border p-3 rounded my-3">
                <h3 class=""> Danger Zone</h3>
                <p class="py-2">
                    If you delete, you will not be able to recover it. Please make sure before deleting
                    anything. This is the dangerous part of your dashboard.
                </p>
                <form action="" method="post">
                    @csrf
                    <button type="submit" class="px-3 py-2 rounded my-1 bg-red-900 text-white">Delete Schedule</button>
                </form>
            </section>
            {{-- danger zone  --}}

        </section>
        {{-- section div --}}


    </div>
    {{-- body  --}}
    
</div>
