<div>
    @section('title')
        Vendor > Update Member Information
    @endsection


    {{-- header --}}
    <x-page-header>
        <x-slot name="header">
            <div>
                <div class="text-xl font-bold">Member Update</div>
                {{-- <div class="text-sm font-normal"> {{count($members) ?? "0 "}} members </div> --}}
            </div>
        </x-slot>

        <x-slot name="link">
            <div class="flex items-center">
                <button wire:click="$toggle('confirmMemberAddModal')" class="mx-1 bg-green-900 text-white px-3 py-1 hover:bg-green-800 transition rounded">Add</button>
                <button class="px-3 py-1"><img class="w-5 rotate-90" src="{{asset('media/ellipsis-h.png')}}" alt=""></button>
            </div>
        </x-slot>

        <x-slot name="nav">
          {{-- <div class="flex items-center justify-center">
            <button class="px-3 py-1 mx-1 text-md font-bold border-b border-b-5 bg-green-50 border-green-900 text-green-900">Personal Info</button>
            <button class="px-3 py-1 mx-1 text-md">Security</button>
            <button class="px-3 py-1 mx-1 text-md">Activity</button>
          </div> --}}
        </x-slot>
    </x-page-header>



    <section class="mt-3">
        <div class="w-full justify-center" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 1rem;">
            
            {{-- user info  --}}
            <div class="px-2" >
               
                <div class="p-2 bg-white shadow">
                    <div class="flex flex-col items-center justify-center">
                        <img width="100px" height="100px" class="rounded-full border shoadow-lg mb-3" src="{{$member->profile_photo_url}}" alt="">
                        <div class="text-center p-2 text-xl font-bold">
                            {{$member->name}}
                        </div>
                        {{-- <input type="text" class="w-full text-xl text-center p-2 rounded" name="" value="lorem, ipsum" id=""> --}}
                    </div>
    
                    <hr>
    
                    <div class="pt-3 pb-2 text-md font-bold text-green-700">
                        Recent Activities
                    </div>
                    <div class="ms-3">
                        <div class="border-l border-l-5 border-green-900 px-2 my-1">
                            Created - {{$member->created_at->diffForHumans() }} | by 
                            @if ($member->vendor == auth()->user()->id)
                            
                                You
                            @else
                                Others
                                                    
                            @endif
                            {{-- convert string date to human readable date --}}
                            {{-- <div class="text-sm text-gray-500"> {{ $member->created_at->
                                diffForHumans() }} ago</div> --}}
                        </div>
                        <div class="border-l border-l-5 border-green-900 px-2 my-1">
                            Last Update - {{$member->updated_at->diffForHumans()}}
                        </div>
                        
                    </div>
                    {{-- @livewire('vend'); --}}
                    {{-- <livewire:vendor.member.components.profile.profile-status :user="Crypt::encrypt($member->id)"> --}}
                    @livewire('vendor.member.components.profile.profile-status', ['user' => Crypt::encrypt($member->id)], key('profile-status'))
                    
                    @livewire('vendor.member.components.profile.profile-activity', ['user' => Crypt::encrypt($member->id)], key('profile-activity'))
                    
                </div>

            </div>
            {{-- user info  --}}
            
            <div class="" id="personalInfo">

                <div class="bg-white p-2">

                    <div class="text-md font-bold my-2 text-slate-700 font-sans">
                        1. User Personal Information
                    </div>
                    {{-- @livewire('vendor.member.components.profile.profile-info', ['user' => $user], key($user->id)) --}}
                    @livewire('vendor.member.components.profile.profile-info', ['user' => Crypt::encrypt($member->id)], key("profile-info"))
                </div>
                
            </div>
            
            <div class="px-2">
                <div class="bg-white p-2">
    
                    <div class="text-md font-bold my-2 text-slate-700 font-sans">
                        3. User Profile Privacy 
                    </div>
                    
                    @livewire('vendor.member.components.profile.profile-security', ['user' => Crypt::encrypt($member->id)], key($member->id))
                </div>
            </div>
        </div>
    </section>




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
</div>
