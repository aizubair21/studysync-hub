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
                @if($for > 0)
                    <a class="mx-2 px-3 py-1 border hover:text-green-700 transition hover:border hover:border-green-700 hover:transition rounded" href="{{route("vendorExamSchedule.create", ['gpid' => $for])}}">
                        Add Scehdule
                    </a>
                @endif
                @if($schedule > 0)
                    <button type="button" wire:click="addQuestion({{$schedule}})" class="px-3 py-1 bg-green-900 text-white hover:bg-green-700 transition hover:transition rounded">
                        Add Question
                    </button>
                @endif
                </div>
        </x-slot>

        <x-slot name="nav">
            <div class="flex justify-center items-center w-auto pt-3 text-md md:text-md">
                {{-- <img class="pr-5" width="24" height="24" src="https://img.icons8.com/plumpy/24/user-group-woman-woman.png" alt="user-group-woman-woman"/> --}}
                <form action="" method="get">   
                    <select wire:model.live="for" class="px-3 mx-1 py-2 rounded border-3">
                        <option value="*">All</option>
                        @foreach ($groups as $gp)
                        <option @selected($for == $gp->id) title="{{$gp->name}}" value="{{$gp->id}}">{{ Str::substr($gp->name, 0, 20)}}</option>
                        @endforeach
                    </select>

                    @if ($schedules)
                            
                        <select wire:model.live="schedule" class="px-3 mx-1 py-2 rounded border-3">
                            <option value="*">All</option>
                            @foreach ($schedules as $gp)
                            <option @selected($schedule == $gp->id) title="{{$gp->exm_name}}" value="{{$gp->id}}">{{ Str::substr($gp->exm_name, 0, 20)}}</option>
                            @endforeach
                        </select>
                    @endif
                </form>
            </div>
        </x-slot>
    </x-page-header>
    
    <div style="max-width: 668px; margin:0 auto;">

        
        <div class="my-1 p-2 sticky z-50 top-0">
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
                @foreach ($qs as $qsi)
                    {{-- @livewire('vendor.questions.show', ['qid' => Crypt::encrypt($qsi->id), "index" => $loop->iteration], key($qsi->id)) --}}
                    <livewire:vendor.questions.show :qid="Crypt::encrypt($qsi->id)" :index="$loop->iteration" :key="$qsi->id" />
                    {{-- <div class="bg-white rounded p-2 my-2"> {{$loop->iteration}} </div> --}}
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
