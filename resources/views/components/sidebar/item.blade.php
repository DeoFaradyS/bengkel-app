@props([
    'href' => '#',
    'active' => false,
    'icon' => null,
])

<li>
    <a href="{{ $href }}" class="flex items-center px-2 py-1.5 rounded-base group {{ $active ? 'bg-neutral-secondary text-fg-brand' : 'text-body hover:bg-neutral-tertiary hover:text-fg-brand' }}">
        <x-sidebar.icon :name="$icon" />
        <span class="ms-3 text-base font-medium whitespace-nowrap">{{ $slot }}</span>
    </a>
</li>