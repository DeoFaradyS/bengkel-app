@props([
    'href' => '#',
    'active' => false,
    'icon' => null
])

<li>
    <a href="{{ $href }}"
        class="flex items-center px-2 py-1.5 rounded-base group
        {{ $active
            ? 'bg-neutral-secondary text-fg-brand'
            : 'text-body hover:bg-neutral-tertiary hover:text-fg-brand'
        }}">

        {{-- Icon --}}
        <x-sidebar.icon :name="$icon" />

        {{-- Label --}}
        <span class="ms-3 whitespace-nowrap">{{ $slot }}</span>

    </a>
</li>