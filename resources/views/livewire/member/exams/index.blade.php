<div>
    
    @section('title')
        Student | Exams
    @endsection

    @section('content')
        
        <x-page-header>
            @slot('header')
               <h2>Your Exams</h2>
            @endslot

            @slot('link')
                <div class="flex justify-center items-center">
                    <a wire:navigate href="{{route('member.exams.index', ['tab' => 'today'])}}" class="block @if(request()->query('tab') == 'today' || request()->routeIs('member.exams.index') && !request()->query('tab') == 'schedule') bg-green-900 text-white bolder @endif  px-4 py-1 ">Today</a>
                    <a wire:navigate href="{{route('member.exams.index', ['tab' => 'schedule'])}}" @class(["block px-4 py-1 mx-2", "bg-green-900 text-white bolder " => request()->query('tab') == 'schedule'])>Schedule</a>
                </div>
              
            @endslot

            @slot('nav')
            @endslot
        </x-page-header>


        <div class="px-4 py-2">

            <div class="" style="display: grid; grid-template-columns:repeat(auto-fill, 320px); justify-content:center; grid-gap:10px ">
                <x-member.exam-cart />
            </div>


        </div>


    @endsection
</div>
