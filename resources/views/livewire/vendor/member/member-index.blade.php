<div x-data="{ confirmMemberAddModal: false, search: false, showOn: null }">
    @section('title')
        Vendor > Member Index
    @endsection


    {{-- header --}}
    <x-page-header>
        <x-slot name="header">
            <div>
                <div class="text-xl font-bold">My Member</div>
                <div class="text-sm font-normal"> {{count($members) ?? "0 "}} members </div>
            </div>
        </x-slot>

        <x-slot name="link">
             <div class="flex items-center">
                <button wire:click="$toggle('confirmMemberAddModal')" class="mx-1 bg-green-900 text-white px-3 py-1 hover:bg-green-800 transition rounded">Add</button>
                <button class="px-3 py-1"><img class="w-5 rotate-90" src="{{asset('media/ellipsis-h.png')}}" alt=""></button>
            </div>
        </x-slot>

        <x-slot name="nav">

        </x-slot>
    </x-page-header>
    {{-- <div class="bg-white mb-2">

        <div class="flex items-center justify-between px-5 py-4">
            

           
        </div>

        <div class="flex items-center justify-center border-b w-full">
            <button class="px-3 py-1 mx-1 border-5 border-b border-green-700 text-green-700 font-bold bg-green-50">Summery</button>
            <button class="px-3 py-1 mx-1">Individual</button>
            <button class="px-4 py-1 font-md">Settings</button>
        </div>

    </div> --}}
    {{-- header --}}

    <div class="flex justify-between items-start">
        
        <div class="rounded p-2" style="width: 100%; max-width:570px; margin: 0 auto">
            {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
    
            <div class="rounded  ">
                <div class="p-1 rounded flex items-center justify-between bg-white"> 
                    <div class="flex items-center">
                        <select name="" id="" class="border rounded p-2">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <div class="w-1 border-r"></div>
                        <input type="search" name="" class="w-full p-2 rounded border-b " placeholder="search" id="">
                    </div>
               
                    <x-dropdown aling="right">
                        <x-slot name="trigger">
                            <button class="px-3 py-1 rounded">
                                <img width="20px" src="{{asset('media/ellipsis-h.png')}}" alt="">
                            </button>
                        </x-slot>
            
                        <x-slot name="content">
                            <div class="px-1">
                                <button class="text-start p-2 hover:bg-gray-100 hover:transition w-full">Delete</button>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
                
                {{-- <hr class="my-1"> --}}
    
                <div class="my-2">
                    @foreach ($members as $key => $member)    
                        <div class="my-1 p-4 bg-white rounded flex items-center justify-between hover:bg-gray-100 hover:transition border-b">
                            
                            <div class="flex items-center">
                                <input type="checkbox" wier:model.live="action" style="width:20px; height:20px" id="member_{{$key}}">
                                <div class="px-3">
                                    <img class="rounded-full w-8 border border-green-700" src="{{$member->profile_photo_url}}" alt="">
                                </div>
                                <div class="">
                                    <a wire:navigate href="{{route('vendorMember.edit', ['id' => encrypt($member->id)])}}" class="block font-bold text-md">
                                        {{$member->name}}
                                    </a>
                                    <div class="hidden md:block font-normal text-xs my-0">
                                        {{$member->email}}
                                    </div>
                                </div>
                            </div>
                
                            <button class="p-2" wire:click="memberAside({{$key+1}})">
                                <img width="20" height="20" src="https://img.icons8.com/pastel-glyph/20/circled-chevron-right.png" alt="circled-chevron-right"/>
                            </button>

                        </div>
                    @endforeach
    
                </div>
    
            </div>
            
            <div class="bg-white rounded text-ms text-center font-bold p-2" >
                No Member Found!
            </div>
    
           
        </div>

        {{-- aside  --}}
        {{-- <div class="p-2 absolute top-0 left-0 w-full h-full flex items-start justify-end" style="background-color: #00000040; z-index:99999">
            <div class="rounded bg-white h-full" style="width:300px">
                <div class="p-4 text-end border-b">
                    <button wire:click="$toggle('showMemberAside')">x</button>
                </div>




            </div>
        </div> --}}

    </div>



    <x-modal-aside wire:model.live="showMemberAside">
        <div class="p-4 border-b flex items-start">
            <img class="w-12 border roundef-full border-green-700" src="{{asset("media/profile.white.png")}}" alt="">
            <div class="ps-5">
                <div class="text-sm"></div>
                <div class="text-lg font-bold">{{ $memberForAside->name ?? "" }}</div>
                <div class="text-sm">{{ $memberForAside->email ?? "" }}</div>
            </div>
        </div>

        <div class="p-4 flex item-center justify-between border-b">
            <div class="">
                <div class="text-md font-bold">Added</div>
                <div class="text-sm font-normal">
                    {{-- {{ $memberForAside->created_at }} --}}
                    <p>
                        {{ \Carbon\Carbon::parse($memberForAside->created_at ?? "")->diffForHumans() }}
                    </p>
                </div>
            </div>
            <select name="" id="" class=" focus:outline-0 rounded border-b">
                <option selected value="Active">Active</option>
                <option value="Baned">Banned</option>
            </select>
        </div>

        <div class="p-4 border-b">
            <div class="text-sm mb-4 flex items-center justify-between">
                <div>Group</div>
                <a href="" wire:navigate class="block bg-green-900 text-white rounded-full px-2">view</a>
            </div>
            
            <div class="flex items-center mx-4 my-1">
                <div class="border-r px-2">01</div>
                <div class="px-2"> General Batch </div>
            </div>

            <div class="text-end">
                <button class="px-2 rounded-full text-sm">Assign</button>
            </div>
        </div>

        <div class="p-4 border-b">
            <div class="text-sm mb-4 flex items-center justify-between">
                <div>Exams</div>
                <a href="" class="block bg-green-900 text-white rounded-full px-2">view</a>
            </div>

            <div class="flex items-center mx-4 my-1">
                <table>
                    <tr>
                        <th class="p-1">Exam</th>
                        <th class="p-1">Attend</th>
                        {{-- <th></th> --}}
                    </tr>
                    <tr>
                        <td>
                            20
                        </td>
                        <td>15</td>
                    </tr>
                </table>
            </div>
        </div>


    </x-modal-aside>


    {{-- components add users modal  --}}
    <x-modal wire:model.live="confirmMemberAddModal" maxWidth="md" height="auto">
        <div class="p-3 ">
            <div class="flex items-center">
                <div>
                    <img width="40px" src="{{asset('media/plus.png')}}" alt="">
                </div>
                <div class="text-lg font-bold ps-5">
                    Add Member to your space
                    <p class="font-normal text-sm">
                        to add an member to your space probide bellow information.
                    </p>
                </div>
           </div>
        </div>
        <hr class="my-1">
        <div class="p-3">

            <form wire:submit.prevent="addMemberToSpace">
                <div class="p-1 mb-1">
                    <input  type="text" class="border-b focus:border-1 focus:outline rounded w-full p-2 @error('name') is-invalid @enderror"
                        placeholder="Give a name...." id="name" wire:model="name">
                </div>

                <div class="p-1 mb-1">
                    <div>
                        @error('email')
                            <div class="text text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="email" class="border-b focus:border-1 focus:outline rounded w-full p-2 @error('email') is-invalid @enderror"
                        placeholder="Give a valid email" id="email" wire:model.live="email">
                </div>

                <div class="p-1 mb-1">
                    <input type="text"
                        class="border-b focus:border-1 focus:outline rounded w-full p-2 @error('instantPassword') is-invalid @enderror"
                        placeholder="Protect with password" id="password" wire:model="instantPassword">
                </div>

                <div class="w-100 py-3 text-end flex justify-end">
                    <button class="px-4 py-1 text-md bg-gray-200 text-whtie hover:bg-gray-300 rounded mx-2" wire:click="$toggle('confirmMemberAddModal')">
                        Close
                    </button>
                    <button class="px-4 py-1 text-md bg-green-900 text-white hover:bg-green-700 rounded font-normal" wire:loading.attr="disabled" type="submit">
                         Insert
                    </button>
                </div>
            </form>
        </div>

            {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
    </x-modal>
    {{-- components add users modal  --}}


    {{-- components new group with slected students modal  --}}
    <x-dialog-modal wire:model.live="confirmAddNewGroup" x-data="{ name: null }">
        <x-slot name="title">
            {{ __('Create new group with selected members') }}
            {{-- {{ $memberGroup }} --}}
        </x-slot>

        <x-slot name="content">

            <div>
                <label for="new_group_name">Group Name: </label>
                <input type="text" wire:model="newGroupName" placeholder="Give a name of your group"
                    id="new_group_name" class="form-control">
            </div>

            {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
        </x-slot>

        <x-slot name="footer">
            <button class="btn btn-outline-secondary btn-md" wire:click="$toggle('confirmAddNewGroup')"
                wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </button>

            <button class="btn btn-success btn-md mx-2" x-on:click="$wire.createNewGroupFromIndex">
                submit
            </button>

        </x-slot>
    </x-dialog-modal>
    {{-- components new group with slected students modal  --}}

</div>
 