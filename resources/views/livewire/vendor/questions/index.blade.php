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
            <a wire:navigate href="{{route("vendorExamSchedule.view", ["pid" => $schedule['id']])}}" class="px-3 py-1  font-bold text-md mx-1 ">Overview</a>
            <a wire:navigate href="{{ route('vendorExamSchedule.question', ['pid' => $schedule['id']]) }}" class="px-3 py-1  font-bold text-md mx-1 bg-gray-300">Questions</a>
            <a wire:navigate href="{{ route("vendorExamSchedule.response", ['pid' => $schedule["id"]]) }}" class="px-3 py-1  font-bold text-md mx-1 ">Response (15)</a>
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
                <div class=" rounded mb-3  bg-light hidden">
                    <div class="flex items-start justify-start border-b">
        
                        {{-- question counter  --}}
                        <div class="p-3 text-lg border-r font-bold">
                            {{ $loop->iteration }}
                        </div>
        
                        {{-- question body  --}}
                        <div class="w-full">
                            {{-- question title  --}}
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
        
                            {{-- question option  --}}
                            <div>
                                <div class="px-3 py-1">
        
                                    @foreach ($qs['options'] as $item)
                                        <div class="flex items-center justify-start sm:w-1/2">
        
                                            <h5
                                                class="border rounded-lg px-2 py-1 @if ($item['is_correct'] == '1') font-bold text-green @endif">
                                                {{ $loop->iteration }}
                                            </h5>
                                            {{-- <input type="checkbox" name="" id="" checked>
                                            <input type="radio" name="" checked id="">
                                            <input type="radio" name="" id=""> --}}
        
                                            <h6 class="px-2 py-1 @if ($item['is_correct'] == '1') font-bold text-green @endif">
                                                {{ $item['option'] }}
                                                @if ($item['is_correct'] == '1')
                                                    <i class="fas fa-check text-sm"></i>
                                                @endif
                                            </h6>
                                        </div>
                                    @endforeach
        
                                </div>
        
                                {{-- quextion tags  --}}
                                <div class="p-2 inline-flex">
                                    <span class="me-1 p-1 rounded bg-slate-300">[first]</span>
                                    <span class="me-1 p-1 rounded bg-slate-300">[first]</span>
                                    <span class="me-1 p-1 rounded bg-slate-300">[first]</span>
                                    <span class="me-1 p-1 rounded bg-slate-300">[first]</span>
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
        
                @livewire('vendor.questions.show', ['qid' => encrypt($qs['id']), 'eid' => Crypt::encrypt($exams['id']), 'index' => $loop->iteration], key($qs['id']))
                {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
        
                {{-- @livewire('component', ['user' => $user], key($user->id)) --}}
            @endforeach
            {{-- show question  --}}
            
        </div>
    </div>



    {{-- edit model  --}}
    <x-modal wire:model.live="isEditQuestionModel">
        <h5 class="p-3 m-0 border-b"> <i class="fas fa-arrow-left me-3" wire:click="$toggle('isEditQuestionModel')"></i>
            Update Question</h5>

        <div class="p-2" x-data="{ target: 0 }">
            <form wire:submit="addQuestion" id="addNewMemberForm">

                {{-- question  --}}
                <div class="card border-0 shadow-none">
                    <div class="py-1  flex justify-between items-center">
                        <x-label for="question_title" class="m-0" value="{{ __(' Question Title:') }}" />
                        <div>
                            <select id="question_type"
                                class = "border-0 bg-light rounded @error('q_type') is-invalid @enderror"
                                wire:model.live="q_type" required autofocus>
                                <option value=""> -- Make Choose --</option>
                                <option selected value="textOnly">Text Only</option>
                                <option value="imageOney">Image Only</option>
                                <option value="testWithImage">Text With Image</option>
                                <option value="videoOney">Video Only</option>
                                <option value="testWithVideo">Text With Video</option>
                                <option value="written">Written </option>
                                <option value="voice">Voice </option>
                                <option value="attached">Attached </option>
                            </select>

                        </div>
                    </div>

                    <div class="">
                        <textarea type="text" id="question_title" wire:model.live="question"
                            placeholder="Write Your Question Title Here .... " class="form-control @error('question') is-invalid @enderror"></textarea>
                        @error('question')
                            <strong class="text text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                {{-- question end --}}

                <input type="hidden" name="oldOption[]" value="{{ $item['value'] ?? '' }}" />

                {{-- options --}}
                <div class="shadow-sm" x-data="{ options: 4 }">
                    <div class=" bg-light px-3 py-2 border-b flex justify-between items-center">
                        <x-label for="Options" value="{{ __('Question Options:') }}" />

                        <div class="">
                            <select id="answer_type"
                                class='rounded border-0 bg-white @error('a_type') is-invalid @enderror'
                                wire:model.live="a_type" name="answer_type" required>
                                <option selected value=""> -- Make Choise --</option>
                                <option value="multipleChoise" selected> Multiple Choise</option>
                                <option value="writting">By Writting</option>
                                <option value="attached">By Attaching File</option>
                            </select>

                        </div>
                    </div>

                    <div class="card-body">

                        @foreach ($optionArray as $index => $val)
                            <div class="d-flex my-1 align-items-center">
                                <div class="me-2 hidden md:block">
                                    <label for="optionsValue_{{ $index }}"
                                        class="input-group-text">{{ $loop->iteration }}</label>
                                </div>
                                <div class="w-78 input-group">
                                    <input type="text" wire:model.live="options.{{ $index }}"
                                        name="optionValue_{{ $index }}" id="optionValue_{{ $index }}"
                                        class="form-control w-100 @error('options') is-invalid @enderror"
                                        placeholder="Option Value" />
                                </div>

                                <div class="w-20">
                                    <input type="radio" x-show="$wire.options.{{ $index }} !=  null "
                                        wire:model.live="correct" id="correct_{{ $index }}"
                                        style="width:20px; height:20px; margin:0px 12px" value="{{ $index }}"
                                        class="input-group-text @error('correct') is-invalid @enderror">
                                    {{-- <button onclick="this.parentElement.parentElement.remove()" type="button"
                                 :disabled="options === 1" class="btn btn-danger mx-1">Remove</button> --}}
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>

                <hr>
                <div class="p-1 shadow-sm rounded ">
                    <x-label>Question Tags:</x-label>
                    <textarea name="" id="" class="w-full form-control " placeholder="Write your question tags"></textarea>
                </div>

                <hr>
                <div class="p-1 shadow-sm rounded ">
                    <x-label>Question Info:</x-label>
                    <textarea name="" id="" class="w-full form-control" placeholder="BCS : 30, BJS : 14, etc"></textarea>
                </div>


                <button class="mt-3 btn btn-success btn-lg " type="submit"> <i class="fas fa-save me-2"></i>
                    Save</button>
                {{-- </div> --}}
            </form>
        </div>
    </x-modal>

    {{-- add quick question model  --}}
    <x-modal wire:model.live="confirmQuickAddQuestion">
        <div class="text-lg p-2 px-4 flex items-center font-bold">
            <button class="mr-3" wire:click="$toggle('confirmQuickAddQuestion')"><img class="" width="18" height="18" src="https://img.icons8.com/windows/18/circled-chevron-left.png" alt="circled-chevron-down"/></button>
            Add Question
        </div>
        <hr class="my-1">
        <div class="bg-white rounded">
            <form wire:submit="addQuestion" id="addNewMemberForm">


                {{-- <div class="p-4">
                    <div class="py-1 mb-3 flex justify-between items-center">
                        <div>
                            <select id="question_type"
                                class = "bg-white rounded text-md @error('q_type') is-invalid @enderror"
                                wire:model.live="q_type" required autofocus>
                                <option value=""> -- Make Choose --</option>
                                <option selected value="textOnly">Text Only</option>
                                <option value="imageOney">Image Only</option>
                                <option value="testWithImage">Text With Image</option>
                                <option value="videoOney">Video Only</option>
                                <option value="testWithVideo">Text With Video</option>
                                <option value="written">Written </option>
                                <option value="voice">Voice </option>
                                <option value="attached">Attached </option>
                            </select>

                        </div>
                    </div>

                    <div class="mb-3">
                        <textarea type="text" id="question_title" wire:model.live="question"
                            placeholder="Write Your Question" class="w-full border-b p-1 text-md @error('question') is-invalid @enderror"></textarea>
                        @error('question')
                            <strong class="text text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div> --}}

                {{-- <div class="p-4" x-data="{ options: 4 }">
                    <div class=" bg-light border-b flex justify-between items-center">

                        <div class="py-1 mb-3">
                            <select id="answer_type"
                                class='bg-white rounded text-md @error('a_type') is-invalid @enderror'
                                wire:model.live="a_type" name="answer_type" required>
                                <option selected value=""> -- Make Choise --</option>
                                <option value="multipleChoise" selected> Multiple Choise</option>
                                <option value="writting">By Writting</option>
                                <option value="attached">By Attaching File</option>
                            </select>

                        </div>
                    </div>

                    <div class="mb-3">

                        @foreach ($optionArray as $index => $val)
                            <div class="flex my-1 items-center w-full py-1">
                                <div class="me-2 hidden md:block">
                                    <label for="optionsValue_{{ $index }}"
                                        class="input-group-text">{{ $loop->iteration }}</label>
                                </div>
                                <div class="w-full input-group">
                                    <input type="text" wire:model.live="options.{{ $index }}"
                                        name="optionValue_{{ $index }}" id="optionValue_{{ $index }}"
                                        class="w-full p-2 rounded border-b @error('options') is-invalid @enderror"
                                        placeholder="Option Value" />
                                </div>

                                <div class="w-20">
                                    <input type="radio" x-show="$wire.options.{{ $index }} !=  null "
                                        wire:model.live="correct" id="correct_{{ $index }}"
                                        style="width:20px; height:20px; margin:0px 12px" value="{{ $index }}"
                                        class="input-group-text @error('correct') is-invalid @enderror">
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div> --}}

                {{-- <hr>
                <div class="p-4 shadow-sm rounded ">
                    <textarea name="" id="" class="w-full p-2 rounded border " rows="3" placeholder="Write your question tags"></textarea>
                </div>

                <hr>
                <div class="p-4 shadow-sm rounded ">
                    <textarea name="" id="" class="w-full p-2 rounded border"  rows="5"placeholder="explain your question"></textarea>
                </div> --}}


                {{-- <div class="px-4 py-3">
                    
                    <button class="mt-3 px-3 py-2 bg-green-900 text-white rounded" type="submit"> <i class="fas fa-save me-2"></i>
                        Save</button>
                    </div>
                </div> --}}




                <div class="p-4 my-2 rounded">
                    <div class="py-1 mb-2  flex justify-between items-center">
                        <div>
                            <select id="question_type"
                                class = "border p-1 bg-light rounded @error('q_type') border-red text-red @enderror"
                                wire:model.live="q_type" required>
                                <option value="textOnly">Text Only</option>
                                <option value="imageOnly">Image Only</option>
                                <option value="textWithImage">Text With Image</option>
                                <option value="videoOnly">Video</option>
                                <option value="textWithVideo">Text With Video</option>
                            </select>
    
                        </div>
                    </div>
    
                    <div class="">
                        @switch($q_type)
                            @case('textOnly')
                                <textarea wire:model="question" placeholder="Write Your Question .. "
                                    class="w-full border-b p-1 rounded @error('question') is-invalid @enderror">
                                    </textarea>
                            @break
    
                            @case('imageOnly')
                                <input type="file" accept="jpg, png, jpge" wire:model="file" id=""
                                    class="w-full rounded p-1">
                            @break
    
                            @case('textWithImage')
                                <textarea  wire:model="question" placeholder="Write Your Question .. "
                                    class="w-full border-b p-1 rounded @error('question') is-invalid @enderror"> </textarea>
                                <input type="file" wire:model="file" id="" class="w-full rounded p-1 mt-1 form-control">
                            @break
    
                            @case('videoOnly')
                                <input type="file" accept="mp4, 3gp" wire:model="file" id=""
                                    class="w-full rounded p-1 form-control">
                                <div id="preview">
    
                                </div>
                            @break
    
                            @case('textWithVideo')
                                <textarea  wire:model="question" placeholder="Write Your Question .. "
                                    class="w-full border-b p-1 rounded @error('question') is-invalid @enderror"> </textarea>
                                <input type="file" accept="mp4, 3gp" wire:model="file" id=""
                                    class="w-full rounded my-1 p-1 form-control">
                                <div id="preview">
    
                                </div>
                            @break
    
                            @default
                                <textarea  wire:model="question" placeholder="Write Your Question .. "
                                    class="w-full border-b p-1 rounded @error('question') is-invalid @enderror">
                                </textarea>
                        @endswitch
                        @error('question')
                            <strong class="text text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
    
                    <span class="text-sm my-1 text-slate-700 block">
                        Give question title here. If you have an question that hart to type, then you can
                        try with image
                        only
                        type form right selection box.
                    </span>
                </div>
    
                <div class="p-4 rounded" x-data="{ options: 4 }">
                    <div class=" py-2 mb-2 flex justify-between items-center">    
                        <div class="">
                            <select id="answer_type"
                                class='disabled rounded border p-1 bg-light @error('a_type') is-invalid @enderror'
                                wire:model="a_type" name="answer_type" required>
                                <option selected ="multipleChoise"> Multiple Choise</option>
                                <option value="writting">By Writting</option>
                                <option value="attached">By Attaching File</option>
                            </select>
    
                        </div>
    
                    </div>
    
                    <div class="" id="options" :ref="options">
                        <div class="my-3">
                            <div class="flex items-center">
                                <input style="width: 20px; height:25px" type="radio" name="" id="" value="0"
                                    wire:model="correct">
                                <div class="w-full ms-3"> 
                                                                            
                                    <input type="text" name="" id="" class="w-full border-b rounded my-2 p-1"
                                    wire:model="options.0" placeholder="Option 1">
                                </div>
                            </div>
                        </div>
                        <div class="my-3">
                            <div class="flex items-center">
                                <input style="width: 20px; height:25px" type="radio" name="" id="" value="1"
                                wire:model="correct">
                                
                                <div class="w-full ms-3">                                        
                                    <input type="text" name="" id="" class="w-full border-b rounded my-2 p-1"
                                    wire:model="options.1" placeholder="Option 2">
                                </div>
                            </div>
                        </div>

                        <div class="my-3">
                            <div class="flex items-center">
                                <input style="width: 20px; height:25px" type="radio" name="" id="" value="2"
                                wire:model="correct">
                                <div class="w-full ms-3">
                                    
                                    <input type="text" name="" id="" class="w-full border-b rounded my-2 p-1"
                                    wire:model="options.2" placeholder="Option 3">
                                </div>
                            </div>
                        </div>
                        <div class="my-3">
                            <div class="flex items-center">
                                <input style="width: 20px; height:25px" type="radio" name="" id="" value="3"
                                    wire:model="correct">
                                <div class="w-full ms-3">
                                    <input type="text" name="" id="" class="w-full border-b rounded my-2 p-1"
                                    wire:model="options.3" placeholder="Option 4">
                                </div>
                            </div>
                        </div>
    
                        <span class="text-sm my-1 text-slate-700 block">
                            Only given option you can use. You must select an correct option form left check
                            box.
                        </span>
                    </div>
                </div>
                
    
                <div class="p-4 my-2">
                    <textarea name="" id="" rows="3" class="w-full border p-2"
                        placeholder="Write your question tags" wire:model="tags"></textarea>
                    <span class="text-sm my-1 text-slate-700 block">
                        Question information you wanna to show with questions. ex: this question has came to
                        BJS-2020 exam.
                        Every tags are seperated with comma (,) notation mark. ex: ICT-20, BJS-16
                    </span>
                </div>
    
                <hr>
                <div class="p-3 my-2">
                    <textarea name="" id="" rows="5" class="w-full border p-2"
                        placeholder="BCS : 30, BJS : 14, etc" wire:model="info"></textarea>
                    <span class="text-sm my-1 text-slate-700 block">
                        If you need to explain you questin for better understood to anser. or explanation of
                        answer you can
                        write here. This explanation will appear only after given an exam.
                    </span>
                </div>
    
                <div>
    
                    <div class="flex items-start p-3 border bg-light mt-2 rounded">
                        <input type="checkbox" style="height:30px; width:30px" class="me-3 mt-1" value="1"
                            wire:model="status">
                        <div>
                            <h5 class="font-bold text-md">Save as Draft</h5>
                            <p>
                                Draft question won't able to take exam. It's hidden from student site.
                                anytime you can
                                publish
                                it from question index section.
                            </p>
                        </div>
                    </div>
                    
                    <div class="p-4">

                        <button class="px-4 py-2 bg-green-900 text-white rounded" wire:loading.attr="disabled" type="submit">
                            save</button>
                        </div>
                </div>
            </form>
        </div>
    </x-modal>

    {{-- <x-modal wire:model.live="confirmQuickAddQuestion">
        <div class="text-lg p-4 flex items-center font-bold">
            <button class="mr-3" wire:click="$toggle('confirmQuickAddQuestion')"><img class="" width="18" height="18" src="https://img.icons8.com/windows/18/circled-chevron-left.png" alt="circled-chevron-down"/></button>
            Add Question
        </div>
        <hr class="my-2">

        <form wire:submit="addQuestion" id="addNewMemberForm" class="p-4">

            <div class="p-3 shadow-sm border my-2 rounded">
                <div class="py-1 mb-2  flex justify-between items-center">
                    <div>
                        <select id="question_type"
                            class = "border-0 bg-light rounded @error('q_type') border-red text-red @enderror"
                            wire:model.live="q_type" required>
                            <option value="textOnly">Text Only</option>
                            <option value="imageOnly">Image Only</option>
                            <option value="textWithImage">Text With Image</option>
                            <option value="videoOnly">Video</option>
                            <option value="textWithVideo">Text With Video</option>
                        </select>

                    </div>
                </div>

                <div class="">
                    @switch($q_type)
                        @case('textOnly')
                            <textarea wire:model="question" placeholder="Write Your Question .. "
                                class="w-full border-b p-1 rounded @error('question') is-invalid @enderror">
                                </textarea>
                        @break

                        @case('imageOnly')
                            <input type="file" accept="jpg, png, jpge" wire:model="file" id=""
                                class="w-full rounded p-1">
                        @break

                        @case('textWithImage')
                            <textarea  wire:model="question" placeholder="Write Your Question .. "
                                class="w-full border-b p-1 rounded @error('question') is-invalid @enderror"> </textarea>
                            <input type="file" wire:model="file" id="" class="w-full rounded  mt-1 form-control">
                        @break

                        @case('videoOnly')
                            <input type="file" accept="mp4, 3gp" wire:model="file" id=""
                                class="w-full rounded  form-control">
                            <div id="preview">

                            </div>
                        @break

                        @case('textWithVideo')
                            <textarea  wire:model="question" placeholder="Write Your Question .. "
                                class="w-full border-b p-1 rounded @error('question') is-invalid @enderror"> </textarea>
                            <input type="file" accept="mp4, 3gp" wire:model="file" id=""
                                class="w-full rounded my-1 form-control">
                            <div id="preview">

                            </div>
                        @break

                        @default
                            <textarea  wire:model="question" placeholder="Write Your Question .. "
                                class="w-full border-b p-1 rounded @error('question') is-invalid @enderror">
                            </textarea>
                    @endswitch
                    @error('question')
                        <strong class="text text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <span class="text-sm my-1 text-slate-700 block">
                    Give question title here. If you have an question that hart to type, then you can
                    try with image
                    only
                    type form right selection box.
                </span>
            </div>

            <div class="p-3 border rounded shadow-sm" x-data="{ options: 4 }">
                <div class=" py-2 mb-2 flex justify-between items-center">
                    <x-label for="Options" value="{{ __('Question Options:') }}" />

                    <div class="">
                        <select id="answer_type"
                            class='rounded border-0 bg-light @error('a_type') is-invalid @enderror'
                            wire:model="a_type" name="answer_type" required>
                            <option value="multipleChoise"> Multiple Choise</option>
                            <option value="writting">By Writting</option>
                            <option value="attached">By Attaching File</option>
                        </select>

                    </div>

                </div>

                <div class="">
                    <div class="row my-1">
                        <div class="col-lg-6">
                            <div class="flex items-center">
                                <input type="radio" name="" id="" value="0"
                                    wire:model="correct">
                                <div class="m-0 mx-2 text-slate-700">Option 1</div>
                            </div>

                            <input type="text" name="" id="" class="w-full border rounded my-2"
                                wire:model="options.0" placeholder="Option 1">
                        </div>
                        <div class="col-lg-6">
                            <div class="flex items-center">
                                <input type="radio" name="" id="" value="1"
                                    wire:model="correct">
                                <div class="m-0 mx-2 text-slate-700">Option 1</div>
                            </div>

                            <input type="text" name="" id="" class="w-full border rounded my-2"
                                wire:model="options.1" placeholder="Option 2">
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-lg-6">
                            <div class="flex items-center">
                                <input type="radio" name="" id="" value="2"
                                    wire:model="correct">
                                <div class="m-0 mx-2 text-slate-700">Option 1</div>
                            </div>

                            <input type="text" name="" id="" class="w-full border rounded my-2"
                                wire:model="options.2" placeholder="Option 3">
                        </div>
                        <div class="col-lg-6">
                            <div class="flex items-center">
                                <input type="radio" name="" id="" value="3"
                                    wire:model="correct">
                                <div class="m-0 mx-2 text-slate-700">Option 1</div>
                            </div>

                            <input type="text" name="" id="" class="w-full border rounded my-2"
                                wire:model="options.3" placeholder="Option 4">
                        </div>
                    </div>

                    <span class="text-sm my-1 text-slate-700 block">
                        Only given option you can use. You must select an correct option form left check
                        box.
                    </span>
                </div>
            </div>
            

            <div class="p-3 shadow-sm rounded my-2 border">
                <textarea name="" id="" rows="5" class="w-full form-control "
                    placeholder="Write your question tags" wire:model="tags"></textarea>
                <span class="text-sm my-1 text-slate-700 block">
                    Question information you wanna to show with questions. ex: this question has came to
                    BJS-2020 exam.
                    Every tags are seperated with comma (,) notation mark. ex: ICT-20, BJS-16
                </span>
            </div>

            <hr>
            <div class="p-3 shadow-sm rounded border">
                <textarea name="" id="" rows="8" class="w-full form-control"
                    placeholder="BCS : 30, BJS : 14, etc" wire:model="info"></textarea>
                <span class="text-sm my-1 text-slate-700 block">
                    If you need to explain you questin for better understood to anser. or explanation of
                    answer you can
                    write here. This explanation will appear only after given an exam.
                </span>
            </div>

            <div>

                <div class="flex items-start p-3 border bg-light mt-2 rounded">
                    <input type="checkbox" style="height:20px; width:20px" class="me-3 mt-1" value="1"
                        wire:model="status">
                    <div>
                        <h5 class="text-bold">Save as Draft</h5>
                        <p>
                            Draft question won't able to take exam. It's hidden from student site.
                            anytime you can
                            publish
                            it from question index section.
                        </p>
                    </div>
                </div>

                <button class="mt-3 px-3 py-2 bg-green" wire:loading.attr="disabled" type="submit"> <i
                        class="fas fa-save me-2"></i>
                    Save</button>
            </div>
        </form>
    </x-modal> --}}
</div>
