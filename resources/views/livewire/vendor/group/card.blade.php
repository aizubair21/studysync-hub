<div>
    <div class="my-1 p-1 w-full">
        {{-- <div class="xl:px-3 xl:py-4 rounded flex items-center w-full bg-white">

        </div> --}}
        <div class="xl:px-3 xl:py-4 p-2 rounded flex items-start w-full bg-white">
            <div class="h-full px-2 font-bold block  border-r text-lg">
                {{$index}}
            </div>

            <div class="px-3 w-full">

                <div class="flex items-center justify-between w-full ">
                    <div class="md:flex  items-center justify-between lg:block">

                        <a title="" wire:navigate class="block text-start font-bold text-lg ">
                            <!-- exam name  -->
                            {{ Str::substr($group->name, 0, 15)  }}
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
                        {{-- <div class="px-2">{{count($group->students)}} - S</div> --}}
                    </div>
                
                </div>

            </div>
        </div>
    </div>
</div>
