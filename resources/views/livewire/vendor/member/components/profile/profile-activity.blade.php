<div>
    {{-- Stop trying to control. --}}
   
    <div class="border p-2 my-1">
        <div class="text-md mb-1 font-bold">Groups</div>
        @if($activity['group']) 
            <div class="block">
                @foreach($activity['group'] as $group)
                    <div class="bg-slate-100 pl-2 border-green-500 border rounded-md m-1 bg-grat-100 flex justify-between items-center">
                        <div class="text-md">{{ $group['name'] }}</div>
                        <button wire:click="removeMemberFromGroup({{$group['id']}})">
                            <img class="w-10 py-1 px-2" src="{{asset('media/minus.png')}}" alt="">
                        </button>
                    </div>    
                @endforeach
            </div>

            @else
            <div class="flex items-center justify-between">
                <div class="text-md">No groups found</div>
            </div>
        @endif
        <div class="text-end">
            <button wire:click="$toggle('peviewUserToGropModal')" class="px-3 py-1 bg-green-900 text-white rounded">Add</button>
        </div>
    </div>
    
    <div class="border p-2 my-1">
        <div class="text-md mb-1 font-bold">Exams</div>
        <div class="flex items-center justify-between">
            <div class="text-md">No exams activity found! </div>
        </div>
        
    </div>
    <div>
        {{-- <pre>
            @php
                print_r($activity['group'][0])
            @endphp
        </pre> --}}
    </div>



    <x-modal-aside wire:model.live="peviewUserToGropModal">
        <div class="p-2">
            @livewire('vendor.member.member-to-group', ['user' => $id])
        </div>
    </x-modal-aside>
</div>
