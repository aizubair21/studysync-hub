<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
   
    
    <pre>
        @php
            // print_r($user)
        @endphp
    </pre>

    <div class="p-2 ">
        <div class="text-md mb-1">Name</div>
        <input type="text" wire:model.lazy="member.name" class="w-full text-md text-start p-2 border rounded" name="" placeholder="lorem, ipsum" id="">
    </div>
    <div class="p-2 ">
        <div class="text-md mb-1">User Name</div>
        <input type="text" wire:model.lazy="member.username" class="w-full text-md text-start p-2 border rounded" name="" placeholder="lorem, ipsum" id="">
    </div>
    <div class="p-2 ">
        <div class="text-md mb-1">Email Address</div>
        <input type="email" wire:model.lazy="member.email" class=" @error('email') border-red-600 @endif w-full text-md text-start p-2 border rounded" name="" placeholder="lorem.test@gmail.com" id="">
    </div>
    <div class="p-2 ">
        <div class="text-md mb-1">Phone Number</div>
        <input type="number" wire:model.lazy="member.phone" class="w-full text-md text-start p-2 border rounded" name="" placeholder="0123457820" id="">
    </div>
</div>
