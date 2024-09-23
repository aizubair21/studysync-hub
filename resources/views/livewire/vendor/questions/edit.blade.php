<div>
    @section('title')
        Vendor | Edit Question
    @endsection

    <div class="mx:w-md  p-2">

        <div class="flex justify-between items-center h-auto  my-1">
            <div>
                <div class="h4"> <a class="btn" href="{{ session()->get('_previous')['url'] }}" wire:navigate> <i
                            class="fas fa-arrow-left mx-1"></i> </a> Update Question </div>
                <p class="m-0 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, excepturi?</p>
            </div>

            {{-- @php
                print_r(session()->get('_previous')['url']);
            @endphp --}}


            <div class="bg-green p-2 rounded mx-2 self-start">
                <i class="fas fa-list"></i>
            </div>
        </div>
        {{-- <div x-html="$wire.questions"></div> --}}
        {{-- {{ $questions }} --}}
        <pre>
            @php
                // print_r($options['0']);
            @endphp
        </pre>
        {{-- <hr class="my-1"> --}}
        <div class=" rounded">

            <form wire:submit.prevent="update">
                {{-- question  --}}
                <div class="row m-0 p-0 align-items-baseline py-2">
                    <div class="py-1  flex justify-between items-center col-md-3">
                        <x-label for="question_title" class="m-0" value="{{ __(' Question Title:') }}" />
                    </div>

                    <div class="col-md-9">
                        <div class="mb-1">
                            {{-- q type: {{ $q_type }}
                            <button @class([
                                'rounded px-2',
                                'py-1 border',
                                'bg-green' => $q_type == 'textOnly',
                            ]) wire:click="q_type = 'text'">Text</button>

                            <button @class([
                                'rounded px-2',
                                'py-1 border',
                                'bg-green' => $q_type == 'imageOnly',
                            ]) wire:click="q_type = 'text'">Image</button>

                            <button @class([
                                'rounded px-2',
                                'py-1 border',
                                'bg-green' => $q_type == 'textWithImage',
                            ]) wire:click="q_type = 'text'">With Image</button> --}}


                            <select id="question_type"
                                class = "border-0 bg-light rounded @error('q_type') is-invalid @enderror"
                                wire:model.live="questions.type" required autofocus>
                                <option value=""> -- Make Choose --</option>
                                <option @if ($questions['type'] == 'textOnly') selected @endif value="textOnly">Text Only
                                </option>
                                <option @if ($questions['type'] == 'imageOnly') selected @endif selected value="imageOnly">
                                    Image
                                    Only
                                </option>
                                <option @if ($questions['type'] == 'textWithImage') selected @endif value="textWithImage">Text
                                    With
                                    Image</option>
                                <option @if ($questions['type'] == 'videoOnly') selected @endif value="videoOnly">Video Only
                                </option>
                                <option @if ($questions['type'] == 'textWithVideo') selected @endif value="textWithVideo">Text
                                    With
                                    Video</option>
                            </select>

                        </div>
                        <textarea type="text" id="question_title" wire:model="questions.question"
                            placeholder="Write Your Question Title Here .... " class="form-control @error('question') is-invalid @enderror"></textarea>
                        @error('question')
                            <strong class="text text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                {{-- question end --}}

                <hr class="my-1">

                <div class="mt-1 row m-0 p-0 align-items-baseline py-2">

                    <div class="col-md-3 flex items-center justify-between">
                        <x-label for="Options" value="{{ __('Question Options') }}" />
                    </div>

                    <div id="options" class="col-md-9">

                        <div class="flex justify-between items-center">

                            <div>
                                <select id="answer_type"
                                    class='rounded border-0 bg-light  @error('a_type') is-invalid @enderror'
                                    wire:model.live="questions.answer_type" name="answer_type" required>
                                    <option selected value=""> -- Make Choise --</option>
                                    <option @if ($questions['answer_type'] === 'multipleChoise') selected @endif value="multipleChoise"
                                        selected> Multiple Choise</option>
                                    <option @if ($questions['answer_type'] === 'writting') selected @endif value="writting">By
                                        Writting
                                    </option>
                                    <option @if ($questions['answer_type'] === 'attached') selected @endif value="attached">By
                                        Attaching
                                        File</option>
                                </select>

                            </div>

                            <button class="flex justify-start items-center my-1 rounded bg-green px-2 ms-3">
                                <div class="rounded p-1 me-1 text-white"><i class="fas fa-plus"></i></div>
                                <div>Add </div>
                            </button>
                        </div>
                        <div id="optionDisplay">
                            @php
                                $in = 0;
                            @endphp
                            @foreach ($questions['options'] as $key => $choise)
                                {{-- {{ $options[$key]->question }} --}}
                                <div class="flex items-center w-full mb-1">
                                    <div class="flex my-1 w-full justify-between items-center">

                                        <div class=" w-full">
                                            <input type="text"
                                                wire:model.live="questions.options.{{ $key }}.option"
                                                id="optionValue"
                                                class="form-control w-full @error('options') is-invalid @enderror"
                                                placeholder="Option Value" />
                                        </div>
                                        {{-- <div>{{ $option[0]['option'] ?? '' }}</div> --}}

                                        <div class="w-20 flex items-center">
                                            {{-- {{ $questions['options'][$key]['is_correct'] }} --}}
                                            <input type="checkbox"
                                                wire:model="questions.options.{{ $key }}.is_correct"
                                                id="correct" style="width:20px; height:20px; margin:0px 12px"
                                                @if ($questions['options'][$key]['is_correct']) checked @endif
                                                class="input-group-text
                                                @error('correct') is-invalid @enderror"
                                                value="{{ $key }}">
                                            {{-- <button onclick="this.parentElement.parentElement.remove()" type="button"
                                        :disabled="options === 1" class="btn btn-danger mx-1"><i class="fas fa-close"></i></button> --}}

                                            <div class="flex items-center p-1">
                                                <button class="rounded-full  me-1 text-red"> <i
                                                        class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                            {{-- <div class="flex items-center w-full mb-1">
                                <div class="flex my-1 w-full justify-between items-center">

                                    <div class=" w-full">
                                        <input type="text" wire:model.live="options" name="optionValue" id="optionValue"
                                            class="form-control w-full @error('options') is-invalid @enderror"
                                            placeholder="Option Value" />
                                    </div>

                                    <div class="w-20 flex items-center">
                                        <input type="radio" x-show="$wire.options !=  null " wire:model.live="correct"
                                            id="correct" style="width:20px; height:20px; margin:0px 12px"
                                            value="
                                        class="input-group-text
                                            @error('correct') is-invalid @enderror">

                                        <div class="flex items-center p-1">
                                            <button class="rounded-full  me-1 text-red"> <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="flex items-center w-full mb-1">
                                <div class="flex my-1 w-full justify-between items-center">

                                    <div class=" w-full">
                                        <input type="text" wire:model.live="options" name="optionValue" id="optionValue"
                                            class="form-control w-full @error('options') is-invalid @enderror"
                                            placeholder="Option Value" />
                                    </div>

                                    <div class="w-20 flex items-center">
                                        <input type="radio" x-show="$wire.options !=  null " wire:model.live="correct"
                                            id="correct" style="width:20px; height:20px; margin:0px 12px"
                                            value="
                                        class="input-group-text
                                            @error('correct') is-invalid @enderror">
                                    

                                        <div class="flex items-center p-1">
                                            <button class="rounded-full  me-1 text-red"> <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="flex items-center w-full mb-1">
                                <div class="flex my-1 w-full justify-between items-center">

                                    <div class=" w-full">
                                        <input type="text" wire:model.live="options" name="optionValue"
                                            id="optionValue"
                                            class="form-control w-full @error('options') is-invalid @enderror"
                                            placeholder="Option Value" />
                                    </div>

                                    <div class="w-20 flex items-center">
                                        <input type="radio" x-show="$wire.options !=  null " wire:model.live="correct"
                                            id="correct" style="width:20px; height:20px; margin:0px 12px"
                                            value="
                                        class="input-group-text
                                            @error('correct') is-invalid @enderror">
                                        

                                        <div class="flex items-center p-1">
                                            <button class="rounded-full  me-1 text-red"> <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div> --}}
                        </div>
                    </div>

                </div>

                <hr class="my-1">
                <div class="bg-light rounded row m-0 p-0 align-items-baseline py-2">
                    <div class="col-md-3">

                        <x-label for="Options" value="{{ __('Question Tags') }}" />

                    </div>
                    <div class="col-md-9">
                        <textarea name="" id="" rows="6" class="w-full mt-2 form-control" wire:model="questions.tags"></textarea>
                        <div class="text-sm">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat dolorum maiores hic quo
                            rerum
                            harum quam nostrum aspernatur velit laboriosam?
                        </div>
                    </div>
                </div>

                <hr class="my-1">
                <div class="bg-light rounded row m-0 p-0 align-items-baseline py-2">
                    <div class="col-md-3">

                        <x-label for="Options" value="{{ __('Question Solution') }}" />

                    </div>
                    <div class="col-md-9">
                        <textarea name="" id="" rows="6" class="w-full mt-2 form-control" wire:model="questions.info"></textarea>
                        <div class="text-sm">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat dolorum maiores hic quo
                            rerum
                            harum quam nostrum aspernatur velit laboriosam?
                        </div>
                    </div>
                </div>

                <hr class="my-1">

                <div class="flex justify-end items-center">
                    <div class="me-2">
                        <a href="" wire:navigate class="rounded px-3 py-2 bg-red "> <i
                                class="fas fa-trash me-2"></i>
                            Delete</a>
                    </div>
                    <button type="submit" class="rounded px-3 py-2 bg-green "> <i class="fas fa-save me-2"></i> Save
                        &
                        Update</button>
                </div>

            </form>
        </div>

    </div>
</div>
