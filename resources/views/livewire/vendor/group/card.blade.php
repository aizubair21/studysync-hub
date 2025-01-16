<div>
    <div class="my-1 p-1 w-full">
        {{-- <div class="xl:px-3 xl:py-4 rounded flex items-center w-full bg-white">

        </div> --}}
        <div class="xl:px-3 xl:py-4 p-2 rounded flex items-start w-full bg-white">
            <div class="h-full px-2 font-bold block group_card_index border-r text-lg">
                {{$index}}
            </div>

            <div class="px-3 w-full">

                <div class="flex items-center justify-between w-full pb-1">
                    <div class="md:flex  items-center justify-between lg:block">
                        @php
                            $groupNameLength = Str::length($group->name);
                        @endphp
                        <a title="{{$group->name}}" wire:navigate
                            href="{{route('vendorGroup.show', ['gpid' => $group->id])}}"
                            class="block text-start font-bold text-lg @if($groupNameLength > 15) text-sm @endif">
                            <!-- exam name  -->
                            {{ Str::substr($group->name, 0, 25) }}
                        </a>

                        <div class="flex justify-between items-start md:items-center text-sm">
                            <div class="mx-2 hidden md:block lg:hidden">|</div>
                            <div>{{ \Carbon\Carbon::parse($group->created_at)->diffForHumans() }}</div>

                            <div class="mx-1 md:mx-2 ">|</div>
                            <div class="">
                                @if($group->is_private)
                                    <div class="px-1 bg-green-900 rounded text-white">Private</div>
                                @else
                                    <div class="px-1 bg-gray-300 rounded">Public</div>
                                @endif
                            </div>

                            {{-- <div class="rounded-full px-2 border  mx-2 bg-green-900 text-white "> Draft
                            </div> --}}
                        </div>

                    </div>

                    <div class="flex items-center" style="align-self: flex-start">
                        @if($group->status !=1)
                            <div class="text-sm rounded text-white bg-red-700 border">Muted </div>
                        @else 
                            <div class="p-2 mr-2 bg-green-900 rounded-full"></div>
                        @endif
                        <x-dropdown align="right" width="24">
                            <x-slot name="trigger">
                                <button class="px-2 py-1 rounded border">
                                    <img class="w-5" src="{{asset('media/ellipsis-h.png')}}" alt="">
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="px-1 w-full text-md">
                                    <a href="" class="px-3 py-2 block rounded w-full text-md "> Select</a>
                                </div>
                                {{-- <div class="px-1 w-full text-md">
                                    @if($group['status'] == 0)
                                        <form wire:submit.prevent='upateGroupInfo'>
                                            <input type="hidden" wire:model="editableGroup.status" value="0">
                                            <button>
                                                Muted
                                            </button>
                                        </form>
                                        <a href="" class="px-3 py-2 block rounded w-full text-md "> Mute</a>
                                    @else
                                        <a href="" class="px-3 py-2 block rounded w-full text-md "> Active</a>
                                    @endif
                                </div> --}}
                                <hr class="my-1">
                                <div class="px-1 w-full text-md">
                                    <button class="px-3 py-2 block text-start rounded w-full text-md "
                                        wire:click="$toggle('confirmEditModal')"> Edit </button>
                                </div>
                                <div class="px-1 w-full text-md">
                                    <button class="px-3 py-2 block rounded w-full text-md text-start"
                                        wire:click="destroySingle({{$group->id}})"> Delete </button>
                                </div>
                                <hr class="my-1">
                                <div class="px-1 w-full text-md">
                                    <button class="px-3 py-2 block rounded w-full text-md "> Schedule </button>
                                </div>
                            </x-slot>
                        </x-dropdown>

                    </div>
                </div>

                <hr class="my-2">

                <div class="flex justify-start items-center">
                   
                    <div class="mx-1 bg-gray-300 text-white inline-flex">
                        <div class="px-2 flex items-center">
                            <img class="w-5 mr-2" src="{{asset('media/profile-white.png')}}" alt="">
                            {{count($group->students)}}
                        </div>
                    </div>

                    @if ($group->schedule)    
                        <div class=" bg-green-900 text-white inline-flex">
                            <div class="px-2 flex items-center"> 
                                <img class="w-5 mr-2" src="{{asset('media/exam-white.png')}}" alt="">
                                {{count($group->schedule?? "0")}}
                            </div>
                        </div>
                    @endif


                </div>

            </div>
        </div>
    </div>



    {{-- edit instant gorup modal --}}
    <x-modal wire:model.live="confirmEditModal" height="auto" maxWidth="sm">
        <div class="px-3 py-2 text-lg font-bold">
            Update Group Info
        </div>
        <hr class="my-1">

        <div class="px-3 py-3 content">


            <div class="py-2 mb-1 p-2 flex justify-between items-center border-b">
                <div class="py-2 text-sm">
                    Status
                </div>

                <div class="flex items-center text-sm justify-end">
                    <div class="py-2 mb-1 p-2 flex justify-between items-center ">
                        <select wire:model.lazy="editableGroup.is_private" id="" class=" p-2 border text-sm">
                            <option selected value="0">Public</option>
                            <option @if($editableGroup['is_private']) selected @endif value="1">Private</option>
                        </select>
                    </div>
                    <select wire:model.lazy="editableGroup.status" id="" class=" p-2 border text-sm">
                        <option value="0">Muted</option>
                        <option value="1">Active</option>
                    </select>
                </div>
            </div>

            <div class="py-2 mb-1 p-2 border-b">
                <div class="py-2 text-sm">
                    Name
                </div>
                <input class="w-full p-2 border rounded-md" type="text" wire:model.lazy='editableGroup.name'>
            </div>



            <div class="py-2 mb-1 p-2 border-b">
                <div class="py-2 text-sm">
                    Info
                </div>
                <textarea class="w-full p-2 border rounded-md" type="text"
                    wire:model.lazy='editableGroup.info'></textarea>
            </div>

        </div>

        <hr class="my-1">
        <div class="px-3 py-2 text-end">
            <button class="bg-gray-200 px-3 py-1 rounded" wire:click="$toggle('confirmEditModal')"
                wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </button>

            <button class="ml-2 px-3 py-1 rounded bg-green-900 text-white" wire:click="UpdateGroupInfo"
                wire:loading.attr="disabled">
                {{ __('Update') }}
            </button>
        </div>
    </x-modal>
</div>