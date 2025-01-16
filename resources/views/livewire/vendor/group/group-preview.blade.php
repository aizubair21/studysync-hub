<div >
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    @section('title')
        Group preview
    @endsection

    <div>
        @php
            $groupMemberCount = count($group->students);
        @endphp
        @if (session('success'))
            <div class="alert alert-success" role="alert"><strong>{{ session('success') }}</strong></div>
        @endif

        {{-- header  --}}
        {{-- <div class="flex items-center justify-between mx-4">
            <a wire:navigate href="{{route("vendorGroup.index")}}" class="py-1 block mb-2 px-4 text-md font-bold bg-gray-200 rounded-full ">
            Back
            </a>
        </div> --}}
        {{-- header  --}}
        


        <x-page-header>
            <x-slot name="header">
                <div class="p-1">
                    <div class="text-sm">Group</div>
                    <strong class="rounded font-bold text-lg"> {{ $group->name }}
                    </strong>
                    <div class="text-sm">
                        Create - {{ $group->created_at->diffForHumans() }}
                    </div>
                </div>
            </x-slot>
            <x-slot name='link'>

                <button class="px-3 py-1 mt-1 border">More</button>
            </x-slot>

            <x-slot name='nav'>
                <div class=" flex items-center justify-center text-sm">
                    <button class="px-5 py-1 @if($active == "home") border-b border-green-700 text-green-900 font-bold @endif" wire:click="activeNav('home')">General</button>
                    <button class="px-5 py-1 @if($active == "schedule") border-b border-green-700 text-green-900 font-bold @endif" wire:click="activeNav('schedule')"> Schedule ({{count($schedule)}})</button>
                    <button class="px-5 py-1 @if($active == "member") border-b border-green-700 text-green-900 font-bold @endif" wire:click="activeNav('member')"> Member ({{$groupMemberCount}})</button>
                </div>            
            </x-slot>
        </x-page-header>

        
        {{-- {{$active}} --}}

        @if ($active == "home")
            <div class="my-3 rounded p-3" id="info" style="max-width: 570px; width:100%; margin:0 auto">

                <div class="p-4 bg-white text-lg font-bold text-start border-b">
                    Group Info
                </div>

                <div class="p-4 bg-white border-b hover:bg-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            Last Exam
                        </div>
                        
                        <div>
                            <div class="text-normal text-end">
                                {{-- <input type="date" > --}}
                                Tomorrow 
                                <div class="px-2  inline rounded-full bg-gray-50 tex-sm"> Math </div>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="p-4 bg-white border-b hover:bg-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            Last Exam
                        </div>
                        
                        <div>
                            <div class="text-normal text-end">
                                {{-- <input type="date" > --}}
                                Tomorrow 
                                <div class="px-2  inline rounded-full bg-gray-50 tex-sm"> Math </div>
                            </div> 
                        </div>
                    </div>
                </div>

            </div>
        @endif

        @if ($active == "schedule")    
            <div  id="schedule" class="my-3 rounded p-3" style="max-width:570px; width: 100%;  margin:0 auto">
                <div class="p-4 bg-white text-lg font-bold text-start border-b">
                    Group Exams
                    <div class="text-sm font-normal">
                        3 exams found!
                    </div>
                </div>

                <div class="p-4 bg-white border-b hover:bg-gray-100">
                    <div class=" rounded flex items-start w-full">
                        <div class="h-full px-2 font-bold block  border-r text-lg">
                            
                        </div>

                        <div class="px-3 w-full">

                            <div class="flex items-center justify-between w-full ">
                                <div class="md:flex  items-center justify-between lg:block">

                                    <a title="" wire:navigate class="block text-start font-bold text-lg ">
                                        <!-- exam name  -->
                                        {{-- {{ Str::substr($group->name, 0, 15)  }} --}}
                                    </a>

                                    <div class="flex justify-between items-start md:items-center text-sm">
                                        <div class="mx-2 hidden md:block lg:hidden">|</div>
                                        {{-- <div>{{ \Carbon\Carbon::parse($group->created_at)->diffForHumans() }}</div> --}}
                                        
                                        <div class="mx-1 md:mx-2 ">|</div>
                                        <div class="px-1 rounded bg-gray-300">
                                            {{-- {{ $group->is_private ? 'Private' : '  Public' }} --}}
                                        </div>

                                        <!-- <div class="rounded-full px-2 border  mx-2 bg-green-900 text-white "> Draft
                                        </div> -->
                                    </div>

                                </div>

                                <div class="" style="align-self: flex-start">

                                    <x-dropdown align="right" width="24">
                                        <x-slot name="trigger">
                                            <button class="px-2 py-1 rounded border">
                                                More
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <div class="px-1 w-full text-md">
                                                <a href="" wire:navigate class="px-3 py-2 block rounded w-full text-md "> Select</a>
                                            </div>
                                            <div class="px-1 w-full text-md">
                                                <a href="" wire:navigate class="px-3 py-2 block rounded w-full text-md "> Bann</a>
                                            </div>
                                            <hr class="my-1">
                                            <div class="px-1 w-full text-md">
                                                <a href="" wire:navigate class="px-3 py-2 block rounded w-full text-md "> Edit </a>
                                            </div>
                                            <div class="px-1 w-full text-md">
                                                <button class="px-3 py-2 block rounded w-full text-md text-start" wire:click="destroySingle({{$group->id}})"> Delete </button>
                                            </div>
                                            <hr class="my-1">
                                            <div class="px-1 w-full text-md">
                                                <button class="px-3 py-2 block rounded w-full text-md "> Schedule </button>
                                            </div>
                                        </x-slot>
                                    </x-dropdown>

                                </div>
                            </div>

                            <hr class="my-3">

                            <div class="flex justify-start items-center">
                                
                                <div class=" bg-green-900 text-white inline-flex">
                                    <div class="px-2">15 - E</div>
                                </div>
                                
                                <div class="mx-1 bg-gray-900 text-white inline-flex">
                                    <div class="px-2"> - S</div>
                                </div>
                            
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($active == "member")
                <div wire:show="active == member" id="member" class="my-3 rounded p-3" style="width: 100%; max-width:570px; margin:0 auto"> 
                
                <div class="px-4 py-2 flex items-center justify-between bg-white text-md font-bold text-start border-b">
                    <button wire:click="$toggle('confirmAddNewMember')" class="px-2 py-1 rounded text-start my-2 font-normal border text-sm flex items-center" > <img class="w-5 me-2" src="{{asset('media/plus.png')}}" alt=""> Member</button>
                    
                    <div>
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button class="">
                                    <img class="w-5" src="{{asset("media/ellipsis-h.png")}}" alt="">
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <div class="text-sm">
                                    <button class="w-full text-start py-1 px-2">Delete</button>
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
                @foreach ($group->students as $groupStudent)     
                    <div class="py-3 px-5 bg-white border-b hover:bg-gray-100" id="{{$groupStudent->id}}"> 
                        <div class="flex items-center justify-start">
                            
                            <input type="checkbox" class="border-1 outline-0" value="{{$groupStudent->id}}" name="" style="width: 20px; height:20px" id="">
                            <div class="ps-5">
                                {{$groupStudent->username ?? $groupStudent->name ?? "Undefined"}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endif
        


    </div>


    {{-- add member  modals start --}}
    <x-modal wire:model.live="confirmAddNewMember" height='auto' maxWidth="xl">
       
            @livewire('vendor.member.member-to-group', ['group' => $group->id])

    </x-modal>
    {{-- add member  modals end --}}
</div>
