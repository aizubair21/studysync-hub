<div>
    {{-- Be like water. --}}
    <thead>
        <tr>
            @foreach ($header as $id => $head)
                <x-th>{{ $head }}</x-th>
            @endforeach
        </tr>
    </thead>
</div>
