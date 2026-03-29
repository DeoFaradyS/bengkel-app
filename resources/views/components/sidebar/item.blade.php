@props([
    'href' => '#',
    'active' => false,
    'icon' => null
])

<li>
<a
    href="{{ $href }}"
    class="flex items-center p-2 rounded-lg group
    {{ $active
        ? 'bg-neutral-secondary text-fg-brand'
        : 'text-heading hover:bg-neutral-secondary hover:text-fg-brand'
    }}"
>

        {{-- Icon --}}
        <x-sidebar.icon :name="$icon" />

        {{-- Label --}}
        <span class="ms-3">
            {{ $slot }}
        </span>

    </a>
</li>