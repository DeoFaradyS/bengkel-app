@props([
    'columns' => [],
])
 
<thead class="text-sm text-body bg-neutral-secondary-medium border-b border-t border-default-medium">
    <tr>
        {{-- Kolom No --}}
        <th scope="col" class="px-6 py-3 font-medium text-center w-12">
            No
        </th>
 
        {{-- Column Headers --}}
        @foreach ($columns as $column)
            <th scope="col" class="px-6 py-3 font-medium">
                {{ $column }}
            </th>
        @endforeach
    </tr>
</thead>