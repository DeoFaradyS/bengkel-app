@props([
    'index'      => null,
    'cells'      => [],
    'editUrl'    => '#',
    'editLabel'  => 'Edit',
    'withAction' => true,
    'isLast'     => false,
])

<tr class="{{ $isLast ? '' : 'border-b border-default' }} odd:bg-neutral-primary-soft even:bg-neutral-secondary-soft hover:bg-neutral-secondary-medium">

    {{-- Nomor urut --}}
    <td class="px-6 py-3 text-center text-body">
        {{ $index }}
    </td>

    {{-- Kolom --}}
    @foreach ($cells as $cell)
        @if ($loop->first)
            <th scope="row" class="px-6 py-3 font-medium text-heading whitespace-nowrap">
                {{ $cell }}
            </th>
        @else
            <td class="px-6 py-3 text-body">
                {{ $cell }}
            </td>
        @endif
    @endforeach

    {{-- Action --}}
    @if ($withAction)
        {{ $action ?? '' }}
    @endif

</tr>