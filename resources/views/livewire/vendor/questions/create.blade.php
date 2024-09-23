<div>

    <div class="">

        <div class="bg-light p-2 shadow-md rounded" x-data="{ isInfoShow: false }">

            <div class=" w-auto  flex items-center justify-between  ">

                <div class="w-full">
                    <h6 class="m-0 font-bold">
                        <span class="text-sm  font-bold">{{ Str::upper($schedule->exm_type) }}</span>
                    </h6>
                </div>

                <div class="flex items-enter justify-center">
                    <x-dropdown align="right">
                        <x-slot name="trigger">
                            <div
                                class="text-nowrap px-3 py-2 bg-white border rounded flex items-center justify-between cursor-pointer">
                                <div>
                                    {{ Str::substr($schedule->exm_name, 0, 25) }}
                                </div>
                                <i class="fas fa-sort ms-3"></i>
                            </div>
                        </x-slot>

                        <x-slot name="content">
                            <div class="p-1">

                                @foreach (DB::table('group_has_exams')->where('vendor', '=', Auth::id())->get()->toArray() as $item)
                                    <div class="w-full">
                                        <a href="{{ route('vendorQuestion.create', ['eid' => $item->id]) }}"
                                            wire:navigate
                                            class="w-full px-3 py-2 bg-light rounded flex justify-between items-center">
                                            <div>
                                                {{ $item->exm_name }} <br>
                                                {{ DB::table('groups')->where(['id' => $item->group, 'vendor' => Auth::id()])->get('name')->value('name') }}
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </x-slot>
                    </x-dropdown>

                    <button class="px-2" x-on:click="isInfoShow = !isInfoShow"> <i class="fas fa-caret-down"></i>
                    </button>
                </div>

            </div>
            <hr class="my-2">
            {{-- info show  --}}

            <div class="w-full bg-light shadow-md rounded" x-show="isInfoShow"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95">
                <div class="p-3 bg-white">
                    <div class="border-l-4 pl-2">
                        <h6 class="m-0">
                            New question will be attached to :
                        </h6>
                        <p class="bg-light p-1 inline-flex font-bold text-md"> {{ $schedule->exm_name }} </p> Schedule.
                    </div>

                    <div class="border-l-4 pl-2">
                        Change schedule from above select box instead, if you plan to make for other schedule. Otherwise
                        continue making question.
                        </d>
                    </div>

                </div>
                <hr class="my-1">

                {{-- info  --}}
                <div class="flex p-3 items-start justify-between bg-white">
                    <div class="w-1/2 lg:w-1/2">

                        <div class=" p-2 rounded-full border inline-flex justify-start items-center">
                            <div class="flex items-center justify-center me-1 w-8 text-md rounded-full">
                                <i class="fas fa-user"></i>
                            </div>
                            <span class="px-2 py-1 bg-green ms-2 rounded-full">YOU</span>
                        </div>

                        <div class="inline-flex items-center p-2 rounded-full my-1 bg-light">
                            <div
                                class="me-2 flex items-center justify-center w-8 h-8 text-md rounded-full
                            bg-green">
                                <i class="fas fa-book"></i>
                            </div>
                            {{ $schedule->exm_subject }}
                        </div>

                    </div>
                    <div class="w-1/2 lg:w-1/2">
                        <a href="{{ route('vendorExamSchedule.question', ['pid' => $schedule, 'endpoint' => $schedule->attend_endpoint]) }}"
                            wire:navigate class="cursor-pointer flex items-center p-1 border rounded-full mb-1">
                            <div class="w-8 h-8 rounded-full bg-green me-2 flex justify-center items-center">
                                {{ count($schedule->questions) }}</div>
                            Questions
                        </a>

                        <div class="flex items-center p-1 border rounded-full">
                            <div class="w-8 h-8 rounded-full bg-green me-2 flex justify-center items-center">
                                10</div>
                            Questions
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <form wire:submit="addQuestion" id="addNewMemberForm" class="">

            {{-- question  --}}
            <div class="p-3 shadow-sm border my-2 rounded">
                <div class="py-1 mb-2  flex justify-between items-center">
                    <x-label for="question_title" class="m-0" value="{{ __(' Question Title:') }}" />
                    <div>
                        <select id="question_type"
                            class = "border-0 bg-light rounded @error('q_type') border-red text-ted @enderror"
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
                            <textarea type="text" wire:model="question" placeholder="Write Your Question Title Here .... "
                                class="form-control @error('question') is-invalid @enderror">
                                </textarea>
                        @break

                        @case('imageOnly')
                            <input type="file" accept="jpg, png, jpge" wire:model="file" id=""
                                class="w-full rounded  form-control">
                        @break

                        @case('textWithImage')
                            <textarea type="text" wire:model="question" placeholder="Write Your Question Title Here .... "
                                class="form-control @error('question') is-invalid @enderror"> </textarea>
                            <input type="file" wire:model="file" id="" class="w-full rounded  mt-1 form-control">
                        @break

                        @case('videoOnly')
                            <input type="file" accept="mp4, 3gp" wire:model="file" id=""
                                class="w-full rounded  form-control">
                            <div id="preview">

                            </div>
                        @break

                        @case('textWithVideo')
                            <textarea type="text" wire:model="question" placeholder="Write Your Question Title Here .... "
                                class="form-control @error('question') is-invalid @enderror"> </textarea>
                            <input type="file" accept="mp4, 3gp" wire:model="file" id=""
                                class="w-full rounded my-1 form-control">
                            <div id="preview">

                            </div>
                        @break

                        @default
                            <textarea type="text" wire:model="question" placeholder="Write Your Question Title Here .... "
                                class="form-control @error('question') is-invalid @enderror">
                    </textarea>
                    @endswitch
                    @error('question')
                        <strong class="text text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <span class="text-sm my-1 text-slate-300 block">
                    Give question title here. If you have an question that hart to type, then you can
                    try with image
                    only
                    type form right selection box.
                </span>
            </div>
            {{-- question end --}}

            {{-- <input type="hidden" name="oldOption[]" value="{{ $item['value'] ?? '' }}" /> --}}

            {{-- options --}}
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
                            {{-- h  --}}
                            <div class="flex items-center">
                                <input type="radio" name="" id="" value="0"
                                    wire:model="correct">
                                <div class="m-0 mx-2 text-slate-300">Option 1</div>
                            </div>

                            {{-- o  --}}
                            <input type="text" name="" id="" class="w-full border rounded my-2"
                                wire:model="options.0" placeholder="Option 1">
                        </div>
                        <div class="col-lg-6">
                            {{-- h  --}}
                            <div class="flex items-center">
                                <input type="radio" name="" id="" value="1"
                                    wire:model="correct">
                                <div class="m-0 mx-2 text-slate-300">Option 1</div>
                            </div>

                            {{-- o  --}}
                            <input type="text" name="" id="" class="w-full border rounded my-2"
                                wire:model="options.1" placeholder="Option 2">
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-lg-6">
                            {{-- h  --}}
                            <div class="flex items-center">
                                <input type="radio" name="" id="" value="2"
                                    wire:model="correct">
                                <div class="m-0 mx-2 text-slate-300">Option 1</div>
                            </div>

                            {{-- o  --}}
                            <input type="text" name="" id="" class="w-full border rounded my-2"
                                wire:model="options.2" placeholder="Option 3">
                        </div>
                        <div class="col-lg-6">
                            {{-- h  --}}
                            <div class="flex items-center">
                                <input type="radio" name="" id="" value="3"
                                    wire:model="correct">
                                <div class="m-0 mx-2 text-slate-300">Option 1</div>
                            </div>

                            {{-- o  --}}
                            <input type="text" name="" id="" class="w-full border rounded my-2"
                                wire:model="options.3" placeholder="Option 4">
                        </div>
                    </div>

                    <span class="text-sm my-1 text-slate-300 block">
                        Only given option you can use. You must select an correct option form left check
                        box.
                    </span>
                    {{-- @foreach ($optionArray as $index => $val)
                    <div class="d-flex my-1 align-items-center">
                        <div class="me-2 hidden md:block">
                            <label for="optionsValue_{{ $index }}"
                                class="input-group-text">{{ $loop->iteration }}</label>
                        </div>
                        <div class="w-78 input-group">
                            <input type="text" wire:model="options.{{ $index }}"
                                name="optionValue_{{ $index }}" id="optionValue_{{ $index }}"
                                class="form-control w-100 @error('options') is-invalid @enderror"
                                placeholder="Option Value" />
                        </div>

                        <div class="w-20">
                            <input type="radio" x-show="$wire.options.{{ $index }} !=  null "
                                wire:model="correct" id="correct_{{ $index }}"
                                style="width:20px; height:20px; margin:0px 12px" value="{{ $index }}"
                                class="input-group-text @error('correct') is-invalid @enderror">
                           
                        </div>

                    </div>
                @endforeach --}}
                </div>
            </div>
            {{-- options --}}

            {{-- <div class="my-2 border p-3 rounded bg-light"> --}}

            {{-- options --}}

            {{-- options --}}
            {{-- <div class="d-flex my-1 align-items-center">
                 <div class="w-75">
                     <input type="text" wire:model="options" id="optionValue_2" class="form-control w-100"
                         placeholder="Option Value">
                 </div>
                 <div class="w-25 d-flex align-items-center justify-content-between">
                     <input type="checkbox" wire:model="correct" id="correct_2"
                         style="width:20px; height:20px; margin:0px 12px">
                     <button onclick="this.parentElement.parentElement.remove()" type="button"
                         :disabled="options === 1" class="btn btn-danger mx-1">Remove</button>
                 </div>
             </div> --}}

            {{-- options --}}
            {{-- <div class="d-flex my-1 align-items-center">
                 <div class="w-75">
                     <input type="text" wire:model="options" id="optionValue_3" class="form-control w-100"
                         placeholder="Option Value">
                 </div>
                 <div class="w-25 d-flex align-items-center justify-content-between">
                     <input type="checkbox" wire:model="correct" id="correct_3"
                         style="width:20px; height:20px; margin:0px 12px">
                     <button onclick="this.parentElement.parentElement.remove()" type="button"
                         :disabled="options === 1" class="btn btn-danger mx-1">Remove</button>
                 </div>
             </div> --}}

            {{-- options --}}
            {{-- <div class="d-flex my-1 align-items-center">
                 <div class="w-75">
                     <input type="text" wire:model="options" id="optionValue_4" class="form-control w-100"
                         placeholder="Option Value">
                 </div>
                 <div class="w-25 d-flex align-items-center justify-content-between">
                     <input type="checkbox" wire:model="correct" id="correct_4"
                         style="width:20px; height:20px; margin:0px 12px">
                     <button onclick="this.parentElement.parentElement.remove()" type="button"
                         :disabled="options === 1" class="btn btn-danger mx-1">Remove</button>
                 </div>
             </div> --}}



            <div class="p-3 shadow-sm rounded my-2 border">
                <x-label>Question Tags:</x-label>
                <textarea name="" id="" rows="5" class="w-full form-control "
                    placeholder="Write your question tags" wire:model="tags"></textarea>
                <span class="text-sm my-1 text-slate-300 block">
                    Question information you wanna to show with questions. ex: this question has came to
                    BJS-2020 exam.
                    Every tags are seperated with comma (,) notation mark. ex: ICT-20, BJS-16
                </span>
            </div>

            <hr>
            <div class="p-3 shadow-sm rounded border">
                <x-label>Explanation:</x-label>
                {{-- <textarea name="" id="" cols="30" rows="10"></textarea> --}}
                <textarea name="" id="" rows="8" class="w-full form-control"
                    placeholder="BCS : 30, BJS : 14, etc" wire:model="info"></textarea>
                <span class="text-sm my-1 text-slate-300 block">
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
            {{-- </div> --}}
        </form>
    </div>
</div>
