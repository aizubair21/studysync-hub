<div>
    @section('title')
        Questions
    @endsection

    {{-- navigation  --}}
    <x-page-header>
        <x-slot name="header">
             My Questions
            <p class="text-sm font-normal">
                {{count($questions) ?? "0"}} question
            </p>
        </x-slot>

        <x-slot name="link">
            <div class="flex items-center">
                <a class="px-3 py-1 bg-green-900 text-white hover:bg-green-700 transition hover:transition rounded" href="{{route("vendorQuestion.create")}}">
                     Add
                </a>
            </div>
        </x-slot>

        <x-slot name="nav">
            <div class="flex justify-center items-center w-auto pt-3 text-md md:text-md">
                <img class="pr-5" width="24" height="24" src="https://img.icons8.com/plumpy/24/user-group-woman-woman.png" alt="user-group-woman-woman"/>
                <select wire:model.live="for" class="px-3 py-2 rounded border-3">
                    <option value="*">All</option>
                    @foreach ($groups as $gp)
                        <option title="{{$gp->name}}" value="{{encrypt($gp->id)}}">{{ Str::substr($gp->name, 0, 20)}}</option>
                    @endforeach
                </select>
            </div>
        </x-slot>
    </x-page-header>
    
    <div style="max-width: 668px; margin:0 auto;">

        
        <div class="my-1 p-2">
            <div class="bg-white text-sm rounded p-1 flex items-center justify-between">
                <select name="" id="" class="p-2 border rounded "> 
                    <option value="">All</option>
                    <option value="">Has Option</option>
                </select>
                
                <div>
                    <div class="flex items-center rounded border-b p-2">
                        <img width="18" height="18" class="" src="https://img.icons8.com/metro/100/search.png" alt="search"/>
                        <input type="search" name="" class="ms-2 w-18 focus:outline-0" id="" placeholder="search ...">

                    </div>
                </div>
            </div>

        </div>


        <div class="p-2" >
            @if($questions != "" && $questions == !null && count($questions) > 0 )
            @foreach ($questions as $qs)
                @livewire('vendor.questions.show', ['qid' => Crypt::encrypt($qs->id), "index" => $loop->iteration], key($qs->id))
            @endforeach
            @else 
                <div class="p-2 rounded w-full text-center font-bold  ">
                    <div class="text-md">
                        No Data found !
                    </div>

                    <div class="text-sm font-normal">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, soluta?
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>
