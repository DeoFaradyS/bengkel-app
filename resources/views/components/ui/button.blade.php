@props([
    'variant' => 'default',
    'size' => 'md',
    'icon' => null,
    'iconPosition' => 'left',
    'iconOnly' => false,
    'disabled' => false,
    'type' => 'button',
    'href' => null
])

@php
    $base = 'inline-flex items-center justify-center gap-2 font-medium rounded-base transition focus:ring-4 shadow-xs';

    $variants = [
        'default' => 'text-white bg-brand hover:bg-brand-strong focus:ring-brand-medium',
        'outline' => 'text-body border border-default hover:bg-neutral-secondary-soft',
        'pill' => 'text-white bg-brand rounded-full px-5 hover:bg-brand-strong focus:ring-brand-medium',
    ];

    $sizes = [
        'sm' => 'text-sm px-3 py-2',
        'md' => 'text-sm px-4 py-2.5',
        'lg' => 'text-base px-5 py-3'
    ];

    $iconSizes = [
        'sm' => 'p-2',
        'md' => 'p-2.5',
        'lg' => 'p-3'
    ];

    $classes = $base . ' ' .
        ($variants[$variant] ?? $variants['default']) . ' ' .
        ($iconOnly
            ? ($iconSizes[$size] ?? $iconSizes['md'])
            : ($sizes[$size] ?? $sizes['md'])
        ) . ' ' .
        ($disabled ? 'opacity-50 cursor-not-allowed pointer-events-none' : '');
@endphp


@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
@endif

    {{-- Icon Left --}}
    @if ($icon && $iconPosition === 'left')
        <span class="flex items-center">
            {!! $icon !!}
        </span>
    @endif

    {{-- Text --}}
    @unless($iconOnly)
        <span>{{ $slot }}</span>
    @endunless

    {{-- Icon Right --}}
    @if ($icon && $iconPosition === 'right')
        <span class="flex items-center">
            {!! $icon !!}
        </span>
    @endif

@if ($href)
    </a>
@else
    </button>
@endif