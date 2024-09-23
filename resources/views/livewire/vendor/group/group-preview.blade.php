<div >
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    @section('title')
        Group preview
    @endsection

    <div>
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
        
        <div class="bg-white mb-4">

            <div class="flex justify-between items-start w-full  p-4 rounded">
                <div class="p-1">
                    <div class="text-sm">Group</div>
                    <strong class="rounded font-bold text-xl"> {{ $group->name }}
                    </strong>
                    <div>
                        Create - {{ \Carbon\Carbon::parse($group->created_at)->diffForHumans() }}
                    </div>
                </div>
    
                <button class="px-3 py-1 mt-1 border">More</button>
            </div>

            <div class="mt-3 flex items-center justify-center">
                <button class="px-5 py-1 @if($active == "home") border-b border-green-700 text-green-900 font-bold @endif" wire:click="activeNav('home')">General</button>
                <button class="px-5 py-1 @if($active == "schedule") border-b border-green-700 text-green-900 font-bold @endif" wire:click="activeNav('schedule')"> Schedule ({{count($schedule)}})</button>
                <button class="px-5 py-1 @if($active == "member") border-b border-green-700 text-green-900 font-bold @endif" wire:click="activeNav('member')"> Member ({{ count($group->students) }})</button>
            </div>
        </div>
        
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
                
                <div class="p-4 flex items-center justify-between bg-white text-lg font-bold text-start border-b">
                    <div>
                        60 Members
                    </div>
                    <button class="px-2 rounded text-start my-2 font-normal text-sm" >Add</button>
                </div>

                <div class="py-3 px-5 bg-white border-b hover:bg-gray-100">
                    <div class="flex items-center justify-start">
                        
                        <input type="checkbox" name="" style="width: 20px; height:20px" id="">
                        <div class="ps-5">
                            lorem ipsum colors door
                        </div>
                    </div>
                </div>
                <div class="py-3 px-5 bg-white border-b hover:bg-gray-100">
                    <div class="flex items-center justify-start">
                        
                        <input type="checkbox" name="" style="width: 20px; height:20px" id="">
                        <div class="ps-5">
                            lorem ipsum colors door
                        </div>
                    </div>
                </div>
                <div class="py-3 px-5 bg-white border-b hover:bg-gray-100">
                    <div class="flex items-center justify-start">
                        
                        <input type="checkbox" name="" style="width: 20px; height:20px" id="">
                        <div class="ps-5">
                            lorem ipsum colors door
                        </div>
                    </div>
                </div>

            </div>
        @endif
        


    </div>


    {{-- add member  modals start --}}
    <x-modal wire:model.live="confirmAddNewMember">
        <x-slot name="title">
            {{ __('Attached member to this group') }}
            {{-- {{ $memberGroup }} --}}
        </x-slot>

        <x-slot name="content">

            <div x-data="{ name: null, selecteMemdId: [] }" x-init="() => { $wire.on('clearValue', () => { selecteMemdId = [] }) }">
                <label for="new_group_name">Select Member form your existance space : </label>

                <div class="row m-0">
                    <div class="col-md-5 bg-info p-3 rounded mb-3">
                        <div style="max-width:300px">

                            <strong class="p-1 h4" x-html="selecteMemdId.length"> </strong> selected member
                            will
                            be added..
                            <button x-show="selecteMemdId.length > 0" x-on:click="selecteMemdId = []"
                                class="d-block btn btn-sm btn-warning my-1">Clear
                                selection</button>

                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="mb-2 input-group">
                            <input type="search" name="" id="search" class="form-control form-search"
                                placeholder="Type and hit enter">
                            <button type="button" class="input-group-text"> <i class="fas fa-search "></i> find
                            </button>
                        </div>


                        @foreach ($member as $id => $item)
                            <div class="d-flex justify-content-between align-items-center  my-1 py-1 px-2 rounded border border-bottom"
                                style="max-width:360px">

                                <input type="checkbox" x-model="selecteMemdId" value="{{ $item->id }}"
                                    id="spaceMember_{{ $item->id }}"
                                    style="width:20px; height:20px margin-right:10px">

                                <div>
                                    {{ $item->name }}
                                </div>

                                <div>
                                    <i x-show="{{ $item->privilage }} == 1"
                                        class="fas fa-check-circle bg-success rounded-circle"> </i>
                                    <i x-show="{{ $item->privilage }} != 1"
                                        class="fas fa-close bg-danger rounded-circle"> </i>
                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>

                <button class="btn btn-success btn-md mx-2" @click="$wire.attachedMemberToGroup(selecteMemdId)">
                    Submit
                </button>

            </div>


            {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
        </x-slot>

        <x-slot name="footer">

            <button class="btn btn-outline-secondary btn-md" wire:click="$toggle('confirmAddNewMember')"
                wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </button>


        </x-slot>
    </x-modal>
    {{-- add member  modals end --}}
</div>
