<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    @section('content')
        <div class="p-2">
            {{-- activity  --}}
            <div class="shadow rounded p-3 border">
                <div class="mb-2 text-sm font-bold">
                    Activity
                </div>
                <div>
                    <table>
                        <thead>
                            <th class="w-full text-start">Login Details</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <td class="w-full">Chrome:</td>
                            <td class="flex items-center p-2"> 
                                <button wire:click="checkRequest" type="button" class="px-2 py-1 rounded bg-red-800 text-white">
                                    Delete
                                </button>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    @endsection
</div>
