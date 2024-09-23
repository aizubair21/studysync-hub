<div>
    {{-- Stop trying to control. --}}
    <form wire:submit="addQuestion" id="addNewMemberForm">

        {{-- question  --}}
        <div class="card border-0 shadow-none">
            <div class="py-1  flex justify-between items-center">
                <x-label for="question_title" class="m-0" value="{{ __(' Question Title:') }}" />
                <div>
                    <select id="question_type" class = "border-0 bg-light rounded @error('q_type') is-invalid @enderror"
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
                    <select id="answer_type" class='rounded border-0 bg-white @error('a_type') is-invalid @enderror'
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
