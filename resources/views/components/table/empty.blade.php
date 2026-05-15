@props([
    'colspan'    => 1,
    'message'    => 'Belum ada data.',
    'icon'       => 'default',
])

@php
$icons = [
    'default' => '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5.5A3.5 3.5 0 0 1 15.5 9 3.5 3.5 0 0 1 12 12.5 3.5 3.5 0 0 1 8.5 9 3.5 3.5 0 0 1 12 5.5m0 10c3.87 0 7 1.57 7 3.5V21H5v-2c0-1.93 3.13-3.5 7-3.5Z"/>',
    'vehicle' => '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 18v-5l2-6h14l2 6v5M3 18h18M3 18a2 2 0 0 1-2-2v-1h22v1a2 2 0 0 1-2 2M7 15h.01M17 15h.01M5 13h14M8 7l1 4M16 7l-1 4"/>',
    'search'  => '<path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>',
];

$iconPath = $icons[$icon] ?? $icons['default'];
@endphp

<tr>
    <td colspan="{{ $colspan }}" class="px-6 py-12 text-center text-body">
        <div class="flex flex-col items-center gap-3">

            {{-- Icon --}}
            <svg class="w-10 h-10 text-body opacity-40" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                {!! request('search') ? $icons['search'] : $iconPath !!}
            </svg>

            {{-- Message --}}
            <p class="text-sm">
                @if (request('search'))
                    Hasil untuk "<span class="font-medium text-heading">{{ request('search') }}</span>" tidak ditemukan.
                @else
                    {{ $message }}
                @endif
            </p>

        </div>
    </td>
</tr>