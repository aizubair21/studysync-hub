<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <table class="table">
        {{-- @livewire('vendor.member.components.table.head', ['user' => $user], key($user->id)) --}}

        {{-- head  --}}
        @livewire('vendor.member.components.table.head', ['header' => $header])

        {{-- body  --}}
        @livewire('vendor.member.components.table.body', ['data' => $members])

    </table>
</div>
