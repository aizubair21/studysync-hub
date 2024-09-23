<div>


    @if ($isHeader)
        {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
        @section('title')
            Vendor || Question Preview
        @endsection

        {{-- page header  --}}
        <div class="flex justify-between items-center my-2">

            {{-- left  --}}
            <div class="h4 md:w-4/5 flex items-center">
                Question Preview
            </div>

            {{-- right  --}}
            <div class="md:w-1/5">
                <div class="rounded-full overflow-hidden cursor-pointer flex items-center justify-between"
                    wire:click="$toggle('isSelectQuestionModal')">
                    <div class="bg-white px-3 py-2">
                        lorem ipsum
                    </div>
                    <div class="bg-green px-2 py-2 ">
                        <i class="fas fa-sort mx-1"></i>
                    </div>
                </div>
            </div>
        </div>
        {{-- page header  --}}

        <div class="flex justify-between items-center pb-2">

            <div class=" flex items-center  rounded-full overflow-hidden" wire:click="$toggle('isSearchModal')">
                <div class="`me-1 bg-green p-2"><i class="fas fa-search me-1"></i></div>
                <div class="p-2">search</div>
            </div>

            <div class="flex  items-center p-1 mb-2 rounded overflow-hidden border">
                <a href="" wire:navigate class="border-0 px-3 bg-white rounded py-2 "> <i
                        class="fas fa-angle-left me-1 text-green"></i> Prev
                </a>
                <a href="" wire:navigate class="border-0 px-3 bg-white rounded py-2 "> Next <i
                        class="fas fa-angle-right ms-1 text-green"></i>
                </a>
            </div>
        </div>
    @endif

    {{-- Mode : {{ $isEdit }} --}}

        @if ($isEdit == $questions["id"])
            <div class="p-2 rounded my-3 bg-white border">

                @livewire('vendor.questions.edit', ['quid' => Crypt::encrypt($questions['id'])], key($questions['id']))

                <hr class="my-1">
                <button class="px-2 py-1 rounded border" wire:click="isEdit = ''">Close</button>
            </div>
        @else
            <div class=" rounded mb-3  bg-white">
                <div class="flex items-start justify-start border-b">

                    {{-- question counter  --}}
                    <div class="p-3 text-md font-bold">
                        {{-- {{ $questions->id }} --}}
                        {{ $index}}
                    </div>

                    {{-- question body  --}}
                    <div class="w-full">
                        {{-- question title  --}}
                        <div class="px-2 py-2 w-full ">
                            <div class="font-semibold flex items-top justify-between">
                                {{-- <a href="{{ route('vendorQuestion.show', ['qid' => encrypt($questions->id)]) }}" wire:navigate
                                    class="h5 m-0">
                                    <i class="fas fa-share mx-1 text-sm"> </i>
                                    {{ $questions->question }}
                                </a> --}}
                                <input type="text" class="w-full p-1 rounded focus:outline-0 focus:border-b" wire:model.lazy="questions.question" id="questions.id">
                                <x-dropdown align="right" width="w-38">
                                    <x-slot name="trigger">
                                        <button class="rounded  p-2 mx-2 bg-white ">
                                            <img width="18" src="{{asset('media/ellipsis-h.png')}}" alt="">
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">

                                        <div class="px-1">

                                            <button class="rounded text-left  w-full px-2 py-1  font-light "
                                                wire:click="makeEdit({{ $questions['id'] }})">Select
                                            </button>
                                            <hr class="my-1">
                                            <button class="rounded text-left  w-full px-2 py-1  font-light  "
                                                wire:click="makeEdit({{ $questions['id'] }})">Share
                                            </button>

                                            {{-- <a wire:navigate
                                                href="{{ route('vendorQuestion.edit', ['quid' => encrypt($questions->id)]) }}"
                                                class="btn rounded text-left  w-full px-2 py-1  font-light">
                                                Edit
                                            </a> --}}
                                            <button class="px-2 text-left py-1 font-light rounded w-full "
                                                wire:click="doEdit({{ $index ?? 0 }})">
                                                Edit
                                            </button>
                                            <hr class="my-1">
                                            <a wire:navigate
                                                href="{{ route('vendorQuestion.destroy', ['quid' => encrypt($questions['id'])]) }}"
                                                class="rounded text-left  w-full px-2 py-1 bg-red-200">
                                                Delete
                                            </a>
                                            {{-- <form
                                            action="{{ route('vendorQuestion.destroy', ['quid' => encrypt($questions->id)]) }}"
                                            wire:navigate>
                                        
                                        </form> --}}

                                        </div>

                                    </x-slot>
                                </x-dropdown>

                                {{-- <button class="rounded  px-2 py-1 bg-red text-white">
                                <i class="fas fa-trash"> </i>
                            </button> --}}
                            </div>
                        </div>

                        {{-- question option  --}}
                        <div>
                            <div class="px-3 py-1">
                                

                                    @foreach ($options as $key => $item)
                                        {{-- <div class="flex items-center justify-start w-1/2">

                                            <h5
                                                class="border rounded-lg px-2 py-1 @if ($item['is_correct'] == '1') font-bold text-green @endif">
                                                {{ $loop->iteration }}
                                            </h5>
                                            
                                            <h6
                                                class="px-2 py-1 @if ($item['is_correct'] == '1') font-bold text-green @endif">
                                                {{ $item['option'] ?? "" }}
                                                @if ($item['is_correct'] == '1')
                                                    <i class="fas fa-check text-sm"></i>
                                                @endif
                                            </h6>
                                        </div> --}}

                                        <div class="my-3">
                                            <div class="flex items-center">
                                                <input style="width: 25px; height:25px" type="checkbox" @checked($item["is_correct"]) name="" id="options.{{$key}}.is_correct"
                                                    wire:model.lazy="options.{{$key}}.is_correct" value="0">
                                                <div class="w-full ms-3"> 
                                                                                            
                                                    <input type="text" name=""  id="options.{{$key}}.option" class="w-full rounded my-2 p-1 focus:outline-0 focus:border-b"
                                                    wire:model.lazy="options.{{$key}}.option" placeholder="Options">
                                                </div>
                                                <button wire:click="removeOption({{$key}})" class="mx-3 rounded-full shadow p-1 hover:shadow-sm">
                                                    <img width="20" height="20" src="https://img.icons8.com/fluency-systems-regular/20/minus.png" alt="minus"/>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach

                                <div class="ps-8"> 
                                    <button wire:click="addMoreFild()" class="p-2 border-b focus:outline-0 w-full text-gray-500 text-start cursor-text">Add Field....</button>
                                </div>
                            </div>

                            {{-- quextion tags  --}}
                            <div class="p-2 inline-flex">
                                @if ($questions['tags'])
                                    @foreach ($questions['tags'] as $item)
                                        <span class="me-1 p-1 rounded bg-white">[ {{ $item }} ]</span>
                                    @endforeach
                                @endif
                                {{-- <span class="me-1 p-1 rounded bg-white">[first]</span>
                                <span class="me-1 p-1 rounded bg-white">[first]</span>
                                <span class="me-1 p-1 rounded bg-white">[first]</span> --}}
                            </div>

                        </div>

                    </div>

                </div>

                {{-- quextion footer  --}}
                <div class="p-2 flex justify-between items-center">
                    <button class="rounded  px-2 py-1 bg-green"> <i class="fas fa-check-circle me-1  "></i>
                        Solution </button>

                    <div class="flex justify-between items-center">
                        <div class="bg-slate-400 p-2"> <i class="fas fa-eye me-1"></i> 250 </div>
                    </div>
                </div>
            </div>
        @endif


    {{-- modal  --}}
    <x-modal wire:model.live="isSelectQuestionModal" maxWidth="sm">
        {{-- header --}}
        <h5 class="m-0 border-b py-3 px-2"> <i class="fas fa-arrow-left mx-1"
                wire:click="$toggle('isSelectQuestionModal')"></i>
            Selected Question
        </h5>

        <div class="px-2">
            <div class=" rounded-xlg bg-white mt-2 p-2" x-data="{ showAll: true }">

                <div class=" flex justify-between items-center border-b">
                    <div class="px-2">
                        <h5 class="m-0">
                            Lorem Ipsun colors
                        </h5>
                        <p>
                            Math Group
                        </p>
                    </div>

                    <div class="p-1 rounded-full ms-1" x-on:click="showAll = !showAll">
                        <i class="fas fa-sort "></i>
                    </div>
                </div>

                {{-- all question  --}}
                <div class="py-2 px-3 bg-white rounded mb-1" x-show="showAll" x-transition>
                    <a href="" wire:navigate class="flex justify-between items-center p-0 m-0 ">
                        <div class="p-2 rounded-full me-2"> Q </div>
                        Lorem Ipsun colors
                        <div class="p-1 rounded-full ms-1" x-on:click="showAll = true">
                            <i class="fas fa-caret-right "></i>
                        </div>
                    </a>
                </div>
            </div>

            {{-- settings  --}}
            <div class="px-3 py-2 mt-2">

                <button class="flex items-center text-md">
                    <i class="fas fa-cog me-2"></i> Question Settings
                </button>

                <button class="flex items-center text-md">
                    <i class="fas fa-cog me-2"></i> Edit Question
                </button>
                <div class="w-full h-1 bg-white"></div>
                <button class="flex items-center text-md">
                    <i class="fas fa-cog me-2"></i> Edit Question
                </button>



            </div>
        </div>

        {{-- content  --}}
    </x-modal>

    {{-- search model --}}
    <x-modal wire:model.live="isSearchModal" maxWidth="sm">
        {{-- header --}}
        <h5 class="m-0 border-b py-3 px-2"> <i class="fas fa-arrow-left mx-1" wire:click="$toggle('isSearchModal')"></i>
            Search Question
        </h5>

        <div class="px-2">
            <input type="search" name="" class="w-full rounded my-2 bg-white border-0 text-md"
                placeholder="Search by name .." id="">
        </div>
        <hr>
        <div class="px-2">
            <div class="border-b ">
                <a href="" class="flex items-center">
                    <div class="p-2 rounded-full me-2 ">01</div>
                    <div>Lorem Ipsun color doore to all the boys ....</div>
                </a>
            </div>
            <div class="border-b ">
                <a href="" class="flex items-center">
                    <div class="p-2 rounded-full me-2 ">01</div>
                    <div>Lorem Ipsun color doore to all the boys ....</div>
                </a>
            </div>
            <div class="border-b ">
                <a href="" class="flex items-center">
                    <div class="p-2 rounded-full me-2 ">01</div>
                    <div>Lorem Ipsun color doore to all the boys ....</div>
                </a>
            </div>
            <div class="border-b ">
                <a href="" class="flex items-center">
                    <div class="p-2 rounded-full me-2 ">01</div>
                    <div>Lorem Ipsun color doore to all the boys ....</div>
                </a>
            </div>
        </div>

    </x-modal>
</div>
