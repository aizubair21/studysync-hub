<div>
    @section('title')
        Question Index
    @endsection

    {{-- page header  --}}
    {{-- <div class="flex justify-between items-center my-2">
        <div>
            <h4 class="text-2xl font-bold">
                Questions
            </h4>
            <span>
                {{ $schedule->exam_name }}
            </span>
        </div>

        <x-dropdown align="right">
            <x-slot name="trigger">
                <div class="rounded-full overflow-hidden cursor-pointer flex items-center justify-between"
                    wire:click="$toggle('isSelectQuestionModal')">
                    <div class="bg-light px-3 py-2">
                        {{ Str::substr($schedule->exm_name, 0, 10) }}
                    </div>
                    <div class="bg-green px-2 py-2 ">
                        <i class="fas fa-sort mx-1"></i>
                    </div>
                </div>
            </x-slot>

            <x-slot name="content">
                @foreach ($exams as $exm)
                    <div class="px-1 rounded">
                        <a id="{{ $exm->id }}" wire:navigate
                            href="{{ route('vendorExamSchedule.question', ['pid' => $exm->id, 'endpoint' => $exm->attend_endpoint]) }}"
                            class="  px-3 py-2 border-b flex justify-between items-center @if ($exm->id == $schedule->id) bg-green text-white font-bolder @endif">
                            <p class="m-0">
                                {{ $exm->exm_name }}
                            </p>

                            <div>
                                <i class="fas fa-caret-right "></i>
                            </div>
                        </a>
                    </div>
                @endforeach
            </x-slot>
        </x-dropdown>
    </div> --}}
    {{-- page header  --}}

    {{-- navigation  --}}
    <div class="mb-5 bg-white">
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

        <div class="flex justify-center items-center w-auto pt-3 text-sm md:text-md">
            <a wire:navigate href="{{route("vendorExamSchedule.view", ["pid" => $schedule['id']])}}" class="p-2 text-md mx-1 ">Overview</a>
            <a wire:navigate href="{{ route('vendorExamSchedule.question', ['pid' => $schedule['id']]) }}" class="p-2 border-b border-green-700 text-green-900 font-bold text-md mx-1">Questions</a>
            <a wire:navigate href="{{ route("vendorExamSchedule.response", ['pid' => $schedule["id"]]) }}" class="p-2 text-md mx-1 ">Response (15)</a>
        </div>
        
    </div>
    {{-- navigation  --}}

    {{-- show error message  here --}}
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    {{-- <div class="flex justify-between  items-center py-2 mb-1">

        <div class="flex justify-between items-center">
        
            <button class="rounded  bg-green py-2 px-3 me-2"> <i class="fas fa-filter"></i></button>


            <x-dropdown width="48" align="left">
                <x-slot name="trigger">
                    <button class="border px-3 py-2 rounded ">
                        More
                        <i class="fas fa-caret-down ms-2"></i>
                    </button>
                </x-slot>

                <x-slot name="content" class="">
                    <div class="text-left px-1">
                        <button class="w-full py-2 text-left px-3 ">
                            <i class="w-1 me-2 fas fa-search"></i>Search
                        </button>
                        <hr class="my-1">

                        <button class="w-full py-2 border-b text-left px-3 ">
                            <i class="w-1 me-2 fas fa-info"></i>Details
                        </button>
                        <button class="w-full py-2 border-b text-left px-3 ">
                            <i class="w-1 me-2 fas fa-edit"></i>Edit
                        </button>
                        <button class="w-full py-2 text-left px-3 ">
                            <i class="w-1 me-2 fas fa-trash"></i>Delete
                        </button>
                    </div>
                </x-slot>
            </x-dropdown>


        </div>


        <a href="{{ route('vendorQuestion.create', ['eid' => $schedule->id]) }}" wire:navigate
            class="px-2 py-2 rounded border bg-green me-1" wire:click="$toggle('isShowQuestionModal')">
            <i class="fas fa-plus me-2"></i> Question
        </a>

        <button class="border bg-green rounded p-2" wire:click="$toggle('')"> <i class="fas fa-plus me-1"></i> Add Question </button>

    </div> --}}

    <div class="p-3" style="width:100%; max-width:570px; margin: 0 auto">
        <button wire:click="$toggle('confirmQuickAddQuestion')" class="p-2 rounded-lg shadow-lg absolute bottom-[10px] right-[50px] bg-white hover:scale-"> <img width="30" height="30" src="https://img.icons8.com/ios/30/plus-2-math.png" alt="plus-2-math"/> </button>
        <div class="mx-w-3xl" >

            <div class="flex justify-between items-center mb-1">
                <div>
                    @if (count($questions) > 0)
                        <p class="m-0">{{ count($questions) }} Question has been found.</p>
                    @else
                        <div class="]flex items-center">
                            <div class="w-4 h-4 bg-red-950 me-3"></div>
                            <p>No Question were found !</p>
                        </div>
                    @endif
                </div>
            </div>
        
            {{-- show question  --}}
            @foreach ($questions as $qs)
                {{-- <div class=" rounded mb-3  bg-light hidden">
                    <div class="flex items-start justify-start border-b">
        
                        <div class="p-3 text-lg border-r font-bold">
                            {{ $loop->iteration }}
                        </div>
        
                        <div class="w-full">
                            <div class="border-b px-2 py-2 w-full ">
                                <div class="font-semibold flex items-top justify-between">
                                    <a href="{{ route('vendorQuestion.show', ['qid' => encrypt($qs['id'])]) }}" wire:navigate
                                        class="h5 m-0">
                                        <i class="fas fa-share mx-1 text-sm"> </i>{{ $qs['question'] }}
                                    </a>
        
                                    <x-dropdown align="right" width="w-38">
                                        <x-slot name="trigger">
                                            <button class="rounded  p-2 mx-2 bg-white "> <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </x-slot>
        
                                        <x-slot name="content">
        
                                            <div class="px-1">
        
                                                <button class="rounded text-left  w-full px-2 py-1  font-light "
                                                    wire:click="makeEdit({{ $qs['id'] }})">Select
                                                </button>
                                                <hr class="my-1">
                                                <button class="rounded text-left  w-full px-2 py-1  font-light  "
                                                    wire:click="makeEdit({{ $qs['id'] }})">Share
                                                </button>
        
                                                <a wire:navigate
                                                    href="{{ route('vendorQuestion.edit', ['quid' => encrypt($qs['id'])]) }}"
                                                    class="btn rounded text-left  w-full px-2 py-1  font-light">
                                                    Edit
                                                </a>
                                                <hr class="my-1">
                                                <a wire:navigate
                                                    href="{{ route('vendorQuestion.destroy', ['quid' => encrypt($qs['id'])]) }}"
                                                    class="rounded text-left  w-full px-2 py-1 bg-red text-white">
                                                    Delete
                                                </a>
        
        
                                            </div>
        
                                        </x-slot>
                                    </x-dropdown>
        
        
                                </div>
                            </div>
        
                            <div>
                                <div class="px-3 py-1">
        
                                    @foreach ($qs['options'] as $item)
                                        <div class="flex items-center justify-start sm:w-1/2">
        
                                            <h5
                                                class="border rounded-lg px-2 py-1 @if ($item['is_correct'] == '1') font-bold text-green @endif">
                                                {{ $loop->iteration }}
                                            </h5>

        
                                            <h6 class="px-2 py-1 @if ($item['is_correct'] == '1') font-bold text-green @endif">
                                                {{ $item['option'] }}
                                                @if ($item['is_correct'] == '1')
                                                    <i class="fas fa-check text-sm"></i>
                                                @endif
                                            </h6>
                                        </div>
                                    @endforeach
        
                                </div>
        
                                <div class="p-2 inline-flex">
                                    <span class="me-1 p-1 rounded bg-slate-300">[first]</span>
                                    <span class="me-1 p-1 rounded bg-slate-300">[first]</span>
                                    <span class="me-1 p-1 rounded bg-slate-300">[first]</span>
                                    <span class="me-1 p-1 rounded bg-slate-300">[first]</span>
                                </div>
        
                            </div>
        
                        </div>
        
                    </div>
        
                    <div class="p-2 flex justify-between items-center">
                        <button class="rounded  px-2 py-1 bg-green"> <i class="fas fa-check-circle me-1  "></i>
                            Solution </button>
        
                        <div class="flex justify-between items-center">
                            <div class="bg-slate-400 p-2"> <i class="fas fa-eye me-1"></i> 250 </div>
                        </div>
                    </div>
                </div> --}}
        
                @livewire('vendor.questions.show', ['qid' => encrypt($qs['id']), 'eid' => Crypt::encrypt($exams['id']), 'index' => $loop->iteration], key($qs['id']))
                {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
        
                {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
            @endforeach
            {{-- show question  --}}
            
        </div>
    </div>

</div>
