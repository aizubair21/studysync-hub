<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <h4>counter class</h4>
    <div style="display: flex">

        <button class="p-2 rounded bordered border-primary" wire:click="minus">-</button>
        <div style="padding: 0px 8px ">{{ $counter }}</div>
        <button class="p-2 rounded bordered border-primary" wire:click="add">+</button>

    </div>
    {{-- <button></button> --}}

</div>
