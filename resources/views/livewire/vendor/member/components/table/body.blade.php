<div>
    {{-- The whole world belongs to you. --}}
    <tbody>
        @foreach ($data as $id => $td)
            <tr>
                <x-td style="position:sticky; left:0; background-color:white;">
                    <input type="checkbox" style="width:20px; heigh:20px;" id="member_{{ $td->id }}"
                        wire:model.live="actionArray" value="{{ $td->id }}">
                </x-td>
                <x-td>{{ $td->name }}</x-td>
                <x-td>{{ $td->email }}</x-td>
                <x-td>{{ $td->phone }}</x-td>
                <x-td>
                    <div class="btn btn-info btn-sm"> {{ $td->group }} </div>
                </x-td>
                <x-td>

                </x-td>
                <x-td>
                    {{ $td->created_at }}
                </x-td>
            </tr>
        @endforeach
    </tbody>
</div>
